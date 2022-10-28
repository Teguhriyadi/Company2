<template>
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Jasa</h2>
                <p>
                    Duo Bintang Studio Mempunyai Beberapa Jasa Yang Ditawarkan
                </p>
            </div>

            <div class="row gy-4">

                <div v-for="(jasa, index) in dataServices" :key="index" class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-location"></i>
                        </div>
                        <h3>{{ jasa.services_title }}</h3>
                        <p>
                            {{ jasa.services_deskripsi }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
    import axios from "axios";
    export default {
        name: "Services",
        data() {
            return {
                dataServices: []
            }
        },
        created() {
            this.getServices();
        },
        methods: {
            async getServices() {
                try {
                    const response = await axios.get("services");
                    this.dataServices = response.data;
                } catch (error) {
                    console.log("Oopss.. Error");
                }
            }
        }
    }
</script>
