@extends('pages.layouts.main')

@section('title', 'Pesan')

@section('title_breadcrumb', 'Pesan')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-envelope"></i> Data @yield('title')
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th class="text-center">No. HP</th>
                                    <th>Company</th>
                                    <th>Subjek</th>
                                    <th>Teks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data_pesan as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td>{{ $data->pesan_nama }}</td>
                                        <td>{{ $data->pesan_email }}</td>
                                        <td class="text-center">{{ $data->pesan_no_hp }}</td>
                                        <td>{{ $data->pesan_nama_perusahaan }}</td>
                                        <td>{{ $data->pesan_subjek }}</td>
                                        <td>{{ $data->pesan_teks }}</td>
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
