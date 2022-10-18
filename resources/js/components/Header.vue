<template>
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">
        <div class="logo" v-for="profil in profils" :key="profil.id">
            <img :src="profil.profil_foto">
            <a href="#" style="margin-left: 10px; font-size: 25px; color: black; font-weight: 700">
                    {{ profil.profil_nama }}
                </a>
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li class="linkss">
                <a class="nav-link scrollto" href="#home">
                    Home
                </a>
            </li>
            <li class="linkss">
                <a class="nav-link scrollto" href="#tentang_kami">
                    Tentang Kami
                </a>
            </li>
            <li class="linkss">
                <a class="nav-link scrollto" href="#jasa">
                    Jasa
                </a>
            </li>
            <li class="linkss">
              <a class="nav-link scrollto" href="#portfolio">Portfolio</a>
            </li>
            <li class="linkss"><a class="nav-link scrollto" href="#tim">Tim</a></li>
            <li class="linkss"><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
            <li class="linkss">
              <a class="getstarted scrollto" href="#tentang_kami">Get Started</a>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle" id="clickHamburger" @click="clickButton"></i>
        </nav>
      </div>
    </header>
</template>

<style scoped>
    .scrollto {
        font-weight: 700;
    }
</style>

<script>
    export default {
        name: "HeaderComponents",
        data() {
            return {
                profils: []
            }
        },
        created() {
            this.getProfil();
        },
        methods: {
            async getProfil() {
                try {
                    const response = await axios.get("profil_perusahaan");
                    this.profils = response.data;
                } catch (error) {
                    console.log("Oopss.. Terjadi Kesalahan");
                }
            },
            clickButton() {
                let navbarButton = document.getElementById('clickHamburger')
                let getNavbar = document.querySelector('#navbar')

                getNavbar.classList.toggle('navbar-mobile')

                navbarButton.classList.toggle('bi-list')
                navbarButton.classList.toggle('bi-x')

            }
        }
    }

</script>
