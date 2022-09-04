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

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <i class="fa fa-user"></i> Data Pesan
                    <a href="{{ url('/admin/pengaturan/testimonial/create') }}" class="btn btn-primary btn-sm float-right">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th class="text-center">Foto</th>
                                    <th>Review</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data_testimonial as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td>{{ $data->testimonial_nama }}</td>
                                        <td class="text-center">
                                            <img src="{{ $data->testimonial_foto }}" width="50px" class="img-fluid">
                                        </td>
                                        <td>{{ $data->testimonial_review }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/pengaturan/testimonial/' . $data->id . '/edit') }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
