<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="services_icon"> Icon </label>
    <input type="text" class="form-control" name="services_icon" id="services_icon" placeholder="Masukkan Icon"
        value="{{ $edit->services_icon }}">
</div>
<div class="form-group">
    <label for="services_title"> Judul </label>
    <input type="text" class="form-control" name="services_title" id="services_title" placeholder="Masukkan Judul"
        value="{{ $edit->services_title }}">
</div>
<div class="form-group">
    <label for="services_deskripsi"> Deskripsi </label>
    <input type="text" class="form-control" name="services_deskripsi" id="services_deskripsi"
        placeholder="Masukkan Deskripsi" value="{{ $edit->services_deskripsi }}">
</div>
