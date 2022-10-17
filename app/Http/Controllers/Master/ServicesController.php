<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $var["services"] = Services::orderBy("created_at", "DESC")->get();

        return view("pages.admin.master.services.index", $var);
    }

    public function store(Request $request)
    {
        $count = Services::where("services_title", $request->services_title)->count();

        if ($count > 0) {
            return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            Services::create($request->all());

            return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
        }
    }

    public function edit(Request $request)
    {
        $var["edit"] = Services::where("id", $request->id)->first();

        return view("pages.admin.master.services.edit", $var);
    }

    public function update(Request $request)
    {
        Services::where("id", $request->id)->update([
            "services_icon" => $request->services_icon,
            "services_title" => $request->services_title,
            "services_deskripsi" => $request->services_deskripsi
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success');</script>");;
    }

    public function destroy($id)
    {
        Services::where("id", $id)->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success');</script>");
    }
}
