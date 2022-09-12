<template>
    <app-header/>

    <app-hero/>

    <main id="main">

        <app-about/>

        <app-services/>

        <app-pure-counter/>

        <app-portfolio/>

        <app-testimonial/>

        <app-team/>

        <app-contact/>
    </main>

    <app-footer/>
</template>

<style>
    .navbar-mobile {
        position: fixed !important;
    }
</style>

<script>
    import HeaderComponent from './components/Header.vue'
    import HeroComponent from './components/Hero.vue'
    import AboutUsComponent from './components/AboutUs.vue'
    import ServiceComponent from './components/Services.vue'
    import PureCounterComponent from './components/PureCounter.vue'
    import PortfolioComponent from './components/Portfolio.vue'
    import TeamComponent from './components/Team.vue'
    import TestimonialComponent from './components/Testimonial.vue'
    import KnowledgeComponent from './components/Knowledge.vue'
    import FooterComponent from './components/Footer.vue'
    import ContactComponent from './components/Contact.vue'

    export default {
        components: {
            'app-header' : HeaderComponent,
            'app-hero' : HeroComponent,
            'app-about' : AboutUsComponent,
            'app-services' : ServiceComponent,
            'app-pure-counter' : PureCounterComponent,
            'app-portfolio' : PortfolioComponent,
            'app-team' : TeamComponent,
            'app-testimonial' : TestimonialComponent,
            'app-knowledge' : KnowledgeComponent,
            'app-footer' : FooterComponent,
            'app-contact' : ContactComponent
        }
    }
</script>
