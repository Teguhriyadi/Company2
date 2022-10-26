<template>
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <a href="index.html">
                        <!-- <img src="/desain/img/logo.png" height="75" width="80" class="rounded" alt="..."/> -->
                    </a>

                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        StudioFoto. <br />
                        <span style="color: hsl(218, 81%, 75%)">
                            best than your ex
                        </span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Temporibus, expedita iusto veniam atque, magni tempora mollitia
                        dolorum consequatur nulla, neque debitis eos reprehenderit quasi
                        ab ipsum nisi dolorem modi. Quos?
                    </p>
                    <a href="index.html" class="btn btn-block btn-primary">
                        Get Into Home Again
                    </a>
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
                                    Register Page
                                </span>
                            </h1>
                            <a href="login.html" class="mt-4" style="text-decoration: none; color: black; font-size: 14px">
                                <p>
                                    Already have an account?
                                    <span class="text-primary">
                                        Sign in here
                                    </span>
                                </p>
                            </a>
                            <form  method="POST" @submit.prevent="handleSubmit">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="first_name">
                                                First name
                                            </label>
                                            <input type="text" id="first_name" class="form-control" v-model="firstname">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="last_name">
                                                Last name
                                            </label>
                                            <input type="text" id="last_name" class="form-control" v-model="user.nama">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">
                                        Email address
                                    </label>
                                    <input type="email" id="email" class="form-control" v-model="user.email">
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">
                                        Password
                                    </label>
                                    <input type="password" id="password" class="form-control" v-model="user.password">
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="confirmation_password">
                                        Konfirmasi Password
                                    </label>
                                    <input type="password" id="confirmation_password" class="form-control" v-model="user.confirmation_password">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block w-100 mb-4">
                                    Sign up
                                </button>

                                <div class="text-center">
                                    <p>or sign up with:</p>
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
                nama: "",
                email: "",
                password: "",
                confirmation_password: ""
            });

            function handleSubmit() {
                let nama = user.nama
                let email = user.email
                let password = user.password
                let confirmation_password = user.confirmation_password;

                axios.post("register", {
                    nama,
                    email,
                    password,
                    confirmation_password
                })
                .then(() => {
                    return router.push("/login")
                }).catch(error => {
                    console.log("Error")
                })
            }

            return {
                user,
                handleSubmit
            }
        }
    }
</script>
