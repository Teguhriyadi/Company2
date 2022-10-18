<input type="hidden" name="id" value="{{ $edit->id }}">
@php
$str = $edit->foto;
$hasil = trim($str, url('/'));

$print = substr($hasil, 8);
@endphp
<input type="hidden" name="oldGambar" value="{{ $print }}">
<div class="form-group">
    <label for="judul"> Judul </label>
    <input type="text" class="form-control" name="judul" id="judul"
        placeholder="Masukkan Judul" value="{{ $edit->judul }}">
</div>
<div class="form-group">
    <label for="kategori_id"> Kategori </label>
    <select name="kategori_id" class="form-control" id="kategori_id">
        <option value="">- Pilih -</option>
        @foreach ($kategori as $item)
            <option value="{{ $item->id }}" {{ $edit->kategori_id == $item->id ? 'selected' : '' }}>
                {{ $item->kategori_nama }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="deskripsi"> Deskripsi </label>
    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" placeholder="Masukkan Deskripsi">{{ $edit->deskripsi }}</textarea>
</div>
<div class="form-group">
    <label for="foto"> Foto </label>
    <input type="file" class="form-control" name="foto" id="foto">
</div>
