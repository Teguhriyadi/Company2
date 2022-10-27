<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/desain/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Detail Harga Jasa</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>Detail Harga Jasa</li>
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
                                    Beberapa Hasil Foto Dari Jasa
                                </p>
                            </div>
                            <div id="projects" class="projects mt-2">
                                <template v-if="dataHasilFoto.length">
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
                                </template>
                                <template v-else>
                                    <div v-if="load" class="col-md-12">
                                        <i>
                                            <strong>
                                                Data Sedang Dalam Perjalanan
                                            </strong>
                                        </i>
                                    </div>
                                    <div v-if="output" class="col-md-12">
                                        <div class="alert alert-danger">
                                            <i>
                                                <strong>
                                                    Sepertinya Belum Ada Data Yang Bisa Ditampilkan
                                                </strong>
                                            </i>
                                        </div>
                                    </div>
                                </template>
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
                                <template v-if="dataBenefit.length">
                                    <li v-for="(benefit, index) in dataBenefit" :key="index">
                                        <strong>
                                            <i class="fas fa-user"></i>
                                        </strong> Hasil Foto
                                        {{ benefit.benefit_nama }}
                                    </li>
                                </template>
                                <template v-else>
                                    <div v-if="load">
                                        <i>
                                            Tunggu Sebentar Yaa
                                        </i>
                                    </div>
                                    <div v-if="output" class="alert alert-danger">
                                        <i>
                                            <strong>
                                                Oopss.. Belum Ada Data
                                            </strong>
                                        </i>
                                    </div>
                                </template>
                            </ul>
                        </div>
                        <div class="price-description">
                            <h2>Tentang Produk</h2>
                            <p>
                                {{ detail.produk_deskripsi }}
                            </p>
                            <router-link :to="{name: 'cart', params: {produk_id: detail.produk_id, paket: paket, jasa: jasa} }" class="btn btn-sm btn-warning w-100 text-light">
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
            dataHasilFoto: [],
            paket: [],
            jasa: [],
            load: false,
            output: false,
        }
    },
    created() {
        this.getDetailJasa();
        this.getBenefit();
        this.getHasilFoto();
    },
    mounted() {
        let paket = this.$route.params.paket;
        let jasa = this.$route.params.jasa
        this.paket = paket;
        this.jasa = jasa;
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
                this.load = true;

                const response = await axios.get("benefit/"+produk_id);
                if (response.data == "Data Tidak Ada") {
                    setTimeout(() => {
                        this.load = false;
                        this.output = true;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.load = false;
                        this.dataBenefit = response.data;
                    }, 1000);
                }
            } catch (error) {
                console.log(error);
            }
        },

        async getHasilFoto() {
            let produk_id = this.$route.params.id;
            try {
                const response = await axios.get("hasil_jasa/"+produk_id);
                if (response.data == "Data Tidak Ada") {
                    setTimeout(() => {
                        this.load = false;
                        this.output = true;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.load = false;
                        this.dataHasilFoto = response.data;
                    }, 1000);
                }
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>
