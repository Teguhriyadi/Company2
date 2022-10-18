<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master\Artikel;
use App\Models\Master\ArtikelTag;
use App\Models\Master\Kategori;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::orderBy("created_at", "DESC")->paginate(3);

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

    public function detail($slug)
    {
        $artikel = Artikel::where("slug", $slug)->first();

        $artikel_tag = ArtikelTag::where("id_blog", $artikel["id"])->get();

        if (empty($artikel)) {
            return response()->json([["message" => "Data Tidak Ada"]]);
        } else {
            $data = [];
            $tag = [];
            foreach ($artikel_tag as $a) {
                $tag[] = $a->getTag["tag_nama"];
            }
            $data[] = [
                "artikel_judul" => $artikel->judul,
                "artikel_slug" => $artikel->slug,
                "artikel_gambar" => $artikel->foto,
                "artikel_kategori" => $artikel->getKategori->kategori_nama,
                "artikel_deskripsi" => $artikel->deskripsi,
                "artikel_created_by" => $artikel->getUser->nama,
                "artikel_data" => $tag
            ];
            return response()->json($data, 200);
        }
    }

    public function artikel($slug)
    {
        $artikel = Artikel::where("slug", "!=", $slug)->orderBy("created_at", "DESC")->paginate(3);

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
