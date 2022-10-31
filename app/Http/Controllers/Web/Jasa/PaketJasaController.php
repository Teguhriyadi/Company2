<?php

namespace App\Http\Controllers\Web\Jasa;

use App\Http\Controllers\Controller;
use App\Models\Jasa\KategoriJasa;
use App\Models\Jasa\KategoriPaket;
use App\Models\Jasa\PaketJasa;
use Illuminate\Http\Request;

class PaketJasaController extends Controller
{
    public function index()
    {
        $data["kategori_jasa"] = KategoriJasa::orderBy("id", "ASC")->get();
        $data["kategori_paket"] = KategoriPaket::orderBy("id", "ASC")->get();
        $data["paket"] = PaketJasa::orderBy("id", "ASC")->get();

        return view("pages.admin.master.jasa.paket_jasa.index", $data);
    }

    public function store(Request $request)
    {
        $count = PaketJasa::where("paket_kategori_jasa_id", $request->paket_kategori_jasa_id)->where("paket_kategori_paket_id", $request->paket_kategori_paket_id)->count();

        if ($count > 0) {
            return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            PaketJasa::create($request->all());

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
