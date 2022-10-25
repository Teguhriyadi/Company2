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
                                        <h6>Mohammad Ilham Teguhriyadi</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Nomor WhatsApp
                                        </label>
                                        <h6>0817272721</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Email
                                        </label>
                                        <h6>rafliseptiann@gmail.com</h6>
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
                                        <h6>Foto harus bagus ya bang</h6>
                                        <label for="" class="form-label text-warning w-500">
                                            Total Pembayaran
                                        </label>
                                        <h6>Rp.20.000</h6>
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
                                        <div class="text-end">
                                            <a href="history-cart.html" style="font-size:12px ;" class="mt-3 btn btn-sm btn-warning w-25">
                                                <i class="fas fa-dollar-sign">

                                                </i>
                                                Lanjut Pembayaran
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
</template>

<script>
export default {
    name: "DetailPemesanan",
    data() {
        return {
            jasa: [],
            paket: []
        }
    },
    mounted() {
        let jasa = this.$route.params.jasa;
        this.jasa = jasa;

        let paket = this.$route.params.paket;
        this.paket = paket;
    }
}
</script>
