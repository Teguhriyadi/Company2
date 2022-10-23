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
                    "kategori_jasa_nama" => $d->kategori_jasa_nama,
                    "kategori_jasa_slug" => $d->kategori_jasa_slug,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
