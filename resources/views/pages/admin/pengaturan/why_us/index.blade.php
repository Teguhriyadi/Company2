@extends('pages.layouts.main')

@section('title', 'Why Us')

@section('title_breadcrumb', 'Why Us')

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
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fa fa-upload"></i> Upload Gambar
                </h6>
            </div>
            <form action="{{ url('/admin/pengaturan/why_us') }}" method="POST">
                @csrf
                <div class="card-body">
                    <textarea name="upload" id="editor" cols="30" rows="10"></textarea>
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
</div>

@endsection

@section("js")

<script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: '{{ url("/admin/pengaturan/why_us/upload_gambar"). "?_token=".csrf_token() }}'
            }
        })
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
