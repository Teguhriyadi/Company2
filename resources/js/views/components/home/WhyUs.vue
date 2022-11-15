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
                <template v-if="dataChooseUs.length">
                    <div class="col-lg-12 content order-lg-1 order-2" v-for="(choose, index) in dataChooseUs" :key="index">
                        <div v-html="choose.upload"></div>
                    </div>
                </template>
                <template v-else>
                    <center v-if="spinner">
                        <div class="col-lg-12">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </center>
                    <div class="col-lg-12" v-if="output">
                        <div class="alert alert-danger text-center">
                            <i>
                                <strong>
                                    Oopss.. Data Saat Ini Belum Tersedia
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
import axios from "axios"
export default {
    name: "ChooseUs",
    data() {
        return {
            dataChooseUs: [],
            spinner: false,
            output: false
        }
    },
    created() {
        this.getChooseUs();
    },
    methods: {
        async getChooseUs() {
            try {
                this.spinner = true
                const response = await axios.get("choose_us");
                if (response.data == "Data Tidak Ada") {
                    setTimeout(() => {
                        this.output = true
                        this.spinner = false
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.dataChooseUs = response.data
                        this.spinner = false
                    }, 1000);
                }
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>
