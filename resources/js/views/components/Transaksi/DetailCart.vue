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
                                        <h6 v-if="form.nama">{{ form.nama }}</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Nomor WhatsApp
                                        </label>
                                        <h6 v-if="form.nomor_hp">{{ form.nomor_hp }}</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Email
                                        </label>
                                        <h6 v-if="form.email">{{ form.email }}</h6>
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
                                        <h6 v-if="form.lokasi">
                                            {{ form.lokasi }}
                                        </h6>
                                        <h6 v-else>
                                            <strong>
                                                Tidak Ada
                                            </strong>
                                        </h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Catatan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <h6 v-if="form.catatan">{{ form.catatan }}</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Total Pembayaran
                                        </label>
                                        <h6 v-if="form.harga">Rp. {{ form.harga }}</h6>
                                    </div>
                                </div>
                                <hr class="mt-3" style="border-top: dotted 3px;">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="mb-1">
                                            <b>Notes:</b>
                                        </p>
                                        <p style="font-size: 14px;">
                                            Apabila Lokasi Jauh Dari Keberadaan Kami. Maka Anda Akan Dikenakan Biaya Tambahan Untuk Transportasi Kami.
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end" id="pay-button">
                                            <a @click="buttonPay" style="font-size:12px ;" class="mt-3 btn btn-sm btn-warning w-25">
                                                <i class="fas fa-dollar-sign"></i>
                                                Lanjutkan Pembayaran
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
            form: {
                nama: [],
                nomor_hp: [],
                email: [],
                lokasi: [],
                catatan: [],
                harga: []
            }
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
                    this.form = response.data.data
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
                console.log(this.pembayaran)
            } catch (error) {
                console.log(error);
            }
        },

        send_response_callback(result) {
            document.getElementById("json_callback").value = JSON.stringify(result);
            $("#submit").submit();
        },

        kirimPesan() {
            console.log("ada");
        },

        buttonPay() {
            window.snap.pay(this.pembayaran, {
                onSuccess: function(result)
                {
                    alert("Sukses, Pembayaran Selesai")
                    let kirim = document.getElementById("json_callback").value = JSON.stringify(result);
                    this.json = kirim;
                    axios.post("payment", {
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
