<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    public function index()
    {
        $jasa = Jasa::orderBy("created_at", "DESC")->paginate(6);

        if ($jasa->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($jasa as $d) {
                $data[] = [
                    "jasa_nama" => $d->jasa_nama,
                    "jasa_deskripsi" => $d->jasa_deskripsi,
                    "jasa_gambar" => $d->jasa_gambar,
                    "id_kategori" => $d->getKategori->kategori_nama
                ];
            }
        }
        return response()->json($data, 200);
    }
}
