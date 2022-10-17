<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $data = [
            "data_kategori" => Kategori::orderBy("created_at", "DESC")->get()
        ];

        return view("pages.admin.master.kategori.index", $data);
    }

    public function store(Request $request)
    {
        $count = Kategori::where("kategori_nama", $request->kategori_nama)->count();

        if ($count > 0) {
            return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            Kategori::create([
                "kategori_nama" => $request->kategori_nama,
                "kategori_slug" => Str::slug($request->kategori_nama)
            ]);

            return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Kategori::where("id", $request->id)->first()
        ];

        return view("pages.admin.master.kategori.edit", $data);
    }

    public function update(Request $request)
    {
        Kategori::where("id", $request->id)->update([
            "kategori_nama" => $request->kategori_nama,
            "kategori_slug" => Str::slug($request->kategori_nama)
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success')</script>");;
    }

    public function destroy($id)
    {
        Kategori::where("id", $id)->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success')</script>");
    }
}
