<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Category Details</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>Category Details</li>
                </ol>
            </div>
        </div>
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <div id="categories" class="recent-blog-posts">
                            <div class="container" data-aos="fade-up">
                                <div clas="row gy-5">
                                    <div v-for="(categori, index) in dataArtikelByKategori" :key="index" class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                        <div class="post-item position-relative h-100">
                                            <div class="post-img position-relative overflow-hidden">
                                                <img :src="categori.artikel_gambar" class="img-fluid" alt=""/>
                                                <span class="post-date">
                                                    December 12
                                                </span>
                                            </div>

                                            <div class="post-content d-flex flex-column">
                                                <h3 class="post-title">
                                                    {{ categori.artikel_judul }}
                                                </h3>

                                                <div class="meta d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-person"></i>
                                                        <span class="ps-2">
                                                            {{ categori.artikel_created_by }}
                                                        </span>
                                                    </div>
                                                    <span class="px-3 text-black-50">/</span>
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-folder2"></i>
                                                        <span class="ps-2">{{ categori.artikel_kategori }}</span>
                                                    </div>
                                                </div>

                                                <hr />

                                                <router-link :to="{name: 'blog', params: {slug:categori.artikel_slug } }" class="readmore stretched-link">
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
                    <div class="col-lg-4">
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
                                        <router-link :to="{name: 'filterKategori', params: {slug: kategori.kategori_slug} }">
                                            {{ kategori.kategori_nama }} <span>20</span>
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
            dataKategori: []
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
                this.dataArtikelByKategori = response.data;
            } catch (error) {
                console.log("Oopss.. Error");
            }
        },

        async getArtikel() {
            let slug = this.$route.params.slug;
            try {
                const response = await axios.get("artikel/detail/"+slug);
                this.dataArtikel = response.data;
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
