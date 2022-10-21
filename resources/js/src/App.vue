<template>
    <!-- HEADER-->
    <app-header/>
    <!-- END -->

    <!-- CONTENT -->
    <router-view/>
    <!-- END -->

    <!-- FOOTER -->
    <app-footer/>
    <!-- END -->
</template>

<script>
    import Header from "@/views/partials/Header.vue"
    import Footer from "@/views/partials/Footer.vue"
    export default {
        name: "Application",
        components: {
            "app-header" : Header,
            "app-footer" : Footer
        }
    }
</script>
