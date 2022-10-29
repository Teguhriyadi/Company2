<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('theme/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Kebijakan dan Privasi</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>
                        Kebijakan dan Privasi
                    </li>
                </ol>
            </div>
        </div>
        <section id="privacy" class="privacy section-bg">
            <div class="container">
                <div class="section-title">
                    <h2>Kebijakan dan Privasi</h2>
                    <p>
                        Magnam dolores commodi suscipit. Necessitatibus eius consequatur
                        ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam
                        quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
                        Quia fugiat sit in iste officiis commodi quidem hic quas.
                    </p>
                </div>
                <div class="privacy-list">
                    <template v-if="dataKebijakan.length">
                        <ul>
                            <li v-for="(kebijakan, index) in dataKebijakan" :key="index" data-aos="fade-up">
                                <i class="bx bx-help-circle icon-help"></i>
                                <a data-bs-toggle="collapse" :class="++index === 1 ? 'collapse' : 'collapsed' " :data-bs-target="'#privacy-list'+index">
                                    {{ kebijakan.kebijakan_judul }}
                                    <i class="bx bx-chevron-down icon-show"></i>
                                    <i class="bx bx-chevron-up icon-close"></i>
                                </a>
                                <div :id="'privacy-list'+index" :class="index === 1 ? 'collapse show' : 'collapse'" data-bs-parent=".privacy-list">
                                    <p>
                                        {{ kebijakan.kebijakan_deskripsi }}
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
                                        Oopss.. Data Kebijakan Dan Privasi Saat Ini Belum Tersedia
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
    name : "KebijakanPrivasi",
    data() {
        return {
            dataKebijakan: [],
            spinner: false,
            output: false
        }
    },
    created() {
        this.getKebijakanPrivasi();
    },
    methods: {
        async getKebijakanPrivasi() {
            this.spinner = true;
            try {
                const response = await axios.get("kebijakan_privasi");
                if (response.data == "Data Tidak Ada") {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.dataKebijakan = response.data;
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
