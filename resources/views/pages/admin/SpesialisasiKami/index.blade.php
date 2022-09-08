@extends('pages.layouts.main')

@section('title', 'Role')

@section('title_breadcrumb', 'Spesialisasi Kami')

@section('content')

    {{-- <div class="row"> --}}
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-user"></i> Data @yield('title')
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data_spesialisasi_kami as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td class="text-center">{{ $data->judul }}</td>
                                        <td class="text-justify">{{ $data->deskripsi }}</td>
                                        <td class="text-center">
                                            <img src="{{ url($data->foto) }}" width="150" height="135" >
                                        </td>
                                        <td class="text-center">
                                            <button onclick="editRole({{ $data->device}})" type="button"
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
