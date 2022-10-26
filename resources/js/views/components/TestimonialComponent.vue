<template>
    <section id="testimonials" class="testimonials section-bg mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Testimonials</h2>
                <p>
                    Beberapa Orang Yang Telah Kami Jadikan Sebagai Testimonial Setelah Menggunakan Jasa Kami
                </p>
            </div>
            <swiper :modules="modules" :pagination="{ clickable: true }">
                <swiper-slide v-for="(testimonial, index) in dataTestimonial" :key="index">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img :src="testimonial.testimonial_foto" class="testimonial-img" alt=""/>
                            <h3>{{ testimonial.testimonial_nama }}</h3>
                            <h4>{{ testimonial.testimonial_jobtitle }}</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                {{ testimonial.testimonial_review }}
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
    </section>
</template>

<script>
import SwiperClass, { Pagination } from 'Swiper'
import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
import 'swiper/css'
import 'swiper/css/pagination'
export default {
    name : "Testimonial",
    components: {
        Swiper,
        SwiperSlide
    },
    setup() {
        return {
            modules: [Pagination]
        }
    },
    data() {
        return {
            dataTestimonial: []
        }
    },
    created() {
        this.getTestimonial();
    },
    methods: {
        async getTestimonial() {
            try {
                const response = await axios.get("testimonial");
                this.dataTestimonial = response.data;
            } catch (error) {
                console.log("Oopss.. Error");
            }
        }
    }
}
</script>
