@extends('pages.layouts.main')

@section('title', 'Testimonial')

@section('title_breadcrumb', 'Testimonial')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <i class="fa fa-user"></i> Data @yield('title')
                    <a href="{{ url('/admin/pengaturan/testimonial/create') }}" class="btn btn-primary btn-sm float-right">
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
                                    <th class="text-center">Foto</th>
                                    <th>Review</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data_testimonial as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td>{{ $data->testimonial_nama }}</td>
                                        <td class="text-center">
                                            <img src="{{ $data->testimonial_foto }}" width="50px" class="img-fluid">
                                        </td>
                                        <td>{{ $data->testimonial_review }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/pengaturan/testimonial/' . $data->id . '/edit') }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button id="deleteTestimonial" data-id="{{ $data->id }}"
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

@endsection

@section('js')

    <script type="text/javascript">
        $(document).ready(function() {
            $('body').on('click', '#deleteTestimonial', function() {
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
                            "<form method=\"POST\" action=\"{{ url('/admin/pengaturan/testimonial/') }}/" +
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
