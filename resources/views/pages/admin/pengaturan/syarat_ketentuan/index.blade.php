@extends('pages.layouts.main')

@section('title', 'Syarat Ketentuan')

@section('title_breadcrumb', 'Syarat Ketentuan')

@section("breadcrumb")

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="pt-2">
    <ol class="breadcrumb" style="background-color: transparent; padding:0px;">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">@yield("title")</li>
    </ol>
</nav>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <i class="fa fa-bars"></i> Data @yield("title")
                    <a type="button" class="btn btn-primary btn-sm float-right mr-2" data-toggle="modal" data-target="#exampleModalTambah">
                        <i class="fa fa-plus"></i>
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($syarat_ketentuan as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td>{{ $data->syarat_ketentuan_judul }}</td>
                                        <td>{{ $data->syarat_ketentuan_deskripsi }}</td>
                                        <td class="text-center">
                                            <button onclick="editSyaratKetentuan({{ $data->id }})" type="button"
                                                class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#exampleModal">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </button>
                                            <button id="deleteSyaratKetentuan" data-id="{{ $data->id }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Hapus
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

    <!-- Tambah Data -->
    <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa fa-plus"></i> Tambah Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/admin/pengaturan/syarat_ketentuan/') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="syarat_ketentuan_judul"> Judul </label>
                            <input type="text" class="form-control" name="syarat_ketentuan_judul" id="syarat_ketentuan_judul"
                                placeholder="Masukkan Judul">
                        </div>
                        <div class="form-group">
                            <label for="syarat_ketentuan_deskripsi"> Deskripsi </label>
                            <input type="text" class="form-control" name="syarat_ketentuan_deskripsi" id="syarat_ketentuan_deskripsi"
                                placeholder="Masukkan Deskripsi">
                        </div>
                    </div>
                    <div class="modal-footer">
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
    </div>
    <!-- END -->

    <!-- Edit Data -->
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
                <form action="{{ url('/admin/pengaturan/syarat_ketentuan/simpan') }}" method="POST">
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
    <!-- END -->

@endsection

@section('js')

    <script type="text/javascript">
        function editSyaratKetentuan(id) {
            $.ajax({
                url: "{{ url('/admin/pengaturan/syarat_ketentuan/edit') }}",
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

        $(document).ready(function() {
            $('body').on('click', '#deleteSyaratKetentuan', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iyaa, Saya Yakin'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form_string =
                            "<form method=\"POST\" action=\"{{ url('/admin/pengaturan/syarat_ketentuan/') }}/" +
                            id +
                            "\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"

                        form = $(form_string)
                        form.appendTo('body');
                        form.submit();
                    } else {
                        Swal.fire('Konfirmasi Diterima!', 'Data Anda Masih Terdata', 'success');
                    }
                })
            })
        })
    </script>

@endsection
