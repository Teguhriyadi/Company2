<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/desain/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Detail Pemesanan</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>
                        Detail Pemesanan
                    </li>
                </ol>
            </div>
        </div>
        <section id="price-details" class="price-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="price-info">
                            <h4>Detail Pemesanan</h4>
                            <hr class="mb-2">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-1">
                                        <label for="" class="form-label text-warning w-500">
                                            Nama Pemesan
                                        </label>
                                        <h6 v-if="nama.length">
                                            {{ nama }}
                                        </h6>
                                        <h6 v-else>

                                        </h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Nomor WhatsApp
                                        </label>
                                        <h6 v-if="nomor_wa.length">
                                            {{ nomor_wa }}
                                        </h6>
                                        <h6 v-else>

                                        </h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Email
                                        </label>
                                        <h6 v-if="email.length">
                                            {{ email }}
                                        </h6>
                                        <h6 v-else></h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-1">
                                        <label for="" class="form-label text-warning w-500">
                                            Jenis Jasa
                                        </label>
                                        <h6>{{ jasa }}</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Jenis Paket Jasa
                                        </label>
                                        <h6 v-if="paket">
                                            {{ paket }}
                                        </h6>
                                        <h6 v-else>
                                            <strong>
                                                Tidak Ada
                                            </strong>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-1">
                                        <label for="" class="form-label text-warning w-500">
                                            Lokasi Pemotretan
                                        </label>
                                        <h6 v-if="lokasi.length">
                                            {{ lokasi }}
                                        </h6>
                                        <h6 v-else>

                                        </h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Catatan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <h6 v-if="catatan.length">
                                            {{ catatan }}
                                        </h6>
                                        <h6 v-else>

                                        </h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Total Pembayaran
                                        </label>
                                        <h6 v-if="harga.length">
                                            Rp. {{ harga }}
                                        </h6>
                                        <h6 v-else>

                                        </h6>
                                    </div>
                                </div>
                                <hr class="mt-3" style="border-top: dotted 3px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-1">
                                            <b>Notes:</b>
                                        </p>
                                        <p style="font-size: 14px;">
                                            Apabila Lokasi Jauh Dari Keberadaan Kami. Maka Anda Akan Dikenakan Biaya Tambahan Untuk Transportasi Kami.
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-end" id="pay-button">
                                            <a @click="buttonPay" style="font-size:12px ;" class="mt-3 p-2 btn btn-sm btn-warning ">
                                                <i class="fas fa-dollar-sign"></i> Lanjutkan
                                                Pembayaran
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <form id="submit" method="POST" @submit.prevent="kirimPesan">
        <input type="hidden" name="user_id" id="user_id" :value="user_id">
        <input type="hidden" id="nama" :value="nama">
        <input type="hidden" id="email" :value="email">
        <input type="hidden" id="tanggal_booking" :value="tanggal">
        <input type="hidden" id="nomor_hp" :value="nomor_wa">
        <input type="hidden" id="lokasi" :value="lokasi">
        <input type="hidden" id="catatan" :value="catatan">
        <input type="hidden" id="id_cart" :value="id_cart">
        <input type="hidden" name="json" id="json_callback">
    </form>
</template>

<script>

import axios from "axios"

export default {
    name: "DetailPemesanan",
    data() {
        return {
            id_cart: [],
            json: [],
            checkout: [],
            nama: [],
            nomor_wa: [],
            email: [],
            tanggal: [],
            lokasi: [],
            catatan: [],
            harga: [],
            user_id: []
        }
    },
    created() {
        this.getCheckout();
        this.payment();
    },
    methods: {
        async getCheckout() {
            let id_cart = this.$route.params.id_cart;
            try {
                const response = await axios.get("checkout/" + id_cart);
                setTimeout(() => {
                    this.id_cart = id_cart;
                    this.tanggal = response.data.data.tanggal;
                    this.nama = response.data.data.nama
                    this.email = response.data.data.email
                    this.nomor_wa = response.data.data.nomor_hp
                    this.lokasi = response.data.data.lokasi
                    this.catatan = response.data.data.catatan
                    this.harga = response.data.data.harga
                    this.user_id = response.data.data.user_id.id
                }, 1000);
            } catch (error) {
                console.log(error);
            }
        },
        async payment() {
            let id_cart = this.$route.params.id_cart;
            try {
                const response = await axios.get("payment/"+id_cart)
                this.pembayaran = response.data[0].snap_token
            } catch (error) {
                console.log(error);
            }
        },

        send_response_callback(result) {
            document.getElementById("json_callback").value = JSON.stringify(result);
            document.getElementById("user_id").value = JSON.stringify(result)
            $("#submit").submit();
        },

        kirimPesan() {
            console.log("ada");
        },

        buttonPay() {
            window.snap.pay(this.pembayaran, {
                onSuccess: function(result)
                {
                    let nama = document.getElementById("nama").value;
                    let email = document.getElementById("email").value;
                    let tanggal_booking = document.getElementById("tanggal_booking").value;
                    let nomor_hp = document.getElementById("nomor_hp").value;
                    let lokasi = document.getElementById("lokasi").value;
                    let catatan = document.getElementById("catatan").value;
                    let id_cart = document.getElementById("id_cart").value;
                    let kirim = document.getElementById("json_callback").value = JSON.stringify(result);
                    let idUser = document.getElementById("user_id").value

                    this.user_id = idUser
                    this.id_cart = id_cart
                    this.nama = nama
                    this.email = email
                    this.tanggal_booking = tanggal_booking
                    this.nomor_hp = nomor_hp
                    this.lokasi = lokasi
                    this.catatan = catatan
                    this.json = kirim

                    alert("Sukses, Pembayaran Selesai")
                    axios.post("payment", {
                        user_id: this.user_id,
                        id_cart: this.id_cart,
                        nama: this.nama,
                        email: this.email,
                        tanggal_booking: this.tanggal_booking,
                        nomor_hp: this.nomor_hp,
                        lokasi: this.lokasi,
                        catatan: this.catatan,
                        json: this.json
                    }).then(response => {
                        console.log(response)
                        window.location = '/'
                    }).catch(error => {
                        console.log(error);
                    });

                },
                onPending: function()
                {
                    alert("Good, Data Anda Sedang di Proses");

                    window.location = "/";
                },
                onError: function()
                {
                    alert("Periksa Kembali Data Anda");
                },
                onClose: function()
                {
                    alert("Yaah, Transaksi Anda Dibatalkan");
                }
            });
        }
    }
}

</script>
