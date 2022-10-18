<template>
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Portfolio</h2>
                <p>
                    Beberapa Portfolio Kami
                </p>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
                <div class="col-lg-4 col-md-6 portfolio-item" v-for="portfolio in portfolios" :key="portfolio.id">
                    <div class="portfolio-wrap">
                        <img :src="portfolio.portfolio_foto" class="img-fluid" style="height: 300px;">
                        <div class="portfolio-info">
                            <h4>{{ portfolio.portfolio_nama }}</h4>
                            <p>{{ portfolio.portfolio_deskripsi }}</p>
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
