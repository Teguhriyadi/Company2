@extends('pages.layouts.main')

@section('title', 'Aktivasi Token')

@section('title_breadcrumb', 'Aktivasi Token')

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
                                <th class="text-center">Dibuat Oleh</th>
                                <th class="text-center">Kode Token</th>
                                <th class="text-center">Jasa</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0;
                            @endphp
                            @foreach ($aktivasi as $item)
                            <tr>
                                <td class="text-center">{{ ++$no }}.</td>
                                <td class="text-center">{{ $item->getUser->nama }}</td>
                                <td class="text-center">{{ $item->kode }}</td>
                                <td class="text-center">{{ $item->getJasa->kategori_jasa_nama }}</td>
                                <td class="text-center">
                                    @if ($item->status == 0)
                                    <span class="badge badge-danger">
                                        Tidak Aktif
                                    </span>
                                    @elseif($item->status == 1)
                                    <span class="badge badge-success">
                                        Aktif
                                    </span>
                                    @else
                                    -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->status == 0)
                                    -
                                    @elseif($item->status == 1)
                                    <a type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit-{{ $item->id }}">
                                        <i class="fa fa-edit"></i>
                                        Edit
                                    </a>
                                    <button id="deleteKodeToken" data-id="{{ $item->id }}"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                    @else

                                    @endif
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
            <form action="{{ url('/admin/aktivasi/token/') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jasa_id"> Jasa </label>
                        <select name="jasa_id" class="form-control" id="jasa_id">
                            <option value="">- Pilih -</option>
                            @foreach ($kategori_jasa as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->kategori_jasa_nama }}
                            </option>
                            @endforeach
                        </select>
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
@foreach ($aktivasi as $edit)
<div class="modal fade" id="exampleModalEdit-{{ $edit->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="{{ url('/admin/aktivasi/token/'.$edit->id) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jasa_id"> Jasa </label>
                        <select name="jasa_id" class="form-control" id="jasa_id">
                            <option value="">- Pilih -</option>
                            @foreach ($kategori_jasa as $item)
                                @if ($edit->jasa_id == $item->id)
                                <option value="{{ $item->id }}" selected>
                                    {{ $item->kategori_jasa_nama }}
                                </option>
                                @else
                                <option value="{{ $item->id }}">
                                    {{ $item->kategori_jasa_nama }}
                                </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
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
@endforeach
<!-- END -->

@endsection

@section('js')

<script type="text/javascript">
    function editArtikel(id) {
        $.ajax({
            url: "{{ url('/admin/master/artikel/edit') }}",
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
        $('body').on('click', '#deleteKodeToken', function() {
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
                    "<form method=\"POST\" action=\"{{ url('/admin/aktivasi/token/') }}/" +
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
