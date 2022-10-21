@extends('pages.layouts.main')

@section('title', 'Profil Perusahaan')

@section('title_breadcrumb', 'Profil Perusahaan')

@section('breadcrumb')

    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
            <a href="">
                Dashboard
            </a>
        </div>
        <div class="breadcrumb-item">
            @yield('title')
        </div>
    </div>

@endsection

@section('content')

    @if (empty($data))
        <form action="{{ url('/admin/pengaturan/profil_perusahaan') }}" method="POST" enctype="multipart/form-data">
        @else
            <form action="{{ url('/admin/pengaturan/profil_perusahaan/' . $data->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @php
                    $str = $data->profil_foto;
                    $hasil = trim($str, url('/'));

                    $print = substr($hasil, 8);
                @endphp
                <input type="hidden" name="gambarLama" value="{{ $print }}">
    @endif
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-upload"></i> Upload Gambar
                    </h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="profil_foto"> Foto </label>
                        @if (empty($data))
                            <img src="{{ url('/gambar/upload-gambar.jpg') }}" class="img-fluid mb-3 gambar-preview"
                                id="tampilGambar">
                        @else
                            <img src="{{ $data->profil_foto }}" class="img-fluid mb-3 gambar-preview" id="tampilGambar">
                        @endif
                        <input type="file" class="form-control" name="profil_foto" id="profil_foto"
                            onchange="previewImage()">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 ">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        @if (empty($data))
                            <i class="fa fa-plus"></i> Tambah Data
                        @else
                            <i class="fa fa-edit"></i> Edit Data
                        @endif
                    </h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="profil_nama"> Nama Profil Perusahaan </label>
                        <input type="text" class="form-control" name="profil_nama" id="profil_nama"
                            placeholder="Masukkan Profil Nama Perusahaan"
                            value="{{ empty($data->profil_nama) ? '' : $data->profil_nama }}">
                    </div>
                    <div class="form-group">
                        <label for="profil_singkat"> Deskripsi Singkat </label>
                        <input type="text" class="form-control" name="profil_singkat" id="profil_singkat" value="{{ empty($data->profil_singkat) ? '' : $data->profil_singkat }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profil_email"> Email Perusahaan </label>
                                <input type="email" class="form-control" name="profil_email" id="profil_email"
                                    placeholder="Masukkan Email Perusahaan"
                                    value="{{ empty($data->profil_email) ? '' : $data->profil_email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profil_no_hp"> No. HP Perusahaan </label>
                                <input type="number" class="form-control" name="profil_no_hp" id="profil_no_hp"
                                    placeholder="0" value="{{ empty($data->profil_no_hp) ? '' : $data->profil_no_hp }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profil_alamat"> Alamat </label>
                        <input type="text" class="form-control" name="profil_alamat" id="profil_alamat"
                            placeholder="Masukkan Alamat"
                            value="{{ empty($data->profil_alamat) ? '' : $data->profil_alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="profil_deskripsi"> Deskripsi </label>
                        <textarea name="profil_deskripsi" class="form-control" id="profil_deskripsi" rows="5"
                            placeholder="Masukkan Deskripsi">{{ empty($data->profil_deskripsi) ? '' : $data->profil_deskripsi }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn {{ empty($data) ? 'btn-primary' : 'btn-success' }} btn-sm">
                        <i class="{{ empty($data) ? 'fa fa-plus' : 'fa fa-save' }}"></i>
                        {{ empty($data) ? 'Tambah' : 'Simpan' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>

@endsection

@section('js')

    <script type="text/javascript">
        function previewImage() {
            const image = document.querySelector("#profil_foto");
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
