@extends('pages.layouts.main')

@section('title', 'Users')

@section('title_breadcrumb', 'Users')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <i class="fa fa-user"></i> Data @yield('title')
                    <a href="{{ url('/admin/akun/users/create') }}" class="btn btn-primary btn-sm float-right">
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
                                    <th>Email</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data_user as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td class="text-center">
                                            @if ($data->status == 1)
                                                <form action="{{ url('/admin/akun/users/non_aktifkan/' . $data->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-times"></i> Non - Aktifkan
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ url('/admin/akun/users/aktifkan/' . $data->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fa fa-check"></i> Aktifkan
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/akun/users/'.$data->id.'/edit') }}" class="btn btn-warning btn-sm">
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

    <div class="modal fade" id="exampleModalDefault" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/admin/akun/role/simpan') }}" method="POST">
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
        function editRole(id) {
            $.ajax({
                url: "{{ url('/admin/akun/role/edit') }}",
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
