<?php

namespace App\Http\Controllers;

use App\Models\Jasa\KategoriJasa;
use App\Models\Transaksi\KodeToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AktivasiTokenController extends Controller
{
    public function index()
    {
        $data["aktivasi"] = KodeToken::orderBy("created_at", "DESC")->get();
        $data["kategori_jasa"] = KategoriJasa::orderBy("created_at", "DESC")->get();

        return view("pages.admin.aktivasi.token.index", $data);
    }

    public function store(Request $request)
    {
        KodeToken::create([
            "created_by" => Auth::user()->id,
            "kode" => date("YmdHis"),
            "jasa_id" => $request->jasa_id,
            "status" => 1
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function update(Request $request, $id)
    {
        KodeToken::where("id", $id)->update([
            "jasa_id" => $request->jasa_id
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        KodeToken::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);

    }

}
