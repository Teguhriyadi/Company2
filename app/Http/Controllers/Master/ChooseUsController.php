<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\ChooseUs;
use Illuminate\Http\Request;

class ChooseUsController extends Controller
{
    public function index()
    {
        $var["choose_us"] = ChooseUs::orderBy("created_at", "DESC")->get();

        return view("pages.admin.master.choose_us.index", $var);
    }

    public function store(Request $request)
    {
        $count = ChooseUs::where("choose_us_judul", $request->choose_us_judul)->count();

        if ($count > 0) {
            return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            ChooseUs::create($request->all());

            return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
        }
    }

    public function edit(Request $request)
    {
        $var["edit"] = ChooseUs::where("id", $request->id)->first();

        return view("pages.admin.master.choose_us.edit", $var);
    }

    public function update(Request $request)
    {
        ChooseUs::where("id", $request->id)->update([
            "choose_us_judul" => $request->choose_us_judul,
            "choose_us_deskripsi" => $request->choose_us_deskripsi
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success')</script>");;
    }

    public function destroy($id)
    {
        ChooseUs::where("id", $id)->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success')</script>");
    }
}
