<?php

namespace App\Http\Controllers\API\Master\Jasa;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\KategoriJasa\GetDetailJasa;
use App\Http\Resources\Master\KategoriJasa\GetJasa;
use App\Models\Jasa\KategoriJasa;

class KategoriJasaController extends Controller
{
    public function index()
    {
        $artikel = KategoriJasa::orderBy("created_at", "DESC")->get();

        return GetJasa::collection($artikel);
    }

    public function detail($slug)
    {
        $artikel = KategoriJasa::where("kategori_jasa_slug", $slug)->first();

        return new GetDetailJasa($artikel);
    }
}
