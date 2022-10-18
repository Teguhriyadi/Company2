<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="syarat_ketentuan_judul"> Judul </label>
    <input type="text" class="form-control" name="syarat_ketentuan_judul" id="syarat_ketentuan_judul"
        placeholder="Masukkan Judul" value="{{ $edit->syarat_ketentuan_judul }}">
</div>
<div class="form-group">
    <label for="syarat_ketentuan_deskripsi"> Deskripsi </label>
    <input type="text" class="form-control" name="syarat_ketentuan_deskripsi" id="syarat_ketentuan_deskripsi"
        placeholder="Masukkan Deskripsi" value="{{ $edit->syarat_ketentuan_deskripsi }}">
</div>
