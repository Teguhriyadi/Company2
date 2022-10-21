<template>

    <app-header/>

    <app-hero/>

    <main id="main">

        <app-about/>

        <app-services/>

        <app-choose-us/>

        <app-question/>

        <app-testi/>

        <app-blog/>

        <app-contact/>

        <app-footer/>

    </main>

</template>

<script>
    import Header from "@/views/components/HeaderComponent.vue"
    import About from "@/views/components/AboutComponent.vue"
    import Services from "@/views/components/ServicesComponent.vue"
    import ChooseUs from "@/views/components/ChooseUsComponent.vue"
    import Questions from "@/views/components/QuestionComponent.vue"
    import Hero from "@/views/components/HeroComponent.vue"
    import Testimonial from "@/views/components/TestimonialComponent.vue"
    import Blog from "@/views/components/BlogComponent.vue"
    import Contact from "@/views/components/ContactComponent.vue"
    import Footer from "@/views/components/FooterComponent.vue"

    export default {
        name: "Home",
        components: {
            "app-header": Header,
            "app-about" : About,
            "app-services" : Services,
            "app-choose-us" : ChooseUs,
            "app-question" : Questions,
            "app-hero" : Hero,
            "app-testi" : Testimonial,
            "app-blog" : Blog,
            "app-contact" : Contact,
            "app-footer" : Footer
        }
    }
</script>
