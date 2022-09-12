<?php

namespace App\Http\Controllers;

use App\Models\Master\TentangKami;
use Illuminate\Http\Request;

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

    public function update(Request $request)
    {
        echo "ada";
    }
}
