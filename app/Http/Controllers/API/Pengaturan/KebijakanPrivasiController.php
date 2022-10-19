<?php

namespace App\Http\Controllers\API\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\KebijakanPrivasi;
use Illuminate\Http\Request;

class KebijakanPrivasiController extends Controller
{
    public function index()
    {
        $kebijakan = KebijakanPrivasi::orderBy("created_at", "DESC")->paginate(3);

        if ($kebijakan->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($kebijakan as $d) {
                $data[] = [
                    "kebijakan_judul" => $d->kebijakan_judul,
                    "kebijakan_deskripsi" => $d->kebijakan_deskripsi,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
