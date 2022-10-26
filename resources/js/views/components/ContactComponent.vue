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

                        <div class="col-lg-6">
                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" class="form-control" id="name" required/>
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required/>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="subject">Subjek</label>
                                    <input type="text" class="form-control" name="subject" id="subject" required/>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="message">Pesan</label>
                                    <textarea class="form-control" name="message" rows="8" required></textarea>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">
                                        Your message has been sent. Thank you!
                                    </div>
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
            </div>
        </div>
    </section>
</template>

<script>
    import axios from "axios"
    export default {
        name: "Contact",
        data() {
            return {
                dataContact: []
            }
        },
        created() {
            this.getContact();
        },
        methods: {
            async getContact() {
                try {
                    const response = await axios.get("profil_perusahaan");
                    this.dataContact = response.data;
                } catch (error) {
                    console.log("Oopss.. Error");
                }
            }
        }
    }
</script>
