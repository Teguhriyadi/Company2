<template>
	
	<main-navbar/>

	<main-hero/>	

	<main-tentang-kami/>	

	<main-jasa/>

	<main-paket/>

	<main-portfolio/>

	<main-testimonial/>	

	<main-team/>	

	<main-hubungi-kami/>

	<main-footer/>

</template>

<script>
	import PartialsNavbar from "@/partials/Navbar.vue"
	import PartialsHero from "@/partials/Hero.vue"
	import PartialsTentangKami from "@/partials/TentangKami.vue"
	import PartialsJasa from "@/partials/Jasa.vue"
	import PartialsPaket from "@/partials/Paket.vue"
	import PartialsPortfolio from "@/partials/Portfolio.vue"
	import PartialsTestimonial from "@/partials/Testimonial.vue"
	import PartialsTeam from "@/partials/Team.vue"
	import PartialsHubungiKami from "@/partials/HubungiKami.vue"
	import PartialsFooter from "@/partials/Footer.vue"
	export default {
		name: "MainDevelop",
		components: {
			"main-navbar" : PartialsNavbar,
			"main-hero" : PartialsHero,
			"main-tentang-kami" : PartialsTentangKami,
			"main-jasa" : PartialsJasa,
			"main-paket" : PartialsPaket,
			"main-portfolio" : PartialsPortfolio,
			"main-testimonial" : PartialsTestimonial,
			"main-team" : PartialsTeam,
			"main-hubungi-kami" : PartialsHubungiKami,
			"main-footer" : PartialsFooter
		}
	}
</script>