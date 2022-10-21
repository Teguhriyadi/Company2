<input type="hidden" name="id" value="{{ $edit->id }}">
@php
$str = $edit->portfolio_foto;
$hasil = trim($str, url('/'));

$print = substr($hasil, 8);
@endphp
<input type="hidden" name="gambarLama" value="{{ $print }}">
<div class="form-group">
    <label for="portfolio_nama"> Nama </label>
    <input type="text" class="form-control" name="portfolio_nama" id="portfolio_nama" placeholder="Masukkan Nama" value="{{ $edit->portfolio_nama }}">
</div>
<div class="form-group">
    <label for="portfolio_deskripsi"> Deskripsi </label>
    <input type="text" class="form-control" name="portfolio_deskripsi" id="portfolio_deskripsi" placeholder="Masukkan Deskripsi" value="{{ $edit->portfolio_deskripsi }}">
</div>
<div class="form-group">
    <label for="portfolio_foto"> Foto </label>
    <input type="file" class="form-control" name="portfolio_foto" id="portfolio_foto">
</div>
