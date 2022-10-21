<template>
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <router-link v-for="(profil, index) in dataProfil" :key="index" to="/" class="logo d-flex align-items-center">
                <h1>{{ profil.profil_nama }}</h1>
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
                    <li>
                        <router-link to="/produk">
                            List Harga Produk
                        </router-link>
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

                    <li>
                        <router-link to="/login">
                            Login
                        </router-link>
                    </li>

                    <li>
                        <router-link to="/daftar">
                            Daftar
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
                dataProfil: []
            }
        },
        created() {
            this.getProfil();
        },
        methods: {
            async getProfil() {
                try {
                    const response = await axios.get("profil_perusahaan");
                    this.dataProfil = response.data;
                } catch (error) {
                    console.log("Oopss.. Error");
                }
            }
        }
    }
</script>
