@extends('pages.layouts.main')

@section('title', 'Proyek')

@section('title_breadcrumb', 'Proyek Kami')

@section('content')

    {{-- <div class="row"> --}}
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-user"></i> Data @yield('title')
                        <a href="{{ url('/admin/') }}" class="btn btn-primary btn-sm float-right">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Produk</th>
                                    <th class="text-center">device</th>
                                    <th class="text-center">Foto Produk</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data_produk as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td class="text-center">{{ $data->nm_proyek }}</td>
                                        <td class="text-center">{{ $data->device }}</td>
                                        <td class="text-center">
                                            <img src="{{ url($data->foto_prdk) }}" width="150" height="135" >
                                        </td>
                                        <td class="text-center">
                                            <button onclick="editProduk({{ $data->device}})" type="button"
                                                class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#exampleModalDefault">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}


@endsection
