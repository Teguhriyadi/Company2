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

    <form action="{{ url('/admin/pengaturan/testimonial') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="testimonial_foto"> Foto </label>
                            <img src="{{ url('/gambar/gambar_user.png') }}" class="img-fluid gambar-preview mb-3"
                                style="width: 100%" id="tampilGambar">
                            <input type="file" class="form-control" name="testimonial_foto" id="testimonial_foto"
                                onchange="previewImage()">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fa fa-plus"></i> Tambah Data
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="testimonial_nama"> Nama </label>
                                    <input type="text" class="form-control" name="testimonial_nama" id="testimonial_nama"
                                        placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="testimonial_jobtitle"> Job </label>
                                    <input type="text" class="form-control" name="testimonial_jobtitle"
                                        id="testimonial_jobtitle" placeholder="Masukkan Job">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="testimonial_review"> Review </label>
                            <textarea name="testimonial_review" id="testimonial_review" class="form-control" rows="5"
                                placeholder="Masukkan Review"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah
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
            const image = document.querySelector("#testimonial_foto");
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
