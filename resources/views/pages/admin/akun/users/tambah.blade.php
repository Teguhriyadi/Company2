@extends('pages.layouts.main')

@section('title', 'Role')

@section('title_breadcrumb', 'Tambah Users')

@section('content')

    <form action="{{ url('/admin/akun/users') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <i class="fa fa-upload"></i> Upload Gambar
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="foto"> Foto </label>
                            <center>
                                <img src="{{ url('/gambar/upload-gambar.jpg') }}" class="img-fluid gambar-preview mb-3"
                                    id="tampilGambar">
                            </center>
                            <input type="file" class="form-control" name="foto" id="foto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <i class="fa fa-plus"></i> Tambah Data
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama"> Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan Nama">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"> Email </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Masukkan Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_role"> Role </label>
                                    <select name="id_role" class="form-control" id="id_role">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_role as $data)
                                            <option value="{{ $data->id }}">
                                                {{ $data->role_nama }}
                                            </option>
                                        @endforeach
                                    </select>
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
