<?php

namespace App\Http\Controllers\Production;

use App\Http\Controllers\Controller;
use App\Models\Jasa\KategoriJasa;
use App\Models\Master\Portfolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        $data["portofolio"] = Portfolio::orderBy("created_at", "DESC")->get();
        $data["kategori_jasa"] = KategoriJasa::orderBy("created_at", "DESC")->get();

        return view("pages.admin.production.portofolio.index", $data);
    }

    public function store(Request $request)
    {
        Portfolio::create($request->all());

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function update(Request $request, $id)
    {
        Portfolio::where("id", $id)->update([
            "portofolio_url" => $request->portofolio_url,
            "portofolio_nama" => $request->portofolio_nama,
            "portofolio_deskripsi" => $request->portofolio_deskripsi,
            "kategori_jasa_id" => $request->kategori_jasa_id
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        Portfolio::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
