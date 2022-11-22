<template>
    <section class="background-radial-gradient overflow-hidden">
        <div class="container">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight profil">
                        DuoBintangStudio <br />
                        <span class="jargon">
                            <i>
                                " Murah, Aman, Terpercaya "
                            </i>
                        </span>
                    </h1>
                    <p class="mb-4 opacity-70 pesan">
                        Isikan Form Login Terlebih Dahulu Jika Anda Ingin Melakukan Transaksi. Kami Memudahkan Anda Dalam Sistem Kami , Yaitu Anda Hanya Perlu Login Sekali Saja. Apabila Anda Logout Dari Sistem Kami, Maka Anda Diharuskan Mengisi Form Login Kembali.
                    </p>
                    <!-- <router-link to="/" class="btn btn-block btn-primary">
                        Kembali Ke Halaman Home
                    </router-link> -->
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <h1 class="mb-2 text-center">
                                <span style="color: hsl(218, 81%, 75%)">
                                    Form Login
                                </span>
                            </h1>
                            <router-link to="/daftar" class="mb-0" style="text-decoration: none; color: black; font-size: 14px">
                                <p>
                                    Belum Punya Akun?
                                    <span class="text-primary">
                                        Daftar Disini
                                    </span>
                                </p>
                            </router-link>
                            <form method="POST" @submit.prevent="login">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">
                                        Email address
                                    </label>
                                    <input type="email" id="email"
                                    class="form-control" v-model="user.email" required>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">
                                        Password
                                    </label>
                                    <input type="password" id="password" class="form-control" v-model="user.password" required>
                                </div>

                                <button type="submit" class="btn btn-primary mb-4" style="width: 100%;">
                                    <span v-if="loading">
                                        <i>
                                            Data Anda Sedang Diproses Oleh Sistem
                                        </i>
                                    </span>
                                    <span v-else>
                                        Login
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

section {
    padding-top: 150px;
}

.profil {
    color: hsl(218, 81%, 95%);
}
.jargon {
    color: hsl(218, 81%, 75%);
    font-size: 40px;
}
.pesan {
    color: hsl(218, 81%, 85%);
    word-spacing: 0.4em;
    text-align: justify
}
</style>

<script>
import axios from "axios"

export default {
    name: "LoginComponent",
    data() {
        return {
            loggedIn: localStorage.getItem("loggedIn"),
            token: localStorage.getItem("token"),

            user: [],
            loginFailed: null,
            loading: false
        }
    },
    methods: {
        login() {

            if (this.user.email && this.user.password) {
                axios.get("sanctum/csrf-cookie")
                .then(response => {
                    axios.post("login", {
                        email: this.user.email,
                        password: this.user.password
                    }).then(res => {
                        this.loading = true;
                        if (res.data.success) {
                            localStorage.setItem("loggedIn", "true")
                            localStorage.setItem("token", res.data.token)

                            this.loggedIn = true
                            setTimeout(() => {
                                this.loading = false;
                                this.$swal({
                                    title: "Good Job",
                                    text: "Anda Berhasil Login",
                                    icon: "success"
                                }).then(function() {
                                    window.location = "/"
                                });
                            }, 1000);
                        } else {
                            this.loginFailed = true
                        }
                    }).catch(error => {
                        console.log(error);
                        this.loading = true;

                        setTimeout(() => {
                            this.loading = false
                            this.$swal({
                                title: "Oopss",
                                text: "Periksa Kembali Form Isian Anda",
                                icon: "error"
                            }).then(function() {
                                window.location = "/login"
                            });
                        }, 2000);
                    })
                })
            }
        }
    },
    mounted() {
        if (this.loggedIn) {
            return this.$router.push("/");
        }
    }
}
</script>
