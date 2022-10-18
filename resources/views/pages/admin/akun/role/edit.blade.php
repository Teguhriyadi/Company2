<input type="hidden" name="id" value="{{ encrypt($edit->id) }}">
<div class="form-group">
    <label for="role_nama"> Role </label>
    <input type="text" class="form-control" name="role_nama" id="role_nama" placeholder="Masukkan Nama Role"
        value="{{ $edit->role_nama }}">
</div>
