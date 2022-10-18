<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function store(Request $request)
    {
        Pesan::create([
            "pesan_nama" => $request->pesan_nama,
            "pesan_no_hp" => $request->pesan_no_hp,
            "pesan_email" => $request->pesan_email,
            "pesan_nama_perusahaan" => $request->pesan_nama_perusahaan,
            "pesan_subjek" => $request->pesan_subjek,
            "pesan_teks" => $request->pesan_teks
        ]);

        return response()->json(['message' => "Data Berhasil di Tambahkan"]);
    }
}
