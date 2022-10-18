<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master\ChooseUs;
use Illuminate\Http\Request;

class ChooseUsController extends Controller
{
    public function index()
    {
        $chose_us = ChooseUs::orderBy("created_at", "DESC")->get();

        if ($chose_us->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($chose_us as $d) {
                $data[] = [
                    "choose_us_judul" => $d->choose_us_judul,
                    "choose_us_deskripsi" => $d->choose_us_deskripsi,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
