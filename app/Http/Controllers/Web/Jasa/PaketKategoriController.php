<?php

namespace App\Http\Controllers\Web\Jasa;

use App\Http\Controllers\Controller;
use App\Models\Jasa\KategoriPaket;
use Illuminate\Http\Request;

class PaketKategoriController extends Controller
{
    public function index()
    {
        $data["paket"] = KategoriPaket::orderBy("id", "ASC")->get();

        return view("pages.admin.master.jasa.paket_kategori.index", $data);
    }

    public function store(Request $request)
    {
        $count = KategoriPaket::where("kategori_paket_nama", $request->kategori_paket_nama)->count();

        if ($count > 0) {
            return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            KategoriPaket::create($request->all());

            return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
        }
    }

    public function update(Request $request, $id)
    {
        KategoriPaket::where("id", $id)->update([
            "kategori_paket_nama" => $request->kategori_paket_nama
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success')</script>");;
    }

    public function destroy($id)
    {
        KategoriPaket::where("id", $id)->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success')</script>");
    }
}
