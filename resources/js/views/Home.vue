<template>

    <app-hero/>

    <main id="main">

        <app-about/>

        <app-services/>

        <app-why-us/>

        <app-question/>

        <app-testi/>

        <app-blog/>

    </main>

</template>

<script>
    import About from "@/views/components/home/About.vue"
    import Jasa from "@/views/components/jasa/Jasa.vue"
    import WhyUs from "@/views/components/home/WhyUs.vue"
    import Questions from "@/views/components/home/Question.vue"
    import Hero from "@/views/components/home/Hero.vue"
    import Testimonial from "@/views/components/home/Testimonial.vue"
    import Blog from "@/views/components/home/Blog.vue"

    export default {
        name: "Home",
        components: {
            "app-about" : About,
            "app-services" : Jasa,
            "app-why-us" : WhyUs,
            "app-question" : Questions,
            "app-hero" : Hero,
            "app-testi" : Testimonial,
            "app-blog" : Blog
        }
    }
</script>
