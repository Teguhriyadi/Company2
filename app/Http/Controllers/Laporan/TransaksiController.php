<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Payment\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view("pages.admin.laporan.v_transaksi");
    }

    public function cari_laporan(Request $request)
    {
        $data["tanggal_mulai"] = $request->tanggal_mulai;
        $data["tanggal_selesai"] = $request->tanggal_selesai;
        $data["laporan"] = Order::whereBetween("created_at", [$request->tanggal_mulai, $request->tanggal_selesai])->get();

        return view("pages.admin.laporan.v_transaksi", $data);
    }
}
