<?php

namespace App\Http\Controllers\API\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\SyaratKetentuan;
use Illuminate\Http\Request;

class SyaratKetentuanController extends Controller
{
    public function index()
    {
        $syarat_ketentuan = SyaratKetentuan::orderBy("created_at", "DESC")->paginate(3);

        if ($syarat_ketentuan->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($syarat_ketentuan as $d) {
                $data[] = [
                    "syarat_ketentuan_judul" => $d->syarat_ketentuan_judul,
                    "syarat_ketentuan_deskripsi" => $d->syarat_ketentuan_deskripsi,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
