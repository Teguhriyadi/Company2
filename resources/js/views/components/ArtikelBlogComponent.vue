<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Blog Details</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>Blog Details</li>
                </ol>
            </div>
        </div>
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-5">
                    <div class="col-lg-8" v-for="(artikel, index) in detailArtikel" :key="index">
                        <article class="blog-details">
                            <div class="post-img">
                                <img :src="artikel.artikel_gambar" alt="" class="img-fluid"/>
                            </div>

                            <h2 class="title">
                                {{ artikel.artikel_judul }}
                            </h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-person"></i>
                                        <span>{{ artikel.artikel_created_by }}</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock"></i>
                                        <a href="blog-details.html">
                                            <time datetime="2020-01-01">Jan 1, 2022</time>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="content">
                                <p>
                                    {{ artikel.artikel_deskripsi }}
                                </p>
                            </div>

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li>
                                        <a href="#">
                                            {{ artikel.artikel_kategori }}
                                        </a>
                                    </li>
                                </ul>

                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Marketing</a></li>
                                </ul>
                            </div>
                        </article>
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
                                        <router-link :to="{name: 'detailKategori', params: {slug: kategori.kategori_slug} }">
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
            detailArtikel: [],
            dataArtikel: [],
            dataKategori: []
        }
    },
    created() {
        this.getDetailArtikel();
        this.getArtikel();
        this.getKategori();
    },
    methods: {
        async getDetailArtikel() {
            let slug = this.$route.params.slug;
            try {
                const response = await axios.get("artikel/"+slug);
                this.detailArtikel = response.data;
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
            try {
                const response = await axios.get("kategori");
                this.dataKategori = response.data;
            } catch (error) {
                console.log("Oopss.. Error");
            }
        }
    }
}
</script>
