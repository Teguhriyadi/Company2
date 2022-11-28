<template>
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <router-link v-for="(profil, index) in dataProfil" :key="index" to="/" class="logo d-flex align-items-center">
                <h1>{{ profil.profil_nama }} </h1>
            </router-link>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <router-link to="/" active-class="active"> Home </router-link>
                    </li>
                    <li class="dropdown">
                        <a href="#">
                            <span>Portofolio</span>
                            <i class="bi bi-chevron-down dropdown-indicator"></i>
                        </a>
                        <ul>
                            <li v-for="(kategori, index) in dataKategoriJasa" :key="index">
                                <router-link :to="{name: 'portofolio', params: {slug: kategori.jasa_slug, id: kategori.jasa_id, nama: kategori.jasa_nama} }">
                                    {{ kategori.jasa_nama }}
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">
                            <span>Kategori Jasa</span>
                            <i class="bi bi-chevron-down dropdown-indicator"></i>
                        </a>
                        <ul>
                            <li v-for="(kategori, index) in dataKategoriJasa" :key="index">
                                <router-link :to="{name: 'kategoriJasa', params: {slug: kategori.jasa_slug, id: kategori.jasa_id, nama: kategori.jasa_nama} }">
                                    {{ kategori.jasa_nama }}
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <router-link to="/booking_online">
                            Booking Online
                        </router-link>
                    </li>
                    <li>
                        <a href="/#tentang_kami">
                            Tentang Kami
                        </a>
                    </li>

                    <li v-if="!loggedIn">
                        <router-link to="/login">
                            Login
                        </router-link>
                    </li>

                    <li v-if="!loggedIn">
                        <router-link to="/daftar">
                            Daftar
                        </router-link>
                    </li>

                    <li class="dropdown" v-if="loggedIn">
                        <a href="#">
                            <span>Akun</span>
                            <i class="bi bi-chevron-down dropdown-indicator"></i>
                        </a>
                        <ul>
                            <li>
                                <router-link to="/profil_saya">
                                    Profil Saya
                                </router-link>
                            </li>
                            <li>
                                <a @click="logout">Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <li v-if="loggedIn">
                        <router-link to="/history">
                            <template v-if="jumlah == 0">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    0
                                </span>
                            </template>
                            <template v-else>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ jumlah }}
                                </span>
                            </template>
                            <i class="fas fa-cart-flatbed" style="margin-right: 5px;"></i> History
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>

<script>

import axios from "axios"
export default {
    name: "Header",
    data() {
        return {
            loggedIn: localStorage.getItem("loggedIn"),
            token: localStorage.getItem("token"),
            dataProfil: [],
            dataKategoriJasa: [],
            user: [],
            counting: [],
            jumlah: []
        }
    },
    created() {
        axios.get("/user", {
            headers: {
                'Authorization': 'Bearer ' + this.token
            }
        }).then(response => {
            this.counting = response.data.id
            axios.get("counting/" + this.counting)
                .then(cetak => {
                    this.jumlah = cetak.data.jumlah
                    console.log(this.jumlah)
                });
            this.user = response.data
        });
        this.getProfil();
        this.getKategoriJasa();
    },
    methods: {
        getLoggedIn() {
            this.loggedIn = localStorage.getItem("loggedIn");
        },

        logout() {
            axios.get("logout")
            .then(() => {
                localStorage.removeItem("token")
                localStorage.removeItem("loggedIn")

                this.$swal('Good Job', 'Berhasil Logout Dari Sistem', 'success');
                setTimeout(() => {
                    window.location = "/";
                }, 2000);
            })
        },

        async getProfil() {
            try {
                const response = await axios.get("profil_perusahaan");
                this.dataProfil = response.data;
            } catch (error) {
                console.log("Oopss.. Error");
            }
        },

        async getKategoriJasa() {
            try {
                const response = await axios.get("kategori_jasa");
                this.dataKategoriJasa = response.data.data;
            } catch(error) {
                console.log(error);
            }
        },


    },
    watch: {
        $route: {
            immediate: true,
            handler() {
                this.getLoggedIn()
            }
        }
    }
}
</script>
