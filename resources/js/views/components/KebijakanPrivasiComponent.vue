<template>
    <app-header/>
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
                </div>
            </div>
        </section>
        <app-footer/>
    </main>
</template>

<script>
import axios from "axios"
import Header from "@/views/components/HeaderComponent.vue"
import Footer from "@/views/components/FooterComponent.vue"

export default {
    name : "KebijakanPrivasi",
    components: {
        "app-header" : Header,
        "app-footer" : Footer
    },
    data() {
        return {
            dataKebijakan: []
        }
    },
    created() {
        this.getKebijakanPrivasi();
    },
    methods: {
        async getKebijakanPrivasi() {
            try {
                const response = await axios.get("kebijakan_privasi");
                this.dataKebijakan = response.data;
            } catch (error) {
                console.log("Oopss. Error");
            }
        }
    }
}
</script>
