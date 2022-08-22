@extends('pages.layouts.main')

@section('title', 'Role')

@section('title_breadcrumb', 'Role')

@section('breadcrumb')

    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
            <a href="{{ url('/admin/dashboard') }}">
                Dashboard
            </a>
        </div>
        <div class="breadcrumb-item">
            @yield('title')
        </div>
    </div>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-plus"></i> Tambah Data
                    </h4>
                </div>
                <form action="{{ url('/admin/akun/role') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="role_nama"> Role </label>
                            <input type="text" class="form-control" name="role_nama" id="role_nama"
                                placeholder="Masukkan Nama Role">
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
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-bars"></i> Data @yield('title')
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Role</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
