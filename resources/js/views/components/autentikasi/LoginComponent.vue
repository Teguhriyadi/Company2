<template>
    <section class="background-radial-gradient overflow-hidden">
        <div class="container">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        DuoBintangStudio <br />
                        <span style="color: hsl(218, 81%, 75%); font-size: 40px;">
                            <i>
                                " Murah, Aman, Terpercaya "
                            </i>
                        </span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Temporibus, expedita iusto veniam atque, magni tempora mollitia
                        dolorum consequatur nulla, neque debitis eos reprehenderit quasi
                        ab ipsum nisi dolorem modi. Quos?
                    </p>
                    <router-link to="/" class="btn btn-block btn-primary">
                        Kembali Ke Halaman Home
                    </router-link>
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
                            <form method="POST" @submit.prevent="userLogin">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">
                                        Email address
                                    </label>
                                    <input type="email" id="email"
                                    class="form-control" v-model="user.email">
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">
                                        Password
                                    </label>
                                    <input type="password" id="password" class="form-control" v-model="user.password">
                                </div>

                                <button type="submit" class="btn btn-primary mb-4" style="width: 100%;">
                                    Login
                                </button>

                                <div class="text-center">
                                    <p>Atau Login Menggunakan:</p>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-google"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-github"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { reactive, ref } from "vue"
    import { useRouter } from "vue-router"
    import axios from "axios"

    export default {
        setup() {

            const router = useRouter()
            const user = reactive({
                email: "",
                password: ""
            });

            const loginFailed = ref(null)

            function userLogin() {
                let email = user.email
                let password = user.password

                axios.post("auth/login", {
                    email,
                    password
                })
                .then(response => {
                    if (response.data.success) {
                        localStorage.setItem("token", response.data.access_token)

                        return router.push("/");
                    }

                    loginFailed.value = true
                }).catch(error => {
                    console.log("Error")
                })
            }

            return {
                user,
                loginFailed,
                userLogin
            }
        }
    }
</script>
