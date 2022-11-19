<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/desain/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>
                    Semua Artikel
                </h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>
                        Semua Artikel
                    </li>
                </ol>
            </div>
        </div>

        <section id="blog" class="container blog">
            <div id="recent-blog-posts" class="recent-blog-posts">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <template v-if="all_artikel.length">
                            <div class="col-md-4 mb-5" v-for="(artikel, index) in all_artikel" :key="index" data-aos="fade-up" data-aos-delay="100">
                                <div class="post-item position-relative h-100">
                                    <div class="post-img position-relative overflow-hidden">
                                        <img :src="artikel.artikel_gambar" class="img-fluid" style="height: 300px;">
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
                                                <span class="ps-2">
                                                    {{ artikel.dibuat_oleh.nama }}
                                                </span>
                                            </div>
                                            <span class="px-3 text-black-50">/</span>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-folder2"></i>
                                                <span class="ps-2">
                                                    {{ artikel.kategori.kategori_nama }}
                                                </span>
                                            </div>
                                        </div>

                                        <hr />

                                        <router-link :to="{name: 'blog', params: {slug: artikel.artikel_slug}}" class="readmore stretched-link">
                                            <span>
                                                Selengkapnya
                                            </span>
                                            <i class="bi bi-arrow-right"></i>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template v-else>
                            <center>
                                <div class="col-md-12" v-if="spinner">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="alert alert-danger text-center" v-if="output">
                                    <i>
                                        <strong>
                                            Oopss.. Data Artikel Saat Ini Belum Tersedia
                                        </strong>
                                    </i>
                                </div>
                            </center>
                        </template>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
export default {
    name: "AllArtikel",
    data() {
        return {
            all_artikel: [],
            spinner: false,
            output: false
        }
    },
    created() {
        this.getAllArtikel()
    },
    methods: {
        async getAllArtikel() {
            try {
                this.spinner = true;
                const response = await axios.get("all-artikel")
                if (response.data.data == []) {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.spinner = false;
                        this.all_artikel = response.data.data;
                    }, 1000);
                }
            } catch (error) {
                console.log(error)
            }
        }
    }
}
</script>
