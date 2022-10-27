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
            "pesan_email" => $request->pesan_email,
            "pesan_subjek" => $request->pesan_subjek,
            "pesan_teks" => $request->pesan_teks
        ]);

        return response()->json(['message' => "Data Berhasil di Tambahkan"]);
    }
}
