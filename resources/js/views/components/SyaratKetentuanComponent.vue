<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('theme/img/about.jpg')">
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
            dataSyaratKetentuan: []
        }
    },
    created() {
        this.getSyaratKetentuan();
    },
    methods: {
        async getSyaratKetentuan() {
            try {
                const response = await axios.get("syarat_ketentuan");
                this.dataSyaratKetentuan = response.data;
            } catch (error) {
                console.log("Oopss. Error");
            }
        }
    }
}
</script>
