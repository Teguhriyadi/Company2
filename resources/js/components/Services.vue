<template>
    <section id="jasa" class="services">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Jasa</h2>
                <p>
                    Kami Menawarkan Beberapa Jasa Untuk Pelanggan Kami Yang Berlangganan
                </p>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" v-for="service in services" :key="service.id">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon">
                            <i :class="service.services_icon"></i>
                        </div>
                        <h4 class="title">
                            {{ service.services_title }}
                        </h4>
                        <p class="description">
                            {{ service.services_deskripsi }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "ServiceComponents",
        data() {
            return {
                services: []
            }
        },
        created() {
            this.getService();
        },
        methods: {
            async getService() {
                try {
                    const response = await axios.get("services");
                    this.services = response.data
                } catch (error) {
                    console.log("Oopss. Terjadi Kesalahan");
                }
            }
        }
    }
</script>
