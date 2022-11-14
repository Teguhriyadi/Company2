<template>
    <section id="tentang_kami" class="about">
        <div class="container" data-aos="fade-up">
            <div v-for="(about, index) in dataAbout" :key="index" class="row position-relative">
                <div class="col-lg-7 about-img img-fluid" :style="{'background-image' : 'url('+about.profil_foto+')'}"></div>

                <div class="col-lg-7">
                    <h2>About Our Studio</h2>
                    <div class="our-story">
                        <h4>Est 2022</h4>
                        <h3>Deskripsi</h3>
                        <p>
                            {{ about.profil_deskripsi }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import axios from "axios"
    export default {
        name: "AboutUs",
        data() {
            return {
                dataAbout: []
            }
        },
        created() {
            this.getAbout();
        },
        methods: {
            async getAbout() {
                try {
                    const response = await axios.get("profil_perusahaan");
                    this.dataAbout = response.data;
                } catch (error) {
                    console.log("Oopss. Error");
                }
            }
        }
    }
</script>
