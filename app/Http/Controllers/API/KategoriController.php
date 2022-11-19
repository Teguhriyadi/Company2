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
                    "kategori_slug" => $d->kategori_slug,
                    "kategori_nama" => $d->kategori_nama,
                    "count" => $d->getCount->count()
                ];
            }
        }
        return response()->json($data, 200);
    }

    public function filter($slug)
    {
        $filter = Kategori::where("kategori_slug", "!=", $slug)->get();

        if ($filter->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($filter as $d) {
                $data[] = [
                    "kategori_slug" => $d->kategori_slug,
                    "kategori_nama" => $d->kategori_nama,
                    "count" => $d->getCount->count()
                ];
            }
        }
        return response()->json($data, 200);
    }
}
