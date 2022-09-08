<template>
    <section id="portfolio" class="portfolio">
        <div class="container">
          <div class="section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>
                Beberapa Portfolio Kami
            </p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">App</li>
                <li data-filter=".filter-card">Card</li>
                <li data-filter=".filter-web">Web</li>
              </ul>
            </div>
          </div>

          <div
            class="row portfolio-container"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <div class="col-lg-4 col-md-6 portfolio-item filter-app" v-for="portfolio in portfolios" :key="portfolio.id">
              <div class="portfolio-wrap">
                <img
                  :src="portfolio.portfolio_foto"
                  class="img-fluid"
                  alt=""
                />
                <div class="portfolio-info">
                  <h4>{{ portfolio.portfolio_nama }}</h4>
                  <p>{{ portfolio.nama_kategori }}</p>

                  <div class="portfolio-links">
                    <a
                      href="assets/img/portfolio/portfolio-1.jpg"
                      data-gallery="portfolioGallery"
                      class="portfolio-lightbox"
                      title="App 1"
                      ><i class="bx bx-plus"></i
                    ></a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</template>

<script>
    export default {
        name: "PortfolioComponents",
        data() {
            return {
                portfolios: []
            }
        },
        created() {
            this.getPortfolio();
        },
        methods: {
            async getPortfolio() {
                try {
                    const response = await axios.get("portfolio");
                    this.portfolios = response.data;
                } catch (error) {
                    console.log("Oopss.. Terjadi Kesalahan");
                }
            }
        }
    }
</script>
