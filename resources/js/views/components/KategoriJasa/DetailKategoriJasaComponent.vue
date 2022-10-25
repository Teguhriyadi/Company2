<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/UI/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Detail Price List</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>Detail Price List</li>
                </ol>
            </div>
        </div>
        <section id="price-details" class="price-details">
            <div class="container">
                <div class="row gy-4" v-for="(detail, index) in detailJasa" :key="index">
                    <div class="col-lg-8">
                        <div class="price-details-slider swiper">
                            <div class="align-items-center">
                                <div class="">
                                    <img :src="detail.produk_gambar" alt="" />
                                </div>
                            </div>
                            <div class="mt-4 ms-3">
                                <p class="btn btn-dark position-relative">
                                    Jepretan Foto Outdoor
                                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                                        <span class="visually-hidden">
                                            New alerts
                                        </span>
                                    </span>
                                </p>
                            </div>
                            <div id="projects" class="projects mt-2 text-center">
                                <div class="container" data-aos="fade-left">
                                    <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
                                        <div class="col-lg-4 col-md-6" v-for="(hasil, index) in dataHasilFoto" :key="index">
                                            <div class="portfolio-content h-100">
                                                <img :src="hasil.hasil_gambar" class="img-fluid" alt=""/>
                                                <div class="portfolio-info">
                                                    <a :href="hasil.hasil_gambar" title="Remodeling 1" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">
                                                        <i class="bi bi-eye ms-4"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="price-info">
                            <h3>Informasi Jasa</h3>
                            <ul>
                                <li>
                                    <strong>Nama</strong> : {{ detail.produk_nama }}
                                </li>
                                <li>
                                    <strong>Harga</strong> : {{ detail.produk_harga }}
                                </li>
                            </ul>
                        </div>
                        <div class="price-info mt-3">
                            <h3>Benefit Yang Didapatkan</h3>
                            <ul>
                                <li v-for="(benefit, index) in dataBenefit" :key="index">
                                    <strong>
                                        <i class="fas fa-user"></i>
                                    </strong> Hasil Foto
                                    {{ benefit.benefit_nama }}
                                </li>
                            </ul>
                        </div>
                        <div class="price-description">
                            <h2>Tentang Produk</h2>
                            <p>
                                {{ detail.produk_deskripsi }}
                            </p>
                            <router-link to="" class="btn btn-sm btn-warning w-100 text-light">
                                Booking Sekarang
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
import axios from "axios"
export default {
    name: "DetailKategoriJasa",
    data() {
        return {
            detailJasa: [],
            dataBenefit: [],
            dataHasilFoto: []
        }
    },
    created() {
        this.getDetailJasa();
        this.getBenefit();
        this.getHasilFoto();
    },
    methods: {
        async getDetailJasa() {
            let produk_id = this.$route.params.id;
            try {
                const response = await axios.get("produk_paket/detail/"+produk_id);
                this.detailJasa = response.data;
            } catch (error) {
                console.log("Oopss.. Error");
            }
        },

        async getBenefit() {
            let produk_id = this.$route.params.id;
            try {
                const response = await axios.get("benefit/"+produk_id);
                this.dataBenefit = response.data;
            } catch (error) {
                console.log(error);
            }
        },

        async getHasilFoto() {
            let produk_id = this.$route.params.id;
            try {
                const response = await axios.get("hasil_jasa/"+produk_id);
                this.dataHasilFoto = response.data;
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>
