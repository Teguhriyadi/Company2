@php
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Payment\Order;
@endphp

@extends('pages.layouts.main')

@section('title', 'Dashboard')

@section('title_breadcrumb', 'Dashboard')

@section("breadcrumb")

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb" style="background-color: transparent; padding:0px;">
        <li class="breadcrumb-item active" aria-current="page">
            Dashboard
        </li>
    </ol>
</nav>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Selamat Datang <b>{{ Auth::user()->nama }}</b> !</h4>
            <p>di
                <b>
                    Duo Bintang Studio
                </b>
            </p>
            <hr>
            <p class="mb-0">Silahkan Pilih Menu Untuk Memulai Program</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="row mb-4">
            <div class="col-md-6 mb-4">
                <a href="{{ url('/admin/akun/users') }}">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Akun
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $count_akun }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="{{ url('/admin/master/portfolio') }}">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Portofolio
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $count_portfolio }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-image fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="{{ url('/admin/master/client') }}">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Aktivasi Code
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $count_aktivasi }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-edit fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="{{ url('/admin/pengaturan/testimonial') }}">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Testimonial
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $count_testi }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="{{ url('/admin/master/artikel') }}">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Artikel
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $count_artikel }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="{{ url('/admin/pengaturan/pesan') }}">
                    <div class="card border-left-secondary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Pesan
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $count_pesan }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ url('/admin/akun/informasi_login') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-search"></i> Selengkapnya
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama</th>
                                <th class="text-center">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0;
                            @endphp
                            @foreach ($data_last_login as $data)
                            <tr>
                                <td class="text-center">{{ ++$no }}.</td>
                                <td>{{ $data->nama }}</td>
                                <td class="text-center">
                                    {{ Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->isoFormat('dddd, D MMMM Y H:mm:s') }}
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

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                Grafik Transaksi
            </div>
            <div class="card-body">
                @php
                $order = Order::whereYear("created_at", date("Y"))->count();
                @endphp
                @if (empty($order))
                <div class="alert alert-danger">
                    <strong>
                        <i>
                            Oopss... Data Saat Ini Belum Ada
                        </i>
                    </strong>
                </div>
                @else
                <canvas id="myChart" style="width: 100%"></canvas>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section("js")

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const grafik = document.getElementById('myChart');

    new Chart(grafik, {
        type: 'bar',
        data: {
            labels: [
            @foreach ($bulan as $item)
            ['  {{ $item }} ', ],
            @endforeach
            ],
            datasets: [{
                label: 'Jumlah Transaksi',
                data: [
                @foreach ($convert as $item)
                @php
                $order = Order::whereMonth("created_at", $item)->whereYear("created_at", date("Y"))->count();
                @endphp
                [' {{ $order }} '],
                @endforeach
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
