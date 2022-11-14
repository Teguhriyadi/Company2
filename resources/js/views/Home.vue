<template>

    <app-hero/>

    <main id="main">

        <app-about/>

        <app-services/>

        <app-choose-us/>

        <app-question/>

        <app-testi/>

        <app-blog/>

    </main>

</template>

<script>
    import About from "@/views/components/AboutComponent.vue"
    import Jasa from "@/views/components/jasa/Jasa.vue"
    import ChooseUs from "@/views/components/ChooseUsComponent.vue"
    import Questions from "@/views/components/QuestionComponent.vue"
    import Hero from "@/views/components/HeroComponent.vue"
    import Testimonial from "@/views/components/TestimonialComponent.vue"
    import Blog from "@/views/components/BlogComponent.vue"

    export default {
        name: "Home",
        components: {
            "app-about" : About,
            "app-services" : Jasa,
            "app-choose-us" : ChooseUs,
            "app-question" : Questions,
            "app-hero" : Hero,
            "app-testi" : Testimonial,
            "app-blog" : Blog
        }
    }
</script>
