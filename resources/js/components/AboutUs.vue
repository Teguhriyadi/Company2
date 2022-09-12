<template>
    <section id="tentang_kami" class="about_us">
        <div class="container">
          <div class="section-title">
            <h2 data-aos="fade-up" data-aos-delay="400">Tentang Kami</h2>
            <p data-aos="fade-up" data-aos-delay="400">

              Magnam dolores commodi suscipit. Necessitatibus eius consequatur
              ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam
              quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
              Quia fugiat sit in iste officiis commodi quidem hic quas.
            </p>
          </div>

          <div class="row no-gutters">
            <div class="col-md-12">
                Mohammad
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
        methods: {
            async getAbout() {
                try {

                } catch (error) {
                    console.log("Oopss.. Terjadi Kesalahan");
                }
            }
        }
    }
</script>
