<?php

namespace App\Http\Controllers\Web\Jasa;

use App\Http\Controllers\Controller;
use App\Models\Jasa\KategoriJasa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriJasaController extends Controller
{
    public function index()
    {
        $data["kategori_jasa"] = KategoriJasa::orderBy("id", "ASC")->get();

        return view("pages.admin.master.jasa.kategori_jasa.index", $data);
    }

    public function store(Request $request)
    {
        $count = KategoriJasa::where("kategori_jasa_nama", $request->kategori_jasa_nama)->count();

        if ($count > 0) {
            return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            KategoriJasa::create([
                "kategori_jasa_nama" => $request->kategori_jasa_nama,
                "kategori_jasa_slug" => Str::slug($request->kategori_jasa_nama)
            ]);

            return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
        }
    }

    public function update(Request $request, $id)
    {
        KategoriJasa::where("id", $id)->update([
            "kategori_jasa_nama" => $request->kategori_jasa_nama,
            "kategori_jasa_slug" => Str::slug($request->kategori_jasa_nama)
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success')</script>");;
    }

    public function destroy($id)
    {
        KategoriJasa::where("id", $id)->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success')</script>");
    }
}
