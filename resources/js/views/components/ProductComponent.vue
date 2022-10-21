<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('UI/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Price List</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>
                        List Harga Produk
                    </li>
                </ol>
            </div>
        </div>
        <section id="menu" class="menu">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Produk Jasa Yang Ditawarkan</h2>
                    <p>
                        Kami Mempunyai Beberapa Jasa Yang Bisa Ditawarkan Kepada Anda
                    </p>
                </div>
                <div class="row gy-5">
                    <div v-for="(produk , index) in dataProduk" :key="index" class="col-lg-4 menu-item text-center">
                        <a href="assets/img/hero-carousel/1.jpeg" class="glightbox">
                            <img src="assets/img/hero-carousel/1.jpeg" class="menu-img img-fluid" alt=""/>
                        </a>
                        <h4 class="pt-2">{{ produk.produk_judul }}</h4>
                        <p class="ingredients">
                            {{ produk.produk_deskripsi_singkat }}
                        </p>
                        <p style="color: orange; font-weight: bold; font-size: 20px;">{{ produk.produk_harga }}</p>
                        <router-link :to="{name: 'produkDetail', params: {slug: produk.produk_slug} }" class="btn btn-sm btn-warning text-light" style="width: 100%;">
                            <i class="fa fa-search"></i> Detail
                        </router-link>
                    </div>
                </div>
            </div>
        </section>
        <app-contact/>
    </main>
</template>

<script>
import axios from "axios"
import Kontak from "@/views/components/ContactComponent.vue"

export default {
    name: "Product",
    components: {
        "app-contact" : Kontak,
    },
    data() {
        return {
            dataProduk: []
        }
    },
    created() {
        this.getProduk();
    },
    methods: {
        async getProduk() {
            try {
                const response = await axios.get("produk");
                this.dataProduk = response.data;
            } catch (error) {
                console.lo("Oopss.. Error");
            }
        }
    }
}
</script>
