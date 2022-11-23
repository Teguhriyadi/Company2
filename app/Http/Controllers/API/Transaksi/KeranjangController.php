<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaksi\Checkout\GetCheckout;
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

        $encrypt = encrypt($keranjang->id);

        return response()->json([
            "success" => true,
            "message" => "Data Berhasil di Buat",
            "data" => $keranjang,
            "encrypt" => $encrypt
        ], 200);
    }

    public function checkout($id)
    {
        $artikel = Keranjang::where("id", $id)->with("getUser:id,first_name,last_name,nama,email")->first();

        return new GetCheckout($artikel);
    }
}
