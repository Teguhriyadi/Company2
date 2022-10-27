<template>
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div v-for="(profil, index) in dataProfilPerusahaan" :key="index" class="col-lg-4 col-md-6 footer-contact">
                        <h3>{{ profil.profil_nama }}</h3>
                        <p>
                            <i>
                                <b>
                                   " {{ profil.profil_singkat }} "
                                </b>
                            </i>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Jasa Yang Ditawarkan</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="portfolio.html">Fotografi</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Videografi</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Editing</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Kategori Jasa</h4>
                        <ul>
                            <li v-for="(kategori, index) in dataKategoriJasa" :key="index">
                                <i class="fas fa-arrow-right" style="padding-right: 5px;"></i>
                                <router-link :to="{name: 'kategoriJasa', params: {slug: kategori.kategori_jasa_slug, id: kategori.kategori_id, nama: kategori.kategori_jasa_nama} }">
                                    {{ kategori.kategori_jasa_nama }}
                                </router-link>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Selengkapnya</h4>
                        <ul>
                            <li>
                                <router-link to="/syarat_ketentuan">
                                    <i class="bx bx-chevron-right"></i> Syarat & Ketentuan
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/kebijakan_privasi">
                                    <i class="bx bx-chevron-right"></i> Kebijakan & Privasi
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright
                    <strong>
                        <span>StudioFoto</span>
                    </strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by
                    <strong>Mohammad Ilham Teguhriyadi</strong>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="fas fa-user"></i></a>
                <a href="#" class="instagram"><i class="fas fa-user"></i></a>
                <a href="#" class="google-plus"><i class="fas fa-user"></i></a>
            </div>
        </div>
    </footer>
</template>

<script>
    import axios from "axios"
    export default {
        name: "Footer",
        data() {
            return {
                dataProfilPerusahaan: [],
                dataKategoriJasa: []
            }
        },
        created() {
            this.getProfilPerusahaan();
            this.getKategoriJasa();
        },
        methods: {
            async getProfilPerusahaan() {
                try {
                    const response = await axios.get("profil_perusahaan");
                    this.dataProfilPerusahaan = response.data;
                } catch (error) {
                    console.log("Oopss. Error");
                }
            },

            async getKategoriJasa() {
                try {
                    const response = await axios.get("kategori_jasa");
                    this.dataKategoriJasa = response.data;
                } catch (error) {
                    console.log("Oopss. Error");
                }
            }
        }
    }
</script>
