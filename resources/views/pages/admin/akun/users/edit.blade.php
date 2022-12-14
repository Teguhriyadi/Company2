@extends('pages.layouts.main')

@section('title', 'Users')

@section('title_breadcrumb', 'Edit Users')

@section('content')

    <form action="{{ url('/admin/akun/users/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
        @method("PUT")
        {{ csrf_field() }}
        @php
            $str = $edit->foto;
            $hasil = trim($str, url('/'));

            $print = substr($hasil, 8);
        @endphp
        <input type="hidden" name="gambarLama" value="{{ $print }}">
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
                            <label for="foto"> Foto </label>
                            <center>
                                @if (empty($edit->foto))

                                @else
                                <img src="{{ $edit->foto }}" class="img-fluid gambar-preview mb-3" id="tampilGambar">
                                @endif
                            </center>
                            <input type="file" class="form-control" name="foto" id="foto"
                                onchange="previewImage()">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fa fa-edit"></i> Edit Data
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label for="nama" class="form-label col-sm-3 text-right"> Nama : </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ $edit->nama }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label for="email" class="form-label col-sm-3 text-right"> Email : </label>
                                <div class="col-md-7">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{ $edit->email }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> Simpan
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
