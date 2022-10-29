<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/desain/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>
                    SK
                </h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>
                        Syarat dan Ketentuan
                    </li>
                </ol>
            </div>
        </div>
        <section id="faq" class="faq section-bg">
            <div class="container">
                <div class="section-title">
                    <h2>Syarat dan Ketentuan</h2>
                    <p>
                        Magnam dolores commodi suscipit. Necessitatibus eius consequatur
                        ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam
                        quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
                        Quia fugiat sit in iste officiis commodi quidem hic quas.
                    </p>
                </div>

                <div class="faq-list">
                    <template v-if="dataSyaratKetentuan.length">
                        <ul>
                            <li v-for="(syarat, index) in dataSyaratKetentuan" :key="index" data-aos="fade-up">
                                <i class="bx bx-help-circle icon-help"></i>
                                <a data-bs-toggle="collapse" :class="++index === 1 ? 'collapse' : 'collapsed' " :data-bs-target="'#faq-list'+index">
                                    {{ syarat.syarat_ketentuan_judul }}
                                    <i class="bx bx-chevron-down icon-show"></i>
                                    <i class="bx bx-chevron-up icon-close"></i>
                                </a>
                                <div :id="'faq-list'+index" :class="index === 1 ? 'collapse show' : 'collapse'" data-bs-parent=".faq-list">
                                    <p>
                                        {{ syarat.syarat_ketentuan_deskripsi }}
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </template>
                    <template v-else>
                        <center v-if="spinner" class="text-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </center>
                        <div class="col-md-12" v-if="output">
                            <div class="alert alert-danger text-center">
                                <i>
                                    <strong>
                                        Oopss.. Data Syarat dan Ketentuan Saat Ini Belum Tersedia
                                    </strong>
                                </i>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
import axios from "axios"

export default {
    name: "SyaratKetentuan",
    data() {
        return {
            dataSyaratKetentuan: [],
            spinner: false,
            output: false
        }
    },
    created() {
        this.getSyaratKetentuan();
    },
    methods: {
        async getSyaratKetentuan() {
            this.spinner = true;
            try {
                const response = await axios.get("syarat_ketentuan");
                if (response.data == "Data Tidak Ada") {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.dataSyaratKetentuan = response.data;
                        this.spinner = false;
                    }, 1000);
                }
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>
