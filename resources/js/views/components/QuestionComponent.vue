<template>
    <section class="info-box py-0 mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch order-2 order-lg-1">
                    <div class="content">
                        <h3>
                            Bagaimana
                            <strong>Cara Memesan di Duo Bintang Studio</strong>
                        </h3>
                        <p>
                            Disini Ada Beberapa Cara Dalam Memesan Jasa Fotografi Yang Telah Kami Paparkan
                        </p>
                    </div>

                    <div class="accordion-list">
                        <ul>
                            <li v-for="(question , index) in dataQuestion" :key="index">
                                <a data-bs-toggle="collapse" :class="++index === 1 ? 'collapse' : 'collapsed' " :data-bs-target="'#accordion-list'+index">
                                    <span>{{ index }}</span> {{ question.question_pesan_judul }}
                                    <i class="bx bx-chevron-down icon-show"></i>
                                    <i class="bx bx-chevron-up icon-close"></i>
                                </a>
                                <div :id="'accordion-list'+index" :class="index === 1 ? 'collapse show' : 'collapse'" data-bs-parent=".accordion-list">
                                    <p>
                                        {{ question.question_pesan_deskripsi }}
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style="background-image: url(assets/img/about.jpg)">
                    &nbsp;
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import axios from "axios"
    export default {
        name: "Question",
        data() {
            return {
                dataQuestion: []
            }
        },
        created() {
            this.getQuestion();
        },
        methods: {
            async getQuestion() {
                try {
                    const response = await axios.get("question");
                    this.dataQuestion = response.data;
                } catch (error) {
                    console.log("Oopss. Error");
                }
            }
        }
    }
</script>
