<template>
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">
        <div class="logo" v-for="profil in profils" :key="profil.id">
            <h1>
                <a href="index.html">
                    {{ profil.profil_nama }}
                </a>
            </h1>
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
            <li><a class="nav-link scrollto" href="#services">Jasa</a></li>
            <li>
              <a class="nav-link scrollto" href="#portfolio">Portfolio</a>
            </li>
            <li><a class="nav-link scrollto" href="#team">Tim</a></li>
            <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
            <li>
              <a class="getstarted scrollto" href="#about">Get Started</a>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle" id="clickHamburger" @click="clickButton"></i>
        </nav>
      </div>
    </header>
</template>

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
            }
        }
    }
</script>
