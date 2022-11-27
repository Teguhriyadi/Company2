@extends('pages.layouts.main')

@section('title', 'Users')

@section('title_breadcrumb', 'Tambah Users')

@section('content')

    <form action="{{ url('/admin/akun/users') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="foto"> Foto </label>
                            <input type="file" class="form-control" name="foto" id="foto">
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
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label for="nama" class="form-label col-sm-3 text-right"> Nama : </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label for="email" class="form-label col-sm-3 text-right"> Email : </label>
                                <div class="col-md-7">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                                </div>
                            </div>
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
