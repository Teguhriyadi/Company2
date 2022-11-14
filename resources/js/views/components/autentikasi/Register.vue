<template>
    <section class="background-radial-gradient overflow-hidden">
        <div class="container">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight profil">
                        Duo Bintang Studio. <br />
                        <span class="jargon">
                            <i>
                                " Kualitas Tidak Perlu Diragukan "
                            </i>
                        </span>
                    </h1>
                    <p class="mb-4 opacity-70 deskripsi">
                        Form Pendaftaran Digunakan Apabila Anda Belum Mempunyai Akun Di Sistem Kami. Setelah Pendaftaran Selesai, Maka Anda Akan Diarahkan Ke Halaman Login.
                    </p>
                    <!-- <a href="index.html" class="btn btn-block btn-primary">
                        Get Into Home Again
                    </a> -->
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong">

                    </div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong">

                    </div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <h1 class="mb-2 text-center">
                                <span style="color: hsl(218, 81%, 75%)">
                                    Form Register
                                </span>
                            </h1>
                            <a href="login.html" class="mt-4" style="text-decoration: none; color: black; font-size: 14px">
                                <p>
                                    Sudah Punya Akun?
                                    <span class="text-primary">
                                        Login Disini
                                    </span>
                                </p>
                            </a>
                            <form  method="POST" @submit.prevent="register">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="first_name">
                                                Nama Depan
                                            </label>
                                            <input type="text" id="first_name" class="form-control" v-model="user.first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="last_name">
                                                Nama Belakang
                                            </label>
                                            <input type="text" id="last_name" class="form-control" v-model="user.last_name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="email">
                                        Email address
                                    </label>
                                    <input type="email" id="email" class="form-control" v-model="user.email">
                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="password">
                                        Password
                                    </label>
                                    <input type="password" id="password" class="form-control" v-model="user.password">
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="confirmation_password">
                                        Konfirmasi Password
                                    </label>
                                    <input type="password" id="confirmation_password" class="form-control" v-model="user.konfirmasi_password">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block w-100 mb-2">
                                    <span v-if="loading">
                                        <i>
                                            Data Anda Sedang Diproses Oleh Sistem
                                        </i>
                                    </span>
                                    <span v-else>
                                        Daftar
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
}
.deskripsi {
    color: hsl(218, 81%, 85%);
    word-spacing: 0.4em;
    text-align: justify
}
</style>

<script>
export default {
    name: "Register",
    data() {
        return {
            user: [],
            loading: false
        }
    },
    methods: {
        register() {
            this.loading = true;
            if (this.user.first_name && this.user.last_name && this.user.email && this.user.password && this.user.konfirmasi_password) {

                if (this.user.password != this.user.konfirmasi_password) {
                    setTimeout(() => {
                        alert("Konfirmasi Password Tidak Sesuai")
                        this.loading = false;

                        window.location = "/";

                    }, 1000);
                } else {
                    axios.post("register", {
                        first_name: this.user.first_name,
                        last_name: this.user.last_name,
                        email: this.user.email,
                        password: this.user.password,
                        konfirmasi_password: this.user.konfirmasi_password
                    }).then(response => {
                        if (response.data.success) {
                            setTimeout(() => {
                                alert("Data Anda Berhasil di Buat");
                                this.loading = false;

                                window.location = "/login"
                            }, 1000);
                        }

                        console.log(response.data)
                    }).catch(error => {
                        setTimeout(() => {
                            alert("Email Sudah Terdaftar");
                            this.loading = false;

                            window.location = "/";
                        }, 1000);
                    });
                }
            }
        }
    }
}
</script>
