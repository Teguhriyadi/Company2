<template>
    <section id="kontak" class="contact section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Kontak</h2>
                <p>
                    Apabila Terdapat Pertanyaan Mengenai Informasi Yang Kami Berikan. Silahkan Bisa Isi Form di Bawah Ini.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row">

                        <template v-if="dataContact.length">
                            <div class="col-lg-6">
                                <div class="row justify-content-center" v-for="(contact, index) in dataContact" :key="index">
                                    <div class="col-md-6 info d-flex flex-column align-items-stretch">
                                        <i class="fas fa-location"></i>
                                        <h4>Alamat</h4>
                                        <p>
                                            {{ contact.profil_alamat }}
                                        </p>
                                    </div>
                                    <div class="col-md-6 info d-flex flex-column align-items-stretch">
                                        <i class="fas fa-phone"></i>
                                        <h4>Telepon</h4>
                                        <p>
                                            {{ contact.profil_no_hp }}
                                        </p>
                                    </div>
                                    <div class="col-md-6 info d-flex flex-column align-items-stretch">
                                        <i class="fas fa-envelope"></i>
                                        <h4>Email</h4>
                                        <p>{{ contact.profil_email }}</p>
                                    </div>
                                    <div class="col-md-6 info d-flex flex-column align-items-stretch">
                                        <i class="fas fa-times-circle"></i>
                                        <h4>Jam Kerja</h4>
                                        <p>
                                            Senin - Jumat : 08.00 - 16.00
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template v-else>
                            <div class="col-lg-6">
                                <center v-if="spinner">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </center>
                                <div class="alert alert-danger text-center" v-if="output">
                                    <i>
                                        <strong>
                                            Oopss.. Data Profil Perusahaan Saat Ini Belum Tersedia
                                        </strong>
                                    </i>
                                </div>
                            </div>
                        </template>
                        <div class="col-lg-6">
                            <form method="post" role="form" class="php-email-form" @submit.prevent="kirimPesan">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" v-model="pesan.nama" class="form-control" id="nama" required/>
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <label for="email">Email</label>
                                        <input type="email" v-model="pesan.email" class="form-control" id="email" required/>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="subject">Subjek</label>
                                    <input type="text" v-model="pesan.subjek" class="form-control" id="subject" required/>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="pesan">Pesan</label>
                                    <textarea class="form-control" v-model="pesan.teks" id="pesan" rows="8" required></textarea>
                                </div>
                                <div class="text-center pt-3">
                                    <button type="submit" class="button-kirim">
                                        <span v-if="loading">
                                            <i>
                                                Form Isian Anda Sedang Diproses
                                            </i>
                                        </span>
                                        <span v-else>
                                            Kirim
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.button-kirim {
    width: 100%;
    padding: 5px 10px 5px 10px;
    font-size: 14px;
    font-weight: bold;
}

</style>

<script>
import axios from "axios"
export default {
    name: "Contact",
    data() {
        return {
            dataContact: [],
            pesan: [],
            loading: false,
            spinner: false,
            output: false,
        }
    },
    created() {
        this.getContact();
    },
    methods: {
        async getContact() {
            this.spinner = true;
            try {
                const response = await axios.get("profil_perusahaan");
                if (response.data[0].message == "Data Tidak Ada") {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.dataContact = response.data;
                        this.spinner = false;
                    }, 1000);
                }
            } catch (error) {
                console.log("Oopss.. Error");
            }
        },

        kirimPesan() {
            if (this.pesan.nama && this.pesan.email && this.pesan.subjek && this.pesan.teks) {
                axios.post("pesan", {
                    pesan_nama: this.pesan.nama,
                    pesan_email: this.pesan.email,
                    pesan_subjek: this.pesan.subjek,
                    pesan_teks: this.pesan.teks
                }).then(response => {
                    this.loading = true;
                    setTimeout(() => {
                        this.loading = false;
                        alert("Data Berhasil di Tambahkan");
                        window.location = '/'
                    }, 1000);
                }).catch(error => {
                    alert("Harap Isi Form Dengan Benar");
                });
            }
        }
    }
}
</script>
