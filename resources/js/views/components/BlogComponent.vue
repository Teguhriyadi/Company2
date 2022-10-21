<template>
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Postingan Artikel</h2>
                <p>
                    Beberapa Postingan Belakangan Ini
                </p>
            </div>

            <div class="row gy-5">

                <div v-for="(artikel, index) in dataArtikel" :key="index" class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="post-item position-relative h-100">
                        <div class="post-img position-relative overflow-hidden">
                            <img :src="artikel.artikel_gambar" class="img-fluid" alt=""/>
                            <span class="post-date">December 12</span>
                        </div>

                        <div class="post-content d-flex flex-column">
                            <h3 class="post-title">
                                {{ artikel.artikel_judul }}
                            </h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i>
                                    <span class="ps-2">{{ artikel.artikel_created_by }}</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i>
                                    <span class="ps-2">{{ artikel.artikel_kategori }}</span>
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

            </div>
        </div>
    </section>
</template>

<script>
    import axios from "axios"
    export default {
        name: "Artikel",
        data() {
            return {
                dataArtikel: []
            }
        },
        created() {
            this.getArtikel();
        },
        methods: {
            async getArtikel() {
                try {
                    const response = await axios.get("artikel");
                    this.dataArtikel = response.data;
                } catch (error) {
                    console.log("Oopss.. Error");
                }
            }
        }
    }
</script>
