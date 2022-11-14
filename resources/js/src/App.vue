<template>
    <!-- HEADER-->
    <app-header/>
    <!-- END -->

    <!-- CONTENT -->
    <router-view/>
    <!-- END -->

    <!-- CONTACT -->
    <app-contact/>
    <!-- END-->

    <!-- FOOTER -->
    <app-footer/>
    <!-- END -->
</template>

<script>
    import Header from "@/views/partials/Header.vue"
    import Contact from "@/views/partials/Contact.vue"
    import Footer from "@/views/partials/Footer.vue"

    export default {
        name: "Application",
        components: {
            "app-header" : Header,
            "app-contact" : Contact,
            "app-footer" : Footer
        }
    }
</script>
