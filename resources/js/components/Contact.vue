<template>
    <section id="kontak" class="contact">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Kontak Kami</h2>
            </div>

            <div class="row" v-for="contact in contacts" :key="contact.id">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-about">
                        <h3>{{ contact.profil_nama }}</h3>
                        <p>
                            {{ contact.profil_deskripsi }}
                        </p>
                        <div class="social-links">
                            <a href="#" class="twitter">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="instagram">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="linkedin">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="info">
                        <div>
                            <i class="ri-map-pin-line"></i>
                            <p>{{ contact.profil_alamat }}</p>
                        </div>

                        <div>
                            <i class="ri-mail-send-line"></i>
                            <p>{{ contact.profil_email }}</p>
                        </div>

                        <div>
                            <i class="ri-phone-line"></i>
                            <p>{{ contact.profil_no_hp }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
                    <form method="POST" role="form" class="php-email-form" @submit.prevent="saveKirimanPertanyaan">
                        <div class="form-group">
                            <input type="text" v-model="data.pesan_nama" class="form-control" id="name" placeholder="Nama Anda" required/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" v-model="data.pesan_email" id="email" placeholder="Email" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" v-model="data.pesan_subjek" id="subject" placeholder="Subjek" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" v-model="data.pesan_nama_perusahaan" class="form-control" id="name" placeholder="Nama Perusahaan" required/>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" v-model="data.pesan_teks" rows="5" placeholder="Pesan" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit">
                                Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "ContactComponents",
        data() {
            return {
                data: {},
                contacts: []
            }
        },
        created() {
            this.getContacts();
        },
        methods: {
            async getContacts() {
                try {
                    const response = await axios.get("profil_perusahaan");
                    this.contacts = response.data;
                } catch (error) {
                    console.log("Oopss.. Terjadi Kesalahan");
                }
            },

            saveKirimanPertanyaan(e) {
                axios.post("contact_us", this.data)
                .then(() => {
                    this.$router.push("/");
                }).catch(error => {
                    console.log(error.response);
                });

                this.errors = [];

                e.preventDefault();

                this.data = [];
            }
        }
    }
</script>
