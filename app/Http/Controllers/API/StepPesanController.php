<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master\StepPesan;
use Illuminate\Http\Request;

class StepPesanController extends Controller
{
    public function index()
    {
        $step_pesan = StepPesan::orderBy("created_at", "DESC")->get();

        if ($step_pesan->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($step_pesan as $d) {
                $data[] = [
                    "step_pesan_judul" => $d->step_pesan_judul,
                    "step_pesan_deskripsi" => $d->step_pesan_deskripsi,
                    "step_pesan_first" => $d->step_pesan_first
                ];
            }
        }
        return response()->json($data, 200);
    }
}
