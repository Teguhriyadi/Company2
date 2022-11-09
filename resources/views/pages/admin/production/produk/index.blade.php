@extends('pages.layouts.main')

@section('title', 'Produk')

@section('title_breadcrumb', 'Produk')

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
                                <th class="text-center">Gambar</th>
                                <th>Judul</th>
                                <th class="text-center">Harga</th>
                                <th>Deskripsi Singkat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0;
                            @endphp
                            @foreach ($produk as $item)
                            <tr>
                                <td class="text-center">{{ ++$no }}.</td>
                                <td class="text-center">
                                    @if (empty($item->produk_image))
                                    -
                                    @else
                                    <img src="{{ $item->produk_image }}" class="img-fluid" width="50">
                                    @endif
                                </td>
                                <td>{{ $item->produk_judul }}</td>
                                <td class="text-center">Rp. {{ number_format($item->produk_harga) }}</td>
                                <td>{{ $item->produk_deskripsi_singkat }}.</td>
                                <td class="text-center">
                                    <a type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit-{{ $item->id }}">
                                        <i class="fa fa-edit"></i>
                                        Edit
                                    </a>
                                    <button id="deleteProduk" data-id="{{ $item->id }}"
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
            <form action="{{ url('/admin/production/produk') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="produk_judul"> Nama </label>
                        <input type="text" class="form-control" name="produk_judul" id="produk_judul" placeholder="Masukkan Judul">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="produk_harga"> Harga </label>
                                <input type="number" class="form-control" name="produk_harga" id="produk_harga" placeholder="0" min="1000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="produk_deskripsi_singkat"> Deskripsi Singkat </label>
                                <input type="text" class="form-control" name="produk_deskripsi_singkat" id="produk_deskripsi_singkat" placeholder="Masukkan Deskripsi Singkat">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="produk_deskripsi"> Deskripsi </label>
                        <textarea name="produk_deskripsi" id="produk_deskripsi" rows="5" placeholder="Masukkan Deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="produk_image"> Gambar </label>
                        <input type="file" class="form-control" name="produk_image" id="produk_image">
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
@foreach ($produk as $edit)
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
            <form action="{{ url('/admin/production/produk/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                @php
                $str = $edit->produk_image;
                $hasil = trim($str, url('/'));

                $print = substr($hasil, 8);
                @endphp
                <input type="hidden" name="gambarLama" value="{{ $print }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="produk_judul"> Nama </label>
                        <input type="text" class="form-control" name="produk_judul" id="produk_judul" placeholder="Masukkan Judul" value="{{ $edit->produk_judul }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="produk_harga"> Harga </label>
                                <input type="number" class="form-control" name="produk_harga" id="produk_harga" placeholder="0" min="1000" value="{{ $edit->produk_harga }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="produk_deskripsi_singkat"> Deskripsi Singkat </label>
                                <input type="text" class="form-control" name="produk_deskripsi_singkat" id="produk_deskripsi_singkat" placeholder="Masukkan Deskripsi Singkat" value="{{ $edit->produk_deskripsi_singkat }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="produk_deskripsi"> Deskripsi </label>
                        <textarea name="produk_deskripsi" id="produk_deskripsi" rows="5" placeholder="Masukkan Deskripsi" class="form-control">{{ $edit->produk_deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label> Gambar </label>
                        <br>
                        <img src="{{ $edit->produk_image }}" class="img-fluid" width="300px">
                    </div>
                    <div class="form-group">
                        <label for="produk_image"> Ganti Gambar </label>
                        <input type="file" class="form-control" name="produk_image" id="produk_image">
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
    $(document).ready(function() {
        $('body').on('click', '#deleteProduk', function() {
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
                    "<form method=\"POST\" action=\"{{ url('/admin/production/produk/') }}/" +
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
