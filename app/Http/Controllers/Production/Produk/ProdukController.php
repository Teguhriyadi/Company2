<?php

namespace App\Http\Controllers\Production\Produk;

use App\Http\Controllers\Controller;
use App\Models\Master\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index()
    {
        $data["produk"] = Produk::orderBy("created_at", "DESC")->get();

        return view("pages.admin.production.produk.index", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("produk_image"))
        {
            $data = $request->file("produk_image")->store("produk");
        }

        Produk::create([
            "kategori_id" => 1,
            "kategori_jasa_id" => 1,
            "produk_image" => url("/storage/". $data),
            "produk_judul" => $request->produk_judul,
            "produk_slug" => Str::slug($request->produk_judul),
            "produk_harga" => $request->produk_harga,
            "produk_deskripsi_singkat" => $request->produk_deskripsi_singkat,
            "produk_deskripsi" => $request->produk_deskripsi
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
    }

    public function update(Request $request, $id)
    {
        if ($request->file("produk_image")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $nama_gambar = $request->file("produk_image")->store("produk");

            $data = url('/storage/' . $nama_gambar);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        Produk::where("id", $id)->update([
            "kategori_id" => 1,
            "kategori_jasa_id" => 1,
            "produk_image" => $data,
            "produk_judul" => $request->produk_judul,
            "produk_slug" => Str::slug($request->produk_judul),
            "produk_harga" => $request->produk_harga,
            "produk_deskripsi_singkat" => $request->produk_deskripsi_singkat,
            "produk_deskripsi" => $request->produk_deskripsi
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success');</script>");
    }

    public function destroy($id)
    {
        $artikel = Produk::where("id", $id)->first();

        $str = $artikel->produk_image;
        $hasil = trim($str, url('/'));

        $print = substr($hasil, 8);

        Storage::delete($print);

        $artikel->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success')</script>");
    }
}
