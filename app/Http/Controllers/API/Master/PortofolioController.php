<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Http\Resources\Production\Portofolio\GetDataResource;
use App\Models\Jasa\KategoriJasa;
use App\Models\Master\Portfolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index($slug)
    {
        $kategori_jasa = KategoriJasa::where("kategori_jasa_slug", $slug)->first();

        $portofolio = Portfolio::query()->where("kategori_jasa_id", $kategori_jasa->id)->orderBy("created_at", "DESC")->with("getKategoriJasa:id,kategori_jasa_slug")->paginate(6);

        return GetDataResource::collection($portofolio);
    }
}
