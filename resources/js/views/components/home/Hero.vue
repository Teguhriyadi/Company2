<template>
    <section id="hero" class="hero">
        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down">
                            Selamat Datang {{ user.nama }} di
                            <span>Duo Bintang Studio</span>
                        </h2>
                        <p data-aos="fade-up">
                            Jasa Pelayanan Digital di Bidang Fotografi, Designer, dan Animation
                        </p>
                        <a data-aos="fade-up" data-aos-delay="200" href="#tentang_kami" class="btn-get-started">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div v-for="(carousel, index) in dataCarousel" :key="index"  :class="index === 0 ? 'carousel-item active' : 'carousel-item' " :style="{'background-image' : 'url('+carousel.carousel_gambar+')' }"></div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </section>
</template>

<script>
import axios from "axios"
export default {
    name: "ComponentHero",
    data() {
        return {
            loggedIn: localStorage.getItem("loggedIn"),
            token: localStorage.getItem("token"),
            apiData: localStorage.getItem("api_data"),
            user: [],
            dataCarousel: []
        }
    },
    created() {
        this.getCarousel();
        axios.get("/user", {
            headers: {
                'Authorization': 'Bearer ' + this.token
            }
        }).then(response => {
            console.log(response)
            this.user = response.data
        })
    },
    methods: {
        async getCarousel() {
            try {
                const response = await axios.get("carousel");
                this.dataCarousel = response.data;
            } catch (error) {
                console.log("Oopss.. Error");
            }
        }
    },

    mounted() {
        if (!this.loggedIn) {
            return this.$router.push("/");
        }
    }
}
</script>
