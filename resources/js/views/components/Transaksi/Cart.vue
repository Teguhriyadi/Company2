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
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
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
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Pemesan" required/>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label for="exampleInputEmail1" class="form-label">
                                    Alamat Email
                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Alamat Email" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1" class="form-label">
                                    Tanggal Booking
                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="date" class="form-control" placeholder="Nomor WA" required/>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label for="exampleInputEmail1" class="form-label">
                                    Nomor WA
                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="number" class="form-control" placeholder="Nomor Telepon" required/>
                            </div>
                            <div class="col-md-12 form-group mt-3 mt-md-0">
                                <label for="exampleInputEmail1" class="form-label">
                                    Lokasi Pemotretan/Videografi
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" data-bs-toggle="dropdown" placeholder="Masukkan Lokasi" required/>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="7" placeholder="Catatan atau pertanyaan opsional" required></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <router-link :to="{name: 'cart_detail', params: {jasa: jasa, paket: paket} }" class="btn-sm btn btn-warning mt-2">
                                Booking Sekarang
                            </router-link>
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
            jasa: []
        }
    },
    created() {
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
        }
    }
}
</script>
