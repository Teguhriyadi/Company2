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
                <template v-if="dataServices.length">
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
                </template>
                <template v-else>
                    <center v-if="spinner">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </center>
                    <div class="col-md-12" v-if="output">
                        <div class="alert alert-danger text-center">
                            <i>
                                <strong>
                                    Oopss.. Data Jasa Saat Ini Belum Tersedia
                                </strong>
                            </i>
                        </div>
                    </div>
                </template>
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
            dataServices: [],
            spinner: false,
            output: false
        }
    },
    created() {
        this.getServices();
    },
    methods: {
        async getServices() {
            try {
                this.spinner = true;
                const response = await axios.get("services");
                if (response.data == "Data Tidak Ada") {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.dataServices = response.data;
                        this.spinner = false;
                    }, 1000);
                }
            } catch (error) {
                console.log("Oopss.. Error");
            }
        }
    }
}
</script>
