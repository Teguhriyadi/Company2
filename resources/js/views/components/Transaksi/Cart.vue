<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/desain/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Keranjang Belanja</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>Cart</li>
                </ol>
            </div>
        </div>
        <div class="container price-details">
            <div class="book row gx-lg-0 gy-4">
                <div class="col-lg-4">
                    <div class="price-info">
                        <h3>Informasi Pesanan</h3>
                        <table>
                            <template v-for="(produk, index) in dataProduk" :key="index">
                                <tr>
                                    <td>
                                        <strong>Jasa</strong>
                                    </td>
                                    <td style="padding-right: 5px;">:</td>
                                    <td>{{ produk.produk_nama }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <hr>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Harga</strong>
                                    </td>
                                    <td style="padding-right: 5px;">:</td>
                                    <td>{{ produk.produk_harga }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <hr>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Deskripsi</strong>
                                    </td>
                                    <td>:</td>
                                    <td>{{ produk.produk_deskripsi_singkat }}</td>
                                </tr>
                            </template>
                        </table>
                    </div>
                    <div class="price-info mt-3">
                        <h3>Benefit Yang Didapatkan</h3>
                        <ul>
                            <li v-for="(benefit, index) in dataBenefit" :key="index">
                                <strong>
                                    <i class="fas fa-user"></i>
                                </strong>
                                {{ benefit.benefit_nama }}
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8">
                    <form method="POST" role="form" class="php-email-form" @submit.prevent="transaksi">
                        <div class="row">
                            <h3>Isi Data Pemesanan</h3>
                            <hr style="border-top: dotted 3px" />
                            <div class="alert alert-success" role="alert">
                                <i class="fas fa-check"></i>
                                Yeay, Kamu Telah Memilih <strong>{{ paket }}</strong>, Silahkan Lanjutkan Dengan Mengisi Form
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1" class="form-label">
                                    Nama Pemesan
                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="text" v-model="keranjang.nama" class="form-control" id="name" placeholder="Nama Pemesan" required/>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label for="exampleInputEmail1" class="form-label">
                                    Alamat Email
                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="email" class="form-control" v-model="keranjang.email" id="email" placeholder="Alamat Email" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1" class="form-label">
                                    Tanggal Booking
                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="date" class="form-control" v-model="keranjang.booking" required/>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label for="exampleInputEmail1" class="form-label">
                                    Nomor WA
                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="number" v-model="keranjang.nomor_hp" class="form-control" placeholder="Nomor Telepon" required/>
                            </div>
                            <div class="col-md-12 form-group mt-3 mt-md-0">
                                <label for="exampleInputEmail1" class="form-label">
                                    Lokasi Pemotretan/Videografi
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" v-model="keranjang.lokasi" class="form-control" placeholder="Masukkan Lokasi" required/>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control" v-model="keranjang.catatan" rows="7" placeholder="Catatan atau pertanyaan opsional" required></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn-warning btn-sm mt-2">
                                Booking Sekarang
                            </button>
                            <!-- <router-link :to="{name: 'cart_detail', params: {jasa: jasa, paket: paket} }" class="btn-sm btn btn-warning mt-2">
                                Booking Sekarang
                            </router-link> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import axios from "axios"

export default {
    name: "Cart",
    data() {
        return {
            dataProduk: [],
            dataBenefit: [],
            paket: [],
            jasa: [],
            keranjang: [],
            loggedIn: localStorage.getItem("loggedIn"),
            token: localStorage.getItem("token"),
            userId: [],
            harga: [],
            produkHarga: []
        }
    },
    created() {
        axios.get("/user", {
            headers: {
                'Authorization': 'Bearer ' + this.token
            }
        }).then(response => {
            console.log(response)
            this.userId = response.data.id
        });

        this.getProduk();
        this.getBenefit();
    },
    mounted() {

        let paket = this.$route.params.paket;
        let jasa = this.$route.params.jasa;

        this.paket = paket;
        this.jasa = jasa;
    },
    methods: {
        async getProduk() {
            let produk_id = this.$route.params.produk_id;

            try {
                const response = await axios.get("produk_paket/detail/"+produk_id);
                this.dataProduk = response.data;
                this.harga = response.data[0].harga;
                this.produkHarga = response.data[0].produk_harga
            } catch (error) {
                console.log(error);
            }
        },

        async getBenefit() {
            let produk_id = this.$route.params.produk_id;
            try {
                const response = await axios.get("benefit/"+produk_id);
                this.dataBenefit = response.data;
            } catch (error) {
                console.log(error);
            }
        },

        transaksi() {
            if (this.keranjang.nama && this.keranjang.email && this.keranjang.booking && this.keranjang.nomor_hp && this.keranjang.lokasi && this.keranjang.catatan) {
                axios.post("keranjang", {
                    nama: this.keranjang.nama,
                    email: this.keranjang.email,
                    tanggal: this.keranjang.booking,
                    harga: this.harga,
                    nomor_hp: this.keranjang.nomor_hp,
                    lokasi: this.keranjang.lokasi,
                    catatan: this.keranjang.catatan,
                    user_id: this.userId
                }).then(response => {
                    if (response.data.success) {
                        return this.$router.push({
                            name: 'cart_detail',
                            params: {
                                jasa: this.jasa,
                                paket: this.paket,
                                nama: this.keranjang.nama,
                                email: this.keranjang.email,
                                nomor_hp: this.keranjang.nomor_hp,
                                catatan: this.keranjang.catatan,
                                lokasi: this.keranjang.lokasi,
                                harga: this.harga,
                                produkHarga: this.produkHarga,
                                id_keranjang: response.data.data.id
                            }
                        });
                    }
                }).catch(error => {
                    console.log(error)
                });
                // axios.post("keranjang", {

                // })
                // }).then(response => {

                // }).catch(error => {
                //     console.log(error);
                // });
            }
        }
    }
}
</script>
