<template>
  <section id="testimonials" class="testimonials section-bg">
    <div class="container">
      <div class="section-title" data-aos="fade-up">
        <h2>Testimonial</h2>
        <p>Beberapa Testing Yang Sudah Kami Lakukan</p>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-inner">
          <div v-for="(testimonial, index) in testimonials" :key="index" :class="index === 0 ? 'carousel-item active' : 'carousel-item'">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img :src="testimonial.testimonial_foto" class="testimonial-img" alt=""/>
                <h3>{{ testimonial.testimonial_nama }}</h3>
                <h4>{{ testimonial.testimonial_jobtitle }}</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{ testimonial.testimonial_review }}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center">
          <button v-for="(testimonial, index) in testimonials" :key="index" type="button" data-bs-target="#carouselExampleIndicators" :data-bs-slide-to="index" :class="index === 0 ? 'active' : '' " aria-current="true" aria-label="Slide 1" style="padding: 10px; margin-right: 5px; border: none; border-radius: 50%;"></button>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    name: "TestimonialComponents",
    data() {
      return {
        testimonials: []
      }
    },
    created() {
      this.getTestimonial();
    },
    methods: {
      async getTestimonial() {
        try {
          const response = await axios.get("testimonial");
          this.testimonials = response.data;
        } catch (error) {
          console.log("Error");
        }
      }
    }
  }
</script>
