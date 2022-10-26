<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/UI/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Kategori {{ namaJasa }} </h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>
                        Kategori {{ namaJasa }}
                    </li>
                </ol>
            </div>
        </div>
        <section id="menu" class="menu">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Harga {{ namaJasa }} </h2>
                    <p>
                        Kami Menyediakan Beberapa Jasa Harga Yang Bisa Anda Pilih Sesuai Dengan Kebutuhan
                    </p>
                </div>
                <div v-if="dataJasa.length">
                    <div class="text-start mt-4 mb-4" v-for="(jasa, index) in dataJasa" :key="index">
                        <h5 style="color: rgb(0, 0, 63)">
                            {{ jasa.paket_kategori_paket_nama }} {{ namaJasa }}
                        </h5>
                        <div class="row gy-5">
                            <template v-for="produk in dataProdukPaket" :key="produk.id">
                                <template v-if="jasa.paket_id == produk.produk_paket_jasa_id">
                                    <div class="col-lg-4 menu-item text-center">
                                        <a href="/UI/img/hero-carousel/1.jpeg" class="glightbox">
                                            <img :src="produk.produk_paket_gambar" class="menu-img img-fluid" alt=""/>
                                        </a>
                                        <h4 class="mt-2">
                                            {{ produk.produk_paket_nama }}
                                        </h4>
                                        <p class="ingredients">
                                            {{ produk.produk_paket_deskripsi_singkat }}
                                        </p>
                                        <p style="color: orange; font-size: 18px; font-weight: bold;">
                                            {{ produk.produk_paket_harga }}
                                        </p>
                                        <router-link :to="{name: 'detailPaketJasa', params: {slug: produk.produk_paket_slug, id: produk.produk_id, paket: jasa.paket_kategori_paket_nama, jasa: namaJasa} }" class="btn btn-sm btn-warning text-light" style="width: 100%;">
                                            Detail
                                        </router-link>
                                    </div>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div class="col-lg-4 menu-item text-center" v-for="produk in dataProduk" :key="produk.id">
                        <a href="/UI/img/hero-carousel/1.jpeg" class="glightbox">
                            <img src="/UI/img/hero-carousel/1.jpeg" class="menu-img img-fluid" alt=""/>
                        </a>
                        <h4 class="mt-2">
                            {{ produk.produk_judul }}
                        </h4>
                        <p class="ingredients">
                            {{ produk.produk_deskripsi_singkat }}
                        </p>
                        <p style="color: orange; font-size: 18px; font-weight: bold;">
                            {{ produk.produk_harga }}
                        </p>
                        <a href="detail-price.html" class="btn btn-sm btn-warning text-light" style="width: 100%;">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
export default {
    name: "KategoriJasa",
    data() {
        let nama = this.$route.params.nama;
        return {
            namaJasa: nama,
            dataJasa: [],
            dataKosong: [],
            dataProdukPaket: [],
            dataProduk: []
        }
    },
    created() {
        this.getData();
        this.getProdukPaket();
        this.getProduk();
    },
    methods: {
        async getData() {
            let id = this.$route.params.id;
            try {
                const response = await axios.get("paket_jasa/"+id)
                if (response.data == "Data Tidak Ada") {
                    this.dataKosong
                } else {
                    this.dataJasa = response.data
                }

            } catch (error) {
                console.log("Oopss.. Erorr");
            }
        },

        async getProdukPaket() {
            try {
                const response = await axios.get("produk_paket");
                this.dataProdukPaket = response.data;
            } catch (error) {
                console.log("Oopss.. Error");
            }
        },

        async getProduk() {
            let id = this.$route.params.id;
            try {
                const response = await axios.get("produk/filter/"+id);
                this.dataProduk = response.data;
            } catch (error) {
                console.log("Oopss.. Error");
            }
        }
    }
}
</script>
