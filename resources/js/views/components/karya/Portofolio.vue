<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/theme/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>
                    Portofolio
                    <template v-if="namaJasa.length">
                        {{ namaJasa }}
                    </template>
                    <template v-else>

                    </template>
                </h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>
                        Portofolio
                    </li>
                </ol>
            </div>
        </div>
        <section id="video" class="container">
            <div class="section-header">
                <h2>
                    Portofolio
                    <template v-if="namaJasa.length">
                        {{ namaJasa }}
                    </template>
                    <template v-else>

                    </template>
                </h2>
                <p>
                    Beberapa Karya Kami Yang Sudah Dipesan Oleh Beberapa Client Yang Telah Menggunakan Jasa Kami
                </p>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 ">
                <template v-if="dataPortofolio.length">
                    <template v-for="(portofolio, index) in dataPortofolio" :key="index">
                        <template v-if="idJasa == portofolio.kategori.id">
                            <div class="col-md-6">
                                <div class="card" style="height: 100%;">
                                    <iframe width="100%" :src="portofolio.portofolio_url"  style="height: 300px;"></iframe>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ portofolio.portofolio_nama }}
                                        </h5>
                                        <p class="card-text">
                                            {{ portofolio.portofolio_deskripsi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </template>
                </template>
                <template v-else>
                    <div class="col-md-12">
                        <center v-if="spinner">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </center>
                    </div>
                    <div class="col-md-12" v-if="output">
                        <div class="alert alert-danger">
                            <center>
                                <i>
                                    <strong>
                                       " Oopss.. Sepertinya Data Portofolio Tidak Ada "
                                    </strong>
                                </i>
                            </center>
                        </div>
                    </div>
                </template>
            </div>
        </section>
    </main>
</template>

<script>
export default {
    name: "Portofolio",
    data() {
        return {
            namaJasa: [],
            dataPortofolio: [],
            idJasa: [],
            spinner: false,
            output: false,
        }
    },
    created() {
        this.getJasa();
        this.getPortofolio();
    },
    methods: {
        async getJasa() {
            let slug = this.$route.params.slug;
            try {
                const response = await axios.get("kategori_jasa/" + slug);
                this.namaJasa = response.data.data.jasa_nama
                this.idJasa = response.data.data.jasa_id
            } catch (error) {
                console.log(error);
            }
        },

        async getPortofolio() {
            this.spinner = true;
            let slug = this.$route.params.slug;
            try {
                const response = await axios.get("portofolio/" + slug);
                if (response.data.data.length == 0) {
                    setTimeout(() => {
                        this.output = true
                        this.spinner = false
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.dataPortofolio = response.data.data;
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
