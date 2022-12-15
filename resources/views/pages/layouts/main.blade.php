@php
use App\Models\Pengaturan\ProfilPerusahaan;
$data = ProfilPerusahaan::first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        {{ empty($data) ? '-' : $data->profil_nama }} - @yield('title')
    </title>
    @if (empty($data))
    @else
        <link rel="icon" type="image/png" href="{{ $data->profil_foto }}" />
    @endif

    <!-- Custom fonts for this template-->
    @include('pages.layouts.partials.css.style_css')

    @yield('css')

</head>

@php
    use Illuminate\Http\Request;
@endphp

<body id="page-top">
    <div id="wrapper">
        @include('pages.layouts.partials.sidebar.main_sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                @include('pages.layouts.partials.navbar.top_navbar')

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            @yield('title_breadcrumb')
                        </h1>
                    </div>

                    @yield('content')

                </div>
            </div>

            @include('pages.layouts.partials.footer.footer')

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pilih Tombol Logout Untuk Mengakhiri Sesi
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('/admin/logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>


    @include('pages.layouts.partials.js.style_js')

    @if (session('message'))
        {!! session('message') !!}
    @endif

    @yield('js')

    <script>
        window.setTimeout("waktu()", 1000);

        function waktu() {
            var waktu = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = waktu.getHours();
            document.getElementById("menit").innerHTML = waktu.getMinutes();
            document.getElementById("detik").innerHTML = waktu.getSeconds();
        }
    </script>

</body>

</html>
