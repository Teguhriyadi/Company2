<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Artikel;
use App\Models\Master\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $var["kategori"] = Kategori::orderBy("created_at", "DESC")->get();
        $var["artikel"] = Artikel::orderBy("created_at", "DESC")->get();

        return view("pages.admin.master.artikel.index", $var);
    }

    public function store(Request $request)
    {
        $count = Artikel::where("judul", $request->judul)->count();

        if ($count > 0) {
            return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {

            if ($request->file("foto")) {
                $var["foto"] = $request->file("foto")->store("artikel");

                $gambar = url("/storage/".$var["foto"]);
            }

            Artikel::create([
                "judul" => $request->judul,
                "slug" => Str::slug($request->judul),
                "kategori_id" => $request->kategori_id,
                "deskripsi" => $request->deskripsi,
                "foto" => $gambar,
                "user_id" => Auth::user()->id
            ]);

            return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
        }
    }

    public function edit(Request $request)
    {
        $var["kategori"] = Kategori::orderBy("created_at", "DESC")->get();
        $var["edit"] = Artikel::where("id", $request->id)->first();

        return view("pages.admin.master.artikel.edit", $var);
    }

    public function update(Request $request)
    {
        if ($request->file("foto")) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }

            $var["foto"] = $request->file("foto")->store("artikel");

            $gambar = url("/storage/".$var["foto"]);

        } else {

            $gambar = url("/storage/".$request->oldGambar);

        }

        Artikel::where("id", $request->id)->update([
            "judul" => $request->judul,
            "slug" => Str::slug($request->judul),
            "kategori_id" => $request->kategori_id,
            "deskripsi" => $request->deskripsi,
            "foto" => $gambar,
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success')</script>");;
    }

    public function destroy($id)
    {
        $artikel = Artikel::where("id", $id)->first();

        $str = $artikel->foto;
        $hasil = trim($str, url('/'));

        $print = substr($hasil, 8);

        Storage::delete($print);

        $artikel->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success')</script>");
    }
}
