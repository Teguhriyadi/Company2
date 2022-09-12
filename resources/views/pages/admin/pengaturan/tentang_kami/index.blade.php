@extends('pages.layouts.main')

@section('title', 'Tentang Kami')

@section('title_breadcrumb', 'Tentang Kami')

@section('content')

@if (empty($data_tentang_kami->id))
<form action="{{ url('/admin/pengaturan/tentang_kami') }}" method="POST" enctype="multipart/form-data">
    @else
    <form action="{{ url('/admin/pengaturan/tentang_kami/'.$data_tentang_kami->id) }}" method="POST" enctype="multipart/form-data">
        @method("PUT")
        @php
            $str = $data_tentang_kami->foto;
            $hasil = trim($str, url('/'));

            $print = substr($hasil, 8);
        @endphp
        <input type="hidden" name="gambarLama" value="{{ $print }}">
        @endif
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fa fa-upload"></i> Upload Gambar
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="gambar"> Gambar </label>
                            @if (empty($data_tentang_kami->foto))
                            <img src="{{ url('/gambar/upload-gambar.jpg') }}" class="img-fluid mb-3 gambar-preview" id="tampilGambar">
                            @else
                            <img src="{{ $data_tentang_kami->foto }}" class="img-fluid mb-3 gambar-preview" id="tampilGambar">
                            @endif
                            <input type="file" class="form-control" name="foto" id="foto" onchange="previewImage()">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            @if (empty($data_tentang_kami->id))
                            <i class="fa fa-plus"></i> Tambah Data
                            @else
                            <i class="fa fa-edit"></i> Edit Data
                            @endif
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="judul"> Judul </label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" value="{{ empty($data_tentang_kami->judul) ? '' : $data_tentang_kami->judul }}">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi"> Deskripsi </label>
                            <textarea name="deskripsi" id="deskripsi">{{ empty($data_tentang_kami->deskripsi) ? '' : $data_tentang_kami->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        @if (empty($data_tentang_kami))
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                        @else
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>

    @endsection

    @section('js')

    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>

    <script type="text/javascript">
        function previewImage() {
            const image = document.querySelector("#foto");
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

    @endsection
