<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index($id)
    {
        $produk = Produk::where("kategori_jasa_id", $id)->orderBy("created_at", "DESC")->get();

        if ($produk->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($produk as $d) {
                $data[] = [
                    "produk_image" => $d->produk_image,
                    "produk_judul" => $d->produk_judul,
                    "produk_kategori_jasa_id" => $d->kategori_jasa_id,
                    "produk_slug" => $d->produk_slug,
                    "produk_harga" => "Rp. " . number_format($d->produk_harga),
                    "produk_deskripsi_singkat" => $d->produk_deskripsi_singkat,
                    "produk_deskripsi" => $d->produk_deskripsi,
                    "produk_kategori" => $d->getKategori->kategori_nama,
                ];
            }
        }
        return response()->json($data, 200);
    }

    public function detail_produk($slug)
    {
        $detail = Produk::where("produk_slug", $slug)->first();

        if (empty($detail)) {
            return response()->json([["message" => "Data Tidak Ada"]]);
        } else {
            $data[] = [
                "produk_kategori" => $detail->getKategori->kategori_nama,
                "produk_image" => $detail->produk_image,
                "produk_judul" => $detail->produk_judul,
                "produk_slug" => $detail->produk_slug,
                "produk_harga" => $detail->produk_harga,
                "produk_deskripsi_singkat" => $detail->produk_deskripsi_singkat,
                "produk_deskripsi" => $detail->produk_deskripsi,
                "project_tanggal" => $detail->created_at
            ];

            return response()->json($data, 200);
        }
    }
}
