<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        $work = Work::orderBy("created_at", "DESC")->paginate(6);

        if ($work->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($work as $d) {
                $data[] = [
                    "work_title" => $d->work_title,
                    "work_gambar" => $d->work_gambar,
                    "work_slug" => $d->work_slug,
                    "work_kutipan" => $d->work_kutipan,
                    "work_deskripsi" => $d->work_deskripsi
                ];
            }
        }
        return response()->json($data, 200);
    }
}
