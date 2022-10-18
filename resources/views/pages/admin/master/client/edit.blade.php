<input type="hidden" name="id" value="{{ $edit->id }}">
@php
$str = $edit->client_logo;
$hasil = trim($str, url('/'));

$print = substr($hasil, 8);
@endphp
<input type="hidden" name="gambarLama" value="{{ $print }}">
<div class="form-group">
    <label for="client_nama"> Nama Client </label>
    <input type="text" class="form-control" name="client_nama" id="client_nama" placeholder="Masukkan Nama Client"
        value="{{ $edit->client_nama }}">
</div>
<div class="form-group">
    <label for="client_logo_new"> Logo </label>
    <br>
    <center>
        @if (empty($edit->client_logo))
            <img src="{{ url('/gambar/gambar_user.png') }}" style="width: 100%" class="gambar-preview mb-3"
                id="tampilGambar">
        @else
            <img src="{{ $edit->client_logo }}" style="width: 100%" class="gambar-preview mb-3" id="tampilGambar">
        @endif
    </center>
    <input type="file" class="form-control" name="client_logo_new" id="client_logo_new" onchange="previewImage()">
</div>

<script type="text/javascript">
    function previewImage() {
        const image = document.querySelector("#client_logo_new");
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
