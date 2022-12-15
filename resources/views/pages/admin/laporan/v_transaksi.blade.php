@php
    use Carbon\Carbon;
@endphp

@extends('pages.layouts.main')

@section('title', 'Laporan Transaksi')

@section('title_breadcrumb', 'Laporan Transaksi')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <i class="fa fa-book"></i> Data @yield("title")
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/laporan/transaksi') }}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-control" value="{{ empty($tanggal_mulai) ? '' : $tanggal_mulai }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" class="form-control" value="{{ empty($tanggal_selesai) ? '' : $tanggal_selesai }}">
                        </div>
                        <div class="col-md-4" style="padding-top: 30px;">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-search"></i> Cari Data
                            </button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama</th>
                                <th class="text-center">Tanggal Booking</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($laporan))
                            <tr>
                                <td colspan="5" class="text-center">
                                    <strong>
                                        <i>
                                            Data Transaksi Saat Ini Belum Ada
                                        </i>
                                    </strong>
                                </td>
                            </tr>
                            @else
                            @php
                                $no = 0;
                                $total = 0;
                            @endphp
                            @forelse ($laporan as $item)
                                @php
                                    $total += $item->gross_amount;
                                @endphp
                            <tr>
                                <td class="text-center">{{ ++$no }}.</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">{{ Carbon::createFromFormat("Y-m-d", $item->tanggal_booking)->isoFormat('D MMMM Y') }}</td>
                                <td class="text-center">
                                    @if ($item->status == "settlement")
                                    <span class="badge badge-success">
                                        Success
                                    </span>
                                    @elseif($item->status == "pending")
                                    <span class="badge badge-danger">
                                        Pending
                                    </span>
                                    @endif
                                </td>
                                <td class="text-center">Rp. {{ number_format($item->gross_amount) }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <strong>
                                            <i>
                                                Data Transaksi Tidak Ditemukan
                                            </i>
                                        </strong>
                                    </td>
                                </tr>
                            @endforelse
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    Total Harga
                                </td>
                                <td class="text-center">
                                    @if (empty($total))
                                        Rp. 0
                                    @else
                                    Rp. {{ number_format($total) }}
                                    @endif
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
