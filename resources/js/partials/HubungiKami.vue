<template>
	<div class="hubungi_kami pb-5" id="kontak">
		<div class="container" style="padding-top: 100px;">
			<h3 class="text-center pb-4">
				Hubungi Kami
			</h3>
			<div class="row">
				<div class="col-md-6 pb-3">
					<p class="teks-pesan">
						Apabila anda mempunyai pesan terkait jasa penawaran kami. Silahkan isikan form dibawah ini.
					</p>
					<form>
						<div class="form-group pb-3">
							<label for="nama"> Nama </label>
							<input type="" class="form-control" name="nama">
						</div>
						<div class="form-group pb-3">
							<label for="email"> Email </label>
							<input type="email" class="form-control" name="">
						</div>
						<div class="form-group pb-3">
							<label for="subjek"> Subjek </label>
							<input type="text" class="form-control" name="">
						</div>
						<div class="form-group pb-3">
							<label for="alamat"> Alamat </label>
							<textarea name="alamat" id="alamat" rows="5" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<button class="button-kirim">
								Kirim
							</button>
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7814271551792!2d106.82998651430964!3d-6.160021262088197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5c3712ffacb%3A0xb0bbab9930144b5f!2sJl.%20Krekot%20Bunder%20Raya%20No.26%2C%20RT.2%2FRW.6%2C%20Ps.%20Baru%2C%20Kecamatan%20Sawah%20Besar%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2010710!5e0!3m2!1sid!2sid!4v1657871297794!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					<p>
						<strong>PT. Curva Indonesia</strong>
						<br>
						<strong>Villa Intan 2 Blok i4 No.1 , Cirebon</strong>
						<br>
						<strong>admin@gmail.com</strong>
					</p>
					<div class="row">
						<div class="col-md-2">
							<img src="img/logo_fb.png" class="img-fluid icon">
						</div>
						<div class="col-md-2">
							<img src="img/logo_fb.png" class="img-fluid icon">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: "PartialsHubungiKami"
	}
</script>