<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\SyaratKetentuan;
use Illuminate\Http\Request;

class SyaratKetentuanController extends Controller
{
    public function index()
    {
        $var["syarat_ketentuan"] = SyaratKetentuan::orderBy("created_at", "DESC")->get();

        return view("pages.admin.pengaturan.syarat_ketentuan.index", $var);
    }

    public function store(Request $request)
    {
        $count = SyaratKetentuan::where("syarat_ketentuan_judul", $request->syarat_ketentuan_judul)->count();

        if ($count > 0) {
            return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            SyaratKetentuan::create($request->all());

            return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
        }
    }

    public function edit(Request $request)
    {
        $var["edit"] = SyaratKetentuan::where("id", $request->id)->first();

        return view("pages.admin.pengaturan.syarat_ketentuan.edit", $var);
    }

    public function update(Request $request)
    {
        SyaratKetentuan::where("id", $request->id)->update([
            "syarat_ketentuan_judul" => $request->syarat_ketentuan_judul,
            "syarat_ketentuan_deskripsi" => $request->syarat_ketentuan_deskripsi
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success');</script>");;
    }

    public function destroy($id)
    {
        SyaratKetentuan::where("id", $id)->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success');</script>");
    }
}
