<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy("created_at", "DESC")->paginate(6);

        if ($kategori->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($kategori as $d) {
                $data[] = [
                    "kategori_nama" => $d->kategori_nama
                ];
            }
        }
        return response()->json($data, 200);
    }
}
