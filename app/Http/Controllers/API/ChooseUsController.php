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
                    "upload" => $d->upload,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
