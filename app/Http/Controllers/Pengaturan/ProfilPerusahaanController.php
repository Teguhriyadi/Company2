<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\ProfilPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilPerusahaanController extends Controller
{
    public function index()
    {
        $data = [
            "data" => ProfilPerusahaan::first()
        ];

        return view("pages.admin.pengaturan.profil_perusahaan.index", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("profil_foto")) {
            $data = $request->file("profil_foto")->store("profil_perusahaan");
        }

        ProfilPerusahaan::create([
            "profil_nama" => $request->profil_nama,
            "profil_singkat" => $request->profil_singkat,
            "profil_deskripsi" => $request->profil_deskripsi,
            "profil_no_hp" => $request->profil_no_hp,
            "profil_email" => $request->profil_email,
            "profil_alamat" => $request->profil_alamat,
            "profil_foto" => url('/storage/' . $data)
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
    }

    public function update(Request $request, $id)
    {
        if ($request->file("profil_foto")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $nama_gambar = $request->file("profil_foto")->store("profil_perusahaan");

            $data = url('/storage/' . $nama_gambar);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        ProfilPerusahaan::where("id", $id)->update([
            "profil_nama" => $request->profil_nama,
            "profil_singkat" => $request->profil_singkat,
            "profil_deskripsi" => $request->profil_deskripsi,
            "profil_no_hp" => $request->profil_no_hp,
            "profil_email" => $request->profil_email,
            "profil_alamat" => $request->profil_alamat,
            "profil_foto" => $data
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success');</script>");
    }
}
