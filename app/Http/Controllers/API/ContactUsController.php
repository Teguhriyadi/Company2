<?php

namespace App\Http\Controllers\API;

use App\Models\Pesan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        Pesan::create([
            "pesan_nama" => $request->pesan_nama,
            "pesan_email" => $request->pesan_email,
            "pesan_nama_perusahaan" => $request->pesan_nama_perusahaan,
            "pesan_subjek" => $request->pesan_subjek,
            "pesan_teks" => $request->pesan_teks
        ]);

        return response()->json(['message' => "Data Berhasil di Tambahkan"]);
    }
}
