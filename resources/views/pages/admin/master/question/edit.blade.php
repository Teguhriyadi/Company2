<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="question_pesan_judul"> Judul </label>
    <input type="text" class="form-control" name="question_pesan_judul" id="question_pesan_judul"
        placeholder="Masukkan Judul" value="{{ $edit->question_pesan_judul }}">
</div>
<div class="form-group">
    <label for="question_pesan_deskripsi"> Deskripsi </label>
    <input type="text" class="form-control" name="question_pesan_deskripsi" id="question_pesan_deskripsi"
        placeholder="Masukkan Deskripsi" value="{{ $edit->question_pesan_deskripsi }}">
</div>
