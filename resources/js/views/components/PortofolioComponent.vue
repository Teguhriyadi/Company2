<template>
    <app-header/>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('UI/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Portfolio</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>Portfolio</li>
                </ol>
            </div>
        </div>
        <section id="projects" class="projects">
            <div class="container" data-aos="fade-up">
                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
                    <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-remodeling">Fotografi</li>
                        <li data-filter=".filter-construction">Videografi</li>
                        <li data-filter=".filter-repairs">Editing</li>
                        <li data-filter=".filter-design">Broadcasting</li>
                    </ul>

                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        <div v-for="(portofolio, index) in dataPortofolio" :key="index" class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                            <div class="portfolio-content h-100">
                                <img :src="portofolio.portfolio_foto" class="img-fluid" alt=""/>
                                <div class="portfolio-info">
                                    <h4>{{ portofolio.portfolio_nama }}</h4>
                                    <p>{{ portofolio.portfolio_deskripsi }}</p>
                                    <a :href="portofolio.portfolio_foto" title="Remodeling 1" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                    <a href="project-details.html" title="More Details" class="details-link">
                                        <i class="bi bi-link-45deg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <app-contact/>
    </main>
</template>

<script>
import axios from "axios"
import Header from "@/views/components/HeaderComponent.vue"
import Hero from "@/views/components/HeroComponent.vue"
import Contact from "@/views/components/ContactComponent.vue"

export default {
    name: "Portofolio",
    components: {
        "app-header" : Header,
        "app-hero" : Hero,
        "app-contact": Contact
    },
    data() {
        return {
            dataPortofolio: []
        }
    },
    created() {
        this.getPortofolio();
    },
    methods: {
        async getPortofolio() {
            try {
                const response = await axios.get("portfolio");
                this.dataPortofolio = response.data;
            } catch (error) {
                console.log("Oopss.. Error");
            }
        }
    }
}
</script>
