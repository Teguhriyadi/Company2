<template>
	<div class="testimoni pb-5">
		<div class="container pt-5">
			<span class="judul-title text-white" style="font-weight: 700">
				<center>
					Testimonial
				</center>
				<p class="deskripsi-title text-center">
					Testimonial yang sudah kami lakukan
				</p>
			</span>
			<div id="carouselExampleIndicators" class="carousel slide text-center" data-bs-ride="true">

				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="rounded-circle shadow-1-strong mb-4"
						src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
						style="width: 150px;" />
						<div class="row d-flex justify-content-center">
							<div class="col-lg-8">
								<h5 class="mb-3">Maria Kate</h5>
								<p>Photographer</p>
								<p class="text-muted">
									<i class="fas fa-quote-left pe-2"></i>
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
									nesciunt sint eligendi reprehenderit reiciendis, quibusdam illo, beatae quia
									fugit consequatur laudantium velit magnam error. Consectetur distinctio fugit
									doloremque.
								</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<img class="rounded-circle shadow-1-strong mb-4"
						src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
						style="width: 150px;" />
						<div class="row d-flex justify-content-center">
							<div class="col-lg-8">
								<h5 class="mb-3">Maria Kate</h5>
								<p>Photographer</p>
								<p class="text-muted">
									<i class="fas fa-quote-left pe-2"></i>
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
									nesciunt sint eligendi reprehenderit reiciendis, quibusdam illo, beatae quia
									fugit consequatur laudantium velit magnam error. Consectetur distinctio fugit
									doloremque.
								</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<img class="rounded-circle shadow-1-strong mb-4"
						src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
						style="width: 150px;" />
						<div class="row d-flex justify-content-center">
							<div class="col-lg-8">
								<h5 class="mb-3">Maria Kate</h5>
								<p>Photographer</p>
								<p class="text-muted">
									<i class="fas fa-quote-left pe-2"></i>
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
									nesciunt sint eligendi reprehenderit reiciendis, quibusdam illo, beatae quia
									fugit consequatur laudantium velit magnam error. Consectetur distinctio fugit
									doloremque.
								</p>
							</div>
						</div>
					</div>
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
			<div class="indikator text-center">
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="border-radius: 10px; padding: 10px; border-radius: 50%; border: none;"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" style="border-radius: 10px; padding: 10px; border-radius: 50%; border: none;"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3" style="border-radius: 10px; padding: 10px; border-radius: 50%; border: none;"></button>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: "PartialsTentangKami"
	}
</script>