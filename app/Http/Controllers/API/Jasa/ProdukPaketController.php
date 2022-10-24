<?php

namespace App\Http\Controllers\API\Jasa;

use App\Http\Controllers\Controller;
use App\Models\Jasa\ProdukPaket;
use Illuminate\Http\Request;

class ProdukPaketController extends Controller
{
    public function index()
    {
        $produk_paket = ProdukPaket::orderBy("created_at", "DESC")->get();

        if ($produk_paket->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($produk_paket as $d) {
                $data[] = [
                    "produk_paket_jasa_id" => $d->getProdukPaket->id,
                    "produk_paket_nama" => $d->getProduk->produk_judul,
                    "produk_paket_slug" => $d->getProduk->produk_slug,
                    "produk_paket_gambar" => $d->getProduk->produk_image,
                    "produk_paket_harga" => "Rp. " . number_format($d->getProduk->produk_harga),
                    "produk_paket_deskripsi_singkat" => $d->getProduk->produk_deskripsi_singkat
                ];
            }
        }
        return response()->json($data, 200);
    }
}
