<?php

namespace App\Http\Controllers\API\Master\Jasa;

use App\Http\Controllers\Controller;
use App\Models\Jasa\KategoriJasa;
use Illuminate\Http\Request;

class KategoriJasaController extends Controller
{
    public function index()
    {
        $kategori_jasa = KategoriJasa::orderBy("created_at", "DESC")->get();

        if ($kategori_jasa->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($kategori_jasa as $d) {
                $data[] = [
                    "kategori_id" => $d->id,
                    "kategori_jasa_nama" => $d->kategori_jasa_nama,
                    "kategori_jasa_slug" => $d->kategori_jasa_slug,
                ];
            }
        }
        return response()->json($data, 200);
    }

    public function detail($slug)
    {
        $kategori = KategoriJasa::where("kategori_jasa_slug", $slug)->first();

        if (empty($kategori)) {
            return response()->json([["message" => "Data Tidak Ada"]]);
        } else {
            $data[] = [
                "kategori_id" => $kategori->id,
                "kategori_slug" => $kategori->kategori_jasa_slug,
            ];
            return response()->json($data);
        }
    }
}
