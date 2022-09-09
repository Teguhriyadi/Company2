@extends('pages.layouts.main')

@section('title', 'Jasa')

@section('title_breadcrumb', 'Jasa')

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
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-plus"></i> Tambah Data
                    </h6>
                </div>
                <form action="{{ url('/admin/master/services') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="services_icon"> Icon </label>
                            <input type="text" class="form-control" name="services_icon" id="services_icon"
                                placeholder="Masukkan Icon">
                        </div>
                        <div class="form-group">
                            <label for="services_title"> Judul </label>
                            <input type="text" class="form-control" name="services_title" id="services_title"
                                placeholder="Masukkan Judul">
                        </div>
                        <div class="form-group">
                            <label for="services_deskripsi"> Deskripsi </label>
                            <input type="text" class="form-control" name="services_deskripsi" id="services_deskripsi"
                                placeholder="Masukkan Deskripsi">
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
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-envelope"></i> Data Pesan
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Icon</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data_services as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td>{{ $data->services_icon }}</td>
                                        <td>{{ $data->services_title }}</td>
                                        <td>{{ $data->services_deskripsi }}</td>
                                        <td class="text-center">
                                            <button onclick="editServices({{ $data->id }})" type="button"
                                                class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#exampleModal">
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
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa fa-edit"></i> Edit Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/admin/master/services/simpan') }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script type="text/javascript">
        function editServices(id) {
            $.ajax({
                url: "{{ url('/admin/master/services/edit') }}",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#modal-content-edit").html(data);
                    return true;
                }
            })
        }
    </script>

@endsection
