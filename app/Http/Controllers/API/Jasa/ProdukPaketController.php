<?php

namespace App\Http\Controllers\API\Jasa;

use App\Http\Controllers\Controller;
use App\Models\Jasa\ProdukPaket;

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
                    "kategori_jasa_id" => $d->kategori_jasa_id,
                    "produk_paket_jasa_id" => (empty($d->getProdukPaket->id)) ? null : $d->getProdukPaket->id,
                    "produk_paket_nama" => $d->getProduk->produk_judul,
                    "produk_id" => $d->getProduk->id,
                    "produk_paket_slug" => $d->getProduk->produk_slug,
                    "produk_paket_gambar" => $d->getProduk->produk_image,
                    "produk_paket_harga" => "Rp. " . number_format($d->getProduk->produk_harga),
                    "produk_paket_deskripsi_singkat" => $d->getProduk->produk_deskripsi_singkat,
                    "harga" => number_format($d->getProduk->produk_harga)
                ];
            }
        }
        return response()->json($data, 200);
    }
}
