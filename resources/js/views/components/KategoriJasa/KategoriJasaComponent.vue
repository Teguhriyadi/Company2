<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/theme/img/about.jpg')">
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

        <template v-if="namaJasa == 'Jasa Animasi' || namaJasa == 'Jasa Videografi' ">
            <section id="pricing" class="pricing">
                <div class="container" data-aos="fade-up">
                    <div class="section-header">
                        <h2>Harga {{ namaJasa }} </h2>
                        <p>
                            Kami Menyediakan Beberapa Jasa Harga Yang Bisa Anda Pilih Sesuai Dengan Kebutuhan
                        </p>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-10">
                            <div class="alert alert-warning" role="alert">
                                <p class="mb-0">Sebelum memesan, harap konsultasi terlebih dahulu ya ke admin kami</p>
                            </div>
                        </div>
                        <div class="col-md-2 pt-2">
                            <a target="_blank" href="https://wa.me/6281411126356?text=Hai%20Admin" class="btn btn-success" style="width: 100%;">
                                <i class="fa fa-phone"></i> Hubungi admin
                            </a>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-left">
                        <template v-if="dataProdukPaket.length">
                            <template v-for="(produk, index) in dataProdukPaket" :key="index">
                                <div v-if="idJasa == produk.produk_paket_jasa_id" class="col-lg-3 col-md-6 mb-3">
                                    <div class="box" data-aos="zoom-in" data-aos-delay="100">
                                        <h3>{{ produk.produk_paket_nama }}</h3>
                                        <h4>
                                            <sup>Rp</sup>
                                            <span style="color: orange; font-size: 20px; font-weight:">{{ produk.harga }} / Project</span>
                                        </h4>
                                        <ul>
                                            <template v-if="dataBenefit.length">
                                                <template v-for="(benefit, index) in dataBenefit" :key="index">
                                                    <li v-if="benefit.benefit_produk_id == produk.produk_id">
                                                        {{ benefit.benefit_nama }}
                                                    </li>
                                                    <li v-else class="na">
                                                        {{ benefit.benefit_nama }}
                                                    </li>
                                                </template>
                                            </template>
                                            <template v-else>
                                                <center v-if="spinner">
                                                    <div class="spinner-border" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </center>
                                                <div class="alert alert-danger text-center" v-if="output">
                                                    <i>
                                                        <strong style="color: white;">
                                                            Benefit Belum Tersedia
                                                        </strong>
                                                    </i>
                                                </div>
                                            </template>
                                        </ul>
                                        <div class="btn-wrap">
                                            <template v-if="!user.nama">
                                                <a class="btn-buy" @click="autentikasi">
                                                    Booking Sekarang
                                                </a>
                                            </template>
                                            <template v-else>
                                                <a class="btn-buy" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="booking(produk.produk_id)">
                                                    Booking Sekarang
                                                </a>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </template>
                        <template v-else>
                            <center v-if="spinner">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </center>
                        </template>
                    </div>
                </div>
            </section>
        </template>
        <template v-else>
            <section id="menu" class="menu">
                <div class="container" data-aos="fade-up">
                    <div class="section-header">
                        <h2>Harga {{ namaJasa }} </h2>
                        <p>
                            Kami Menyediakan Beberapa Jasa Harga Yang Bisa Anda Pilih Sesuai Dengan Kebutuhan
                        </p>
                    </div>

                    <template v-if="dataJasa.length">
                        <div class="text-start mt-4 mb-4" v-for="(jasa, index) in dataJasa" :key="index">
                            <h5 style="color: rgb(0, 0, 63)">
                                {{ jasa.paket_kategori_paket_nama }} {{ namaJasa }} {{ jasa.paket_kategori_jasa_id }}
                            </h5>
                            <div class="row gy-5">
                                <template v-for="(produk, index) in dataProdukPaket" :key="index">
                                    <template v-if="jasa.paket_kategori_jasa_id == produk.produk_paket_jasa_id">
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
                    </template>
                    <template v-else>
                        <center v-if="load">
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
            </section>
        </template>
    </main>

    <!-- Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Konfirmasi Pesan
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" @submit.prevent="konfirmasi">
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <strong>
                                Apakah Sudah Menerima Kode?
                            </strong>
                            Jika Sudah Inputkan Kode Dibawah
                        </div>
                        <div class="form-group">
                            <label for="kode_verifikasi"> Kode Verifikasi </label>
                            <input type="text" class="form-control mt-2" v-model="input.kode_verifikasi" placeholder="Ex: 123456" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plane"></i> Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END -->

</template>

<script>
export default {
    name: "KategoriJasa",
    data() {
        let nama = this.$route.params.nama;
        let id = this.$route.params.id;
        return {
            namaJasa: nama,
            dataJasa: [],
            dataKosong: [],
            dataProdukPaket: [],
            dataProduk: [],
            idJasa: id,
            dataBenefit: [],
            spinner: false,
            output: false,
            input: [],
            loggedIn: localStorage.getItem("loggedIn"),
            token: localStorage.getItem("token"),
            user: [],
            load: false
        }
    },
    created() {
        this.getData();
        this.getProdukPaket();
        this.getProduk();
        this.getBenefit();
        axios.get("/user", {
            headers: {
                'Authorization': 'Bearer ' + this.token
            }
        }).then(response => {
            this.user = response.data
        })
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
            this.load = true;
            try {
                const response = await axios.get("produk_paket");
                setTimeout(() => {
                    this.dataProdukPaket = response.data;
                    this.load = false;
                }, 500);
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
        },

        async getBenefit() {
            this.spinner = true;
            try {
                const response = await axios.get("benefit");
                if (response.data == "Data Tidak Ada") {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.dataBenefit = response.data;
                        this.spinner = false;
                    }, 1000);
                }
            } catch (error) {
                console.log(error);
            }
        },

        autentikasi() {
            alert("Oopss.. Anda Belum Login");
            window.location = "/login";
        },

        booking(produk_id) {
            this.produkId = produk_id;

            return this.produkId;
        },

        konfirmasi() {
            if (this.input.kode_verifikasi) {
                let kode = this.input.kode_verifikasi
                axios.post("generate", {
                    kode: kode
                }).then(response => {
                    if (response.data == "Data Tidak Ada") {
                        alert("Kode Yang Anda Masukkan Salah");
                    } else {
                        if (response.data[0].jasa_id == this.idJasa) {
                            if (response.data[0].status == 1) {
                                axios.post("jasa_token", {
                                    kode: kode,
                                    user_id: this.user.id,
                                    created_by: response.data[0].created_by,
                                    jasa_id: this.idJasa,
                                    produk_id: this.produkId
                                }).then(response => {
                                    if (response.data.success == 1) {

                                        setTimeout(() => {

                                            alert("Token Diterima, Anda Akan Diarahkan Ke Halaman Selanjutnya");
                                            $(".modal").modal("hide");
                                            return this.$router.push(
                                            {
                                                name: 'cart',
                                                params:
                                                {
                                                    produk_id: this.produkId,
                                                    nama_jasa: this.namaJasa
                                                }
                                            },
                                            );
                                        }, 1000);
                                    }
                                }).catch(error => {
                                    alert(error);
                                });
                            } else {
                                alert("Kode Verifikasi Tidak Aktif");
                            }
                        } else {
                            alert("Token Hanya Dapat Digunakan Pada Jasa Yang Sesuai");
                        }
                    }
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
}
</script>
