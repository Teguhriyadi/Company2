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
                        Detail History Belanja
                    </li>
                </ol>
            </div>
        </div>
        <section id="price-details" class="price-details">
            <template v-if="dataKeranjang.length">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" v-for="(history, index) in dataKeranjang" :key="index">
                            <div class="price-info">
                                <div class="row">
                                    <div class="col-6">
                                        <h4>History Pemesanan : Paket Outdoor</h4>
                                    </div>
                                    <div class="col-6 text-end mb-0">
                                        <h4>
                                            Status |
                                            <span class="text-success">
                                                Selesai
                                            </span>
                                        </h4>
                                    </div>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-1">
                                            <label for="" class="form-label text-warning w-500">
                                                Nama Pemesan
                                            </label>
                                            <h6>{{ history.history_nama }}</h6>
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
                                                Jasa yang dipesan
                                            </label>
                                            <h6>Fotografi</h6>
                                            <label for="" class="form-label text-warning w-500">
                                                Tanggal booking
                                            </label>
                                            <h6>{{ history.history_waktu }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-1">
                                            <label for="" class="form-label text-warning w-500">
                                                Total Pembayaran
                                            </label>
                                            <h6>{{ history.history_harga }}</h6>
                                            <label for="" class="form-label text-warning w-500">
                                                Metode Pembayaran
                                            </label>
                                            <h6>Bank BCA</h6>
                                        </div>
                                    </div>
                                    <hr class="mt-3" style="border-top: dotted 3px;">
                                    <div class="text-end">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="mt-3 me-2 btn btn-sm btn-warning">
                                            <i class="fas fa-star"></i>
                                            Nilai
                                        </a>
                                        <a href="" class="mt-3 me-2 btn btn-sm btn-outline-primary">
                                            <i class="fas fa-arrow-alt-circle-up"></i>
                                            Booking Lagi
                                        </a>
                                        <a href="" class="mt-3 me-2 btn btn-sm btn-success">
                                            <i class="fas fa-download"></i>
                                            Download Bukti Pemesanan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal custom fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title fs-5" id="exampleModalLabel">Nilai Pelayanan Kami</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Kualitas Foto :</p>
                                    </div>
                                    <div class="col-sm-8 text-start">
                                        <div class="rate-foto">
                                            <input type="radio" id="star5" name="rate-foto" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rate-foto" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rate-foto" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rate-foto" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rate-foto" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Pelayanan Fotografer :</p>
                                    </div>
                                    <div class="col-sm-6 text-start">
                                        <div class="rate">
                                            <input type="radio" id="star7" name="rate" value="7" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star8" name="rate" value="8" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star9" name="rate" value="9" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star10" name="rate" value="10" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star11" name="rate" value="11" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Kritik dan Saran</label>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-sm btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            <template v-else>
                <center v-if="spinner">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </center>
                <div class="container" v-if="output">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <i>
                                    <strong>
                                        Oopss.. Sepertinya Anda Belum Pernah Melakukan Transaksi
                                    </strong>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </section>
    </main>
</template>

<script>
export default {
    name: "HistoryBelanja",
    data() {
        return {
            dataKeranjang: [],
            spinner: false,
            output: false
        }
    },
    created() {
        this.getKeranjang();
    },
    methods: {
        async getKeranjang() {
            this.spinner = true;
            let idUser = this.$route.params.id_user;
            try {
                const response = await axios.get("history/"+idUser);
                if (response.data == "Data Tidak Ada") {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.spinner = false;
                        this.dataKeranjang = response.data;
                    }, 1000);
                }
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>
