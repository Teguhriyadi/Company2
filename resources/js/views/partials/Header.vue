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
                    <li>
                        <router-link to="/portofolio">
                            Portofolio
                        </router-link>
                    </li>
                    <li class="dropdown">
                        <a href="#">
                            <span>Kategori Jasa</span>
                            <i class="bi bi-chevron-down dropdown-indicator"></i>
                        </a>
                        <ul>
                            <li v-for="(kategori, index) in dataKategoriJasa" :key="index">
                                <router-link :to="{name: 'kategoriJasa', params: {slug: kategori.kategori_jasa_slug, id: kategori.kategori_id, nama: kategori.kategori_jasa_nama} }">
                                    {{ kategori.kategori_jasa_nama }}
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

                    <li>
                        <a href="#kontak">
                            Kontak
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

                    <li v-if="loggedIn">
                        <a @click="logout" style="color: white;">
                            Logout
                        </a>
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
            loggedIn: null,
            dataProfil: [],
            dataKategoriJasa: []
        }
    },
    created() {
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
                localStorage.removeItem("loggedIn")

                return this.$router.push("/");
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
                this.dataKategoriJasa = response.data;
            } catch(error) {
                console.log("Oopss.. Error");
            }
        }
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
