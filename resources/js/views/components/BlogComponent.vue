<template>
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Postingan Artikel</h2>
                <p>
                    Beberapa Postingan Belakangan Ini
                </p>
            </div>

            <div class="row gy-5 pb-5">
                <template v-if="dataArtikel.length">
                    <div v-for="(artikel, index) in dataArtikel" :key="index" class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="post-item position-relative h-100">
                            <div class="post-img position-relative overflow-hidden">
                                <img :src="artikel.artikel_gambar" class="img-fluid" alt=""/>
                                <span class="post-date">
                                    {{ artikel.launching }}
                                </span>
                            </div>

                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">
                                    {{ artikel.artikel_judul }}
                                </h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i>
                                        <span class="ps-2">{{ artikel.dibuat_oleh.nama }}</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i>
                                        <span class="ps-2">{{ artikel.kategori.kategori_nama }}</span>
                                    </div>
                                </div>

                                <hr />

                                <router-link :to="{name: 'blog', params: {slug: artikel.artikel_slug} }" class="readmore stretched-link">
                                    <span>Selengkapnya</span>
                                    <i class="bi bi-arrow-right"></i>
                                </router-link>
                            </div>
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
                                    Oopss.. Data Artikel Saat Ini Belum Tersedia
                                </strong>
                            </i>
                        </div>
                    </div>
                </template>
            </div>
            <center v-if="button">
                <button class="btn btn-success pt-2 pb-2" style="width: 50%; border-radius: 50px;">
                    Lihat Lebih Banyak
                </button>
            </center>
        </div>
    </section>
</template>

<script>
import axios from "axios"
export default {
    name: "Artikel",
    data() {
        return {
            dataArtikel: [],
            spinner: false,
            output: false,
            button: false
        }
    },
    created() {
        this.getArtikel();
    },
    methods: {
        async getArtikel() {
            try {
                this.spinner = true;
                const response = await axios.get("artikel");
                console.log(response.data.meta)
                if (response.data.meta.total > response.data.meta.per_page ) {
                    this.button = true;
                }
                if (response.data.data == []) {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.spinner = false;
                        this.dataArtikel = response.data.data;
                    }, 1000);
                }
            } catch (error) {
                console.log("Oopss.. Error");
            }
        }
    }
}
</script>
