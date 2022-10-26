<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="team_nama"> Nama </label>
    <input type="text" class="form-control" name="team_nama" id="team_nama" placeholder="Masukkan Nama"
        value="{{ $edit->team_nama }}">
</div>
<div class="form-group">
    <label for="team_jabatan"> Jabatan </label>
    <input type="text" class="form-control" name="team_jabatan" id="team_jabatan" placeholder="Masukkan Jabatan"
        value="{{ $edit->team_jabatan }}">
</div>
<div class="form-group">
    <label for="team_foto_new"> Foto </label>
    <br>
    <center>
        @if (empty($edit->team_foto))
            <img src="{{ url('/gambar/gambar_user.png') }}" style="width: 50%" class="gambar-preview mb-3"
                id="tampilGambar">
        @else
            <img src="{{ $edit->team_foto }}" style="width: 50%" class="gambar-preview mb-3" id="tampilGambar">
        @endif
    </center>
    <input type="file" class="form-control" name="team_foto_new" id="team_foto_new" onchange="previewImage()">
</div>

<script>
    function previewImage() {
        const image = document.querySelector("#team_foto_new");
        const imgPreview = document.querySelector(".gambar-preview");
        imgPreview.style.display = "block";
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
            $("#tampilGambar").addClass('mb-3');
            $("#tampilGambar").width("100%");
            $("#tampilGambar").height("300");
        }
    }
</script>
