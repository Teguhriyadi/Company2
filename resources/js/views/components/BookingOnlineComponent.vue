<template>
    <main id="main">
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('theme/img/about.jpg')">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Booking</h2>
                <ol>
                    <li>
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                    <li>
                        Booking Online
                    </li>
                </ol>
            </div>
        </div>

        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Tata Cara Booking Online</h2>
                    <p>
                        Apabila Anda Terkendala Untuk Datang Ke Tempat. Kami Menyediakan Jasa Layanan Booking Secara Online.
                    </p>
                </div>
                <div class="main-timeline">
                    <div v-for="(booking, index) in dataCaraBooking" :key="index" :class="index % 2 === 0 ? 'timeline left' : 'timeline right'">
                        <div class="card">
                            <div class="card-body p-4">
                                <h3>
                                    <i :class="booking.booking_icon"></i> {{ booking.booking_judul }}
                                </h3>
                                <p class="mb-0">
                                    {{ booking.booking_deskripsi }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
    import axios from "axios"

    export default {
        name: "BookingOnline",
        data() {
            return {
                dataCaraBooking: []
            }
        },
        created() {
            this.getCaraBooking();
        },
        methods: {
            async getCaraBooking() {
                try {
                    const response = await axios.get("booking_online");
                    this.dataCaraBooking = response.data;
                } catch (error) {
                    console.log("Oopss.. Error");
                }
            }
        }
    }
</script>
