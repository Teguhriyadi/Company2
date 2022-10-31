<?php

namespace App\Http\Controllers\API\Master\Jasa;

use App\Http\Controllers\Controller;
use App\Models\Jasa\PaketJasa;
use Illuminate\Http\Request;

class PaketJasaController extends Controller
{
    public function index($slug)
    {
        $paket_jasa = PaketJasa::where("kategori_jasa_id", $slug)->orderBy("created_at", "DESC")->get();

        if ($paket_jasa->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($paket_jasa as $d) {
                $data[] = [
                    "paket_kategori_jasa_id" => $d->getKategoriPaket->id,
                    "paket_kategori_jasa_nama" => $d->getKategoriJasa->kategori_jasa_slug,
                    "paket_kategori_paket_nama" => $d->getKategoriPaket->kategori_paket_nama,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
