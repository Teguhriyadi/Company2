<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Artikel\ArtikelResource;
use App\Http\Resources\Artikel\Detail;
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

        $artikel = Artikel::where("kategori_id", $kategori->id)->orderBy("created_at", "DESC")->get();

        if ($artikel->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($artikel as $d) {
                $data[] = [
                    "artikel_judul" => $d->judul,
                    "artikel_slug" => $d->slug,
                    "artikel_gambar" => $d->foto,
                    "artikel_kategori" => $d->getKategori->kategori_nama,
                    "artikel_created_by" => $d->getUser->nama,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
