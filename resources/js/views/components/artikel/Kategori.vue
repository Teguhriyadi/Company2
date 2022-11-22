<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/theme/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Detail Kategori</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>Detail Kategori</li>
                </ol>
            </div>
        </div>
        <section id="blog" class="container blog">
            <div class="row">
                <div class="col-md-8">
                    <div id="recent-blog-posts" class="recent-blog-posts">
                        <div class="container" data-aos="fade-up">
                            <div class="row">
                                <div class="col-md-6 mb-5" data-aos="fade-up" data-aos-delay="100" v-for="(artikel, index) in dataArtikelByKategori" :key="index">
                                    <div class="post-item position-relative h-100">
                                        <div class="post-img position-relative overflow-hidden">
                                            <img :src="artikel.artikel_gambar" class="img-fluid" style="height: 300px;" />
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
                                            <hr>
                                            <router-link :to="{name: 'blog', params: {slug: artikel.artikel_slug}}" class="readmore stretched-link">
                                            <span>
                                                Selengkapnya
                                            </span>
                                            <i class="bi bi-arrow-right"></i>
                                        </router-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Search</h3>
                            <form action="" class="mt-3">
                                <input type="text" />
                                <button type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                        </div>

                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Kategori</h3>
                            <ul class="mt-3">
                                <li v-for="(kategori, index) in dataKategori" :key="index">
                                    <router-link :to="{name: 'detailKategori', params: {slug: kategori.kategori_slug} }">
                                        {{ kategori.kategori_nama }}
                                        <span>
                                            ({{ kategori.count }})
                                        </span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Postingan Terbaru</h3>

                            <div class="mt-3">
                                <div v-for="(terbaru, index) in dataArtikel" :key="index" class="post-item mt-3">
                                    <img :src="terbaru.artikel_gambar" alt="" />
                                    <div>
                                        <h4>
                                            <router-link :to="{name: 'blog', params: {slug: terbaru.artikel_slug} }">
                                                {{ terbaru.artikel_judul }}
                                            </router-link>
                                        </h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <app-tag/>

                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
import axios from "axios"
import TagSidebar from "@/views/components/TagSidebarComponent.vue"

export default {
    name: "DetailBlog",
    components: {
        "app-tag" : TagSidebar
    },
    data() {
        return {
            dataArtikelByKategori: [],
            dataArtikel: [],
            dataKategori: [],
            spinner: false,
            output: false
        }
    },
    created() {
        this.getByKategori();
        this.getArtikel();
        this.getKategori();
    },
    methods: {
        async getByKategori() {
            let slug = this.$route.params.slug;
            try {
                const response = await axios.get("artikel/kategori/"+slug);
                if (response.data.data == []) {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.spinner = false;
                        this.dataArtikelByKategori = response.data.data;
                    }, 1000);
                }
            } catch (error) {
                console.log("Oopss.. Error");
            }
        },

        async getArtikel() {
            let slug = this.$route.params.slug;
            try {
                const response = await axios.get("kategori/artikel/" + slug);
                this.dataArtikel = response.data.data;
            } catch (error) {
                console.log("Oopss.. Error");
            }
        },

        async getKategori() {
            let slug = this.$route.params.slug;

            try {
                const response = await axios.get("kategori/"+slug);
                this.dataKategori = response.data;
            } catch (error) {
                console.log("Oopss.. Error");
            }
        }
    }
}
</script>
