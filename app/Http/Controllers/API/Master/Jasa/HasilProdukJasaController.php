<?php

namespace App\Http\Controllers\API\Master\Jasa;

use App\Http\Controllers\Controller;
use App\Models\Jasa\HasilJasaProduk;
use Illuminate\Http\Request;

class HasilProdukJasaController extends Controller
{
    public function index($produk_id)
    {
        $benefit = HasilJasaProduk::where("produk_id", $produk_id)->orderBy("created_at", "DESC")->get();

        if ($benefit->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($benefit as $d) {
                $data[] = [
                    "hasil_gambar" => $d->hasil_gambar,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
