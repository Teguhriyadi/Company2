<?php

namespace App\Http\Controllers\Production\Produk;

use App\Http\Controllers\Controller;
use App\Models\Jasa\BenefitJasa;
use App\Models\Master\Produk;
use Illuminate\Http\Request;

class BenefitProdukController extends Controller
{
    public function index()
    {
        $data = [
            "produk" => Produk::orderBy("created_at", "DESC")->get(),
            "benefit" => BenefitJasa::orderBy("created_at", "DESC")->get()
        ];

        return view("pages.admin.production.benefit_jasa.index", $data);
    }

    public function store(Request $request)
    {
        $count = BenefitJasa::where("benefit_nama", $request->benefit_nama)->count();

        if ($count > 0) {
            return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            BenefitJasa::create($request->all());

            return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
        }
    }

    public function update(Request $request)
    {
        BenefitJasa::where("id", $request->id)->update([
            "benefit_nama" => $request->benefit_nama,
            "produk_id" => $request->produk_id
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success')</script>");;
    }

    public function destroy($id)
    {
        BenefitJasa::where("id", $id)->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success')</script>");
    }
}
