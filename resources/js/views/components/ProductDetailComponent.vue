<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('UI/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Detail Produk</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/produk">
                            List Harga Produk
                        </router-link>
                    </li>
                    <li>
                        Detail List Harga
                    </li>
                </ol>
            </div>
        </div>
        <section id="price-details" class="price-details">
            <div class="container">
                <div v-for="(detail, index) in detailDataProduk" :key="index" class="row gy-4">
                    <div  class="col-lg-8">
                        <div class="price-details-slider swiper">
                            <div class="align-items-center">
                                <div class="">
                                    <img :src="detail.produk_image" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="price-info">
                            <h3>Project information</h3>
                            <ul>
                                <li><strong>Kategori</strong>: {{ detail.produk_kategori }}</li>
                                <!-- <li><strong>Client</strong>: Company</li> -->
                                <li><strong>Tanggal</strong>: 01 March, 2020</li>
                                <!-- <li>
                                    <strong>Project URL</strong>:
                                    <a href="#">www.example.com</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="price-description">
                            <h2>Detail Project</h2>
                            <p>
                                {{ detail.produk_deskripsi }}
                            </p>
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
import Contact from "@/views/components/contact/Contact.vue"

export default {
    name: "ProductDetail",
    components: {
        "app-contact" : Contact,
    },
    data() {
        return {
            detailDataProduk: []
        }
    },
    created() {
        this.getDetailProduk();
    },
    methods: {
        async getDetailProduk() {
            let slug = this.$route.params.slug;
            try {
                const response = await axios.get("produk/"+slug);
                this.detailDataProduk = response.data;
            } catch (error) {
                console.log("Oopss.. Error");
            }
        },
    }
}
</script>
