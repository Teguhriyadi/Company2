<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="choose_us_judul"> Judul </label>
    <input type="text" class="form-control" name="choose_us_judul" id="choose_us_judul"
        placeholder="Masukkan Judul" value="{{ $edit->choose_us_judul }}">
</div>
<div class="form-group">
    <label for="choose_us_deskripsi"> Deskripsi </label>
    <input type="text" class="form-control" name="choose_us_deskripsi" id="choose_us_deskripsi"
        placeholder="Masukkan Deskripsi" value="{{ $edit->choose_us_deskripsi }}">
</div>
