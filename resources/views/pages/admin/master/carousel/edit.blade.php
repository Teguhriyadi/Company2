<input type="hidden" name="id" value="{{ $edit->id }}">
@php
$str = $edit->carousel_gambar;
$hasil = trim($str, url('/'));

$print = substr($hasil, 8);
@endphp
<input type="hidden" name="oldGambar" value="{{ $print }}">
<div class="form-group">
    <label for="carousel_judul"> Judul </label>
    <input type="text" class="form-control" name="carousel_judul" id="carousel_judul"
    placeholder="Masukkan Judul" value="{{ $edit->carousel_judul }}">
</div>
<div class="form-group">
    <label for="carousel_deskripsi"> Deskripsi </label>
    <input type="text" class="form-control" name="carousel_deskripsi" id="carousel_deskripsi"
    placeholder="Masukkan Deskripsi" value="{{ $edit->carousel_deskripsi }}">
</div>
<div class="form-group">
    <label for="carousel_gambar"> Gambar </label>
    <input type="file" class="form-control" name="carousel_gambar" id="carousel_gambar">
</div>
