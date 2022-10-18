<template>
    <section id="home" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Ayo Bergabung Bersama Kami</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">
                        Pusat Jasa Layanan Digital Website
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="800">
                        <br>
                        <a href="#tentang_kami" class="btn-get-started scrollto">
                            Get Started
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="/assets/img/hero-img.png" class="img-fluid animated pt-5" alt=""/>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
    .btn-get-started {
        background-color: #3498db;
        padding: 10px 30px 10px 30px;
        color: white;
        border-radius: 50px;

    }
</style>

<script>
    export default {
        name: "HeroComponents"
    }
</script>
