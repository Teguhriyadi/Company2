@extends('pages.layouts.main')

@section('title', 'Footer')

@section('title_breadcrumb', 'Footer')

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
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Icon</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($footer as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td class="text-center">{{ $data->deskripsi_footer }}</td>
                                        <td class="text-center">
                                            <img src="{{ url($data->icon) }}" width="70" height="80" >
                                        </td>
                                        <td class="text-center">
                                            <button onclick="editFooter({{ $data->device}})" type="button"
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
