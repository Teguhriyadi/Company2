<template>
    <section id="why">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Mengapa Memilih Kami</h2>
                <p>
                    Beberapa Alasan Mengapa Anda Harus Memilih Jasa Yang Kami Miliki
                </p>
            </div>

            <div class="row why-container">
                <div class="col-lg-6 content order-lg-1 order-2">
                    <p>
                        Jasa Yang Kami Tawarkan Akan Selalu Mengutamakan Kenyamanan Customer / Pelanggan. Kami Mempunyai Alasan Mengapa Harus Memilih Jasa Kami, yaitu :
                    </p>

                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bi bi-card-checklist"></i></div>
                        <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                        <p class="description">
                            Et harum quidem rerum facilis est et expedita distinctio. Nam
                            libero tempore, cum soluta nobis est eligendi
                        </p>
                    </div>

                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bi bi-brightness-high"></i></div>
                        <h4 class="title"><a href="">Magni Dolores</a></h4>
                        <p class="description">
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa
                            qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>

                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                        <h4 class="title"><a href="">Dolor Sitema</a></h4>
                        <p class="description">
                            Minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex ea commodo consequat tarad limino ata
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 background order-lg-2" data-aos="zoom-in">
                    <img src="/desain/img/hero-carousel/1.jpeg" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from "axios"
export default {
    name: "ChooseUs",
    data() {
        return {
            dataChooseUs: []
        }
    },
    created() {
        this.getChooseUs();
    },
    methods: {
        async getChooseUs() {
            try {
                const response = await axios.get("choose_us");
                this.dataChooseUs = response.data;
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>
