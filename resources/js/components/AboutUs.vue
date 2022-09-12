<template>
    <section id="tentang_kami" class="about_us">
        <div class="container">
          <div class="section-title">
            <h2 data-aos="fade-up" data-aos-delay="400">Tentang Kami</h2>
            <p data-aos="fade-up" data-aos-delay="400">
                Deskripsi Singkat Tentang Perusahaan Kami
            </p>
          </div>

          <div class="row no-gutters" v-for="about in abouts" :key="about.id">
            <div class="col-xl-7 d-flex align-items-stretch order-2 order-lg-1">
              <div class="content d-flex flex-column justify-content-center">
                <div class="row">
                  <div class="col-md-12 icon-box" data-aos="fade-up">
                    <i class="bx bx-receipt"></i>
                    <h4>{{ about.judul }}</h4>
                    <p>
                      {{ about.deskripsi }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="image col-xl-5 d-flex align-items-stretch justify-content-center order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
              <img :src="about.foto" class="img-fluid animated" style="width: 100%;">
            </div>
          </div>
        </div>
      </section>
</template>

<script>
    export default {
        name: "AboutUsComponents",
        data() {
            return {
                abouts: []
            }
        },
        created() {
            this.getAbout();
        },
        methods: {
            async getAbout() {
                try {
                    const response = await axios.get("tentang_kami");
                    this.abouts = response.data;
                } catch (error) {
                    console.log("Oopss.. Terjadi Kesalahan");
                }
            }
        }
    }
</script>
