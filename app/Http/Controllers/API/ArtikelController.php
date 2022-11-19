<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Artikel\ArtikelResource;
use App\Http\Resources\Artikel\Detail;
use App\Http\Resources\Artikel\GetAllArtikel;
use App\Http\Resources\Artikel\GetKategoriArtikel;
use App\Models\Master\Artikel;
use App\Models\Master\ArtikelTag;
use App\Models\Master\Kategori;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::orderBy("created_at", "DESC")->with("getKategori:id,kategori_nama")->with("getUser:id,nama")->paginate(3);

        return ArtikelResource::collection($artikel);
    }

    public function detail($slug)
    {
        $artikel = Artikel::where("slug", $slug)->with("getKategori:id,kategori_nama")->with("getUser:id,nama")->with("getArtikelTag")->first();

        return new Detail($artikel);
    }

    public function artikel($slug)
    {
        $artikel = Artikel::where("slug", "!=", $slug)->orderBy("created_at", "DESC")->paginate(3);

        return ArtikelResource::collection($artikel);
    }

    public function detail_by_kategori($slug_kategori)
    {
        $kategori = Kategori::where("kategori_slug", $slug_kategori)->first();

        $artikel = Artikel::query()
        ->where("kategori_id", $kategori->id)
        ->orderBy("created_at", "DESC")
        ->with("getKategori:id,kategori_nama")
        ->with("getUser:id,nama")
        ->paginate(6);

        return GetKategoriArtikel::collection($artikel);
    }

    public function all_artikel()
    {
        $artikel = Artikel::orderBy("created_at", "DESC")->with("getKategori:id,kategori_nama")->with("getUser:id,nama")->paginate(12);

        return GetAllArtikel::collection($artikel);
    }

    public function filter_by_kategori($slug)
    {
        $kategori = Kategori::where("kategori_slug", $slug)->first();

        $artikel = Artikel::query()
        ->where("kategori_id", "!=" ,$kategori->id)
        ->orderBy("created_at", "DESC")
        ->with("getKategori:id,kategori_nama")
        ->with("getUser:id,nama")
        ->paginate(6);

        return GetKategoriArtikel::collection($artikel);
    }
}
