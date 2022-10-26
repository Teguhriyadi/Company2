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
                            <div class="row">
                                <div class="col-6">
                                    <h4>Detail Pemesanan</h4>
                                </div>
                                <hr class="mb-2">
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="" class="form-label text-warning w-500">
                                            Nama Pemesan
                                        </label>
                                        <h6>{{ pemesan }}</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Nomor WhatsApp
                                        </label>
                                        <h6>{{ nomor_wa }}</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Email
                                        </label>
                                        <h6>{{ email }}</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="" class="form-label text-warning w-500">
                                            Jenis Jasa
                                        </label>
                                        <h6>{{ jasa }}</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Jenis Paket Jasa
                                        </label>
                                        <h6>{{ paket }}</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Jenis Hasil Jasa
                                        </label>
                                        <h6>Buku Album</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="" class="form-label text-warning w-500">
                                            Lokasi Pemotretan
                                        </label>
                                        <h6>Monas</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Catatan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <h6>{{ catatan }}</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Total Pembayaran
                                        </label>
                                        <h6>{{ produkHarga }}</h6>
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
                                                <i class="fas fa-dollar-sign">

                                                </i>
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
            jasa: [],
            paket: [],
            pemesan: [],
            nomor_wa: [],
            email: [],
            catatan: [],
            pembayaran: [],
            keranjang_id: [],
            produkHarga: [],
            json: []
        }
    },
    mounted() {
        let jasa = this.$route.params.jasa;
        this.jasa = jasa;

        let paket = this.$route.params.paket;
        this.paket = paket;

        let nama = this.$route.params.nama;
        this.pemesan = nama;

        let nomor_hp = this.$route.params.nomor_hp;
        this.nomor_wa = nomor_hp

        let email = this.$route.params.email;
        this.email = email

        let catatan = this.$route.params.catatan;
        this.catatan = catatan

        let produkHarga = this.$route.params.produkHarga;
        this.produkHarga = produkHarga

        let keranjang_id = this.$route.params.id_keranjang;
        this.keranjang_id = keranjang_id
    },
    created() {
        this.payment();
    },
    methods: {
        async payment() {
            let idCart = this.$route.params.id_keranjang;
            try {
                const response = await axios.get("payment/"+idCart)
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
                    console.log(result);
                    document.getElementById("json_callback").value = JSON.stringify(result);

                },
                onPending: function(result)
                {
                    console.log(result);
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
                    // window.location = "/";
                },
                onError: function(result)
                {
                    console.log(result);
                    document.getElementById("json_callback").value = JSON.stringify(result);
                    $("#submit").submit();
                },
                onClose: function()
                {
                    alert('you closed the popup without finishing the payment');
                    document.getElementById("json_callback").value = JSON.stringify(result);
                    $("#submit").submit();
                }
            });
        }
    }
}

</script>
