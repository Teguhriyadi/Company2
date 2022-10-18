<?php

namespace App\Http\Controllers;

use App\Models\Master\TentangKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangKamiController extends Controller
{
    public function index()
    {
        $data = [
            "data_tentang_kami" => TentangKami::first()
        ];

        return view("pages.admin.pengaturan.tentang_kami.index", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("foto")) {
            $data = $request->file("foto")->store("tentang_kami");
        }

        TentangKami::create([
            "judul" => $request->judul,
            "foto" => url("/storage/".$data),
            "deskripsi" => $request->deskripsi
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function update(Request $request, $id)
    {
        if ($request->foto) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }
            $foto = $request->file("foto")->store("tentang_kami");

            $data = url("/storage/" . $foto);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        TentangKami::where("id", $id)->update([
            "judul" => $request->judul,
            "foto" => $data,
            "deskripsi" => $request->deskripsi
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }
}
