<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Transaksi\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function keranjang(Request $request)
    {
        $keranjang = Keranjang::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "tanggal" => $request->tanggal,
            "harga" => $request->harga,
            "nomor_hp" => $request->nomor_hp,
            "lokasi" => $request->lokasi,
            "catatan" => $request->catatan,
            "user_id" => $request->user_id
        ]);

        return response()->json([
            "success" => true,
            "data" => $keranjang,
            "message" => "Data Berhasil di Buat"
        ], 200);
    }
}
