<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Transaksi\JasaToken;
use App\Models\Transaksi\KodeToken;
use Illuminate\Http\Request;

class JasaTokenController extends Controller
{
    public function store(Request $request)
    {
        $token = KodeToken::where("kode", $request->kode)->first();

        $token->status = 0;

        $token->save();

        $jasa = JasaToken::create([
            "kode_token" => $request->kode,
            "user_id" => $request->user_id,
            "created_by" => 1,
            "jasa_id" => 3,
            "produk_id" => $request->produk_id
        ]);

        return response()->json([
            "success" => true,
            "message" => "Data Berhasil di Tambah",
            "jasa" => $jasa
        ], 200);

    }
}
