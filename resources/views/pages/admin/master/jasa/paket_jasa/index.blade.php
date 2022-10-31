@extends('pages.layouts.main')

@section('title', 'Paket Jasa')

@section('title_breadcrumb', 'Paket Jasa')

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
                                <th class="text-center">Kategori Jasa</th>
                                <th class="text-center">Kategori Paket</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0;
                            @endphp
                            @foreach ($paket as $data)
                            <tr>
                                <td class="text-center">{{ ++$no }}.</td>
                                <td class="text-center">{{ $data->getKategoriJasa->kategori_jasa_nama }}</td>
                                <td class="text-center">{{ $data->getKategoriPaket->kategori_paket_nama }}</td>
                                <td class="text-center">
                                    <button type="button"
                                    class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#exampleModal-{{ $data->id }}">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </button>
                                <button id="deletePaketKategori" data-id="{{ $data->id }}"
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
            <form action="{{ url('/admin/master/paket_jasa/') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="paket_kategori_jasa_id">
                            Kategori Jasa
                        </label>
                        <select name="paket_kategori_jasa_id" id="paket_kategori_jasa_id" class="form-control">
                            <option value="">- Pilih -</option>
                            @foreach ($kategori_jasa as $item)
                                <option value="{{ $item["id"] }}">
                                    {{ $item["kategori_jasa_nama"] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="paket_kategori_paket_id">
                            Kategori Paket
                        </label>
                        <select name="paket_kategori_paket_id" id="paket_kategori_paket_id" class="form-control">
                            <option value="">- Pilih -</option>
                            @foreach ($kategori_paket as $item)
                                <option value="{{ $item["id"] }}">
                                    {{ $item["kategori_paket_nama"] }}
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

@foreach ($paket as $item)
<div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="{{ url('/admin/master/paket_kategori/'.$item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori_paket_nama"> Paket Kategori </label>
                        <input type="text" class="form-control" name="kategori_paket_nama" id="kategori_paket_nama" required placeholder="Masukkan Paket Kategori" value="{{ $item->kategori_paket_nama }}">
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

@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function() {
        $('body').on('click', '#deletePaketKategori', function() {
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
                    "<form method=\"POST\" action=\"{{ url('/admin/master/paket_kategori/') }}/" +
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
