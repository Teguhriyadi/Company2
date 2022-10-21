<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master\TentangKami;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $data = TentangKami::first();

        if (empty($data)) {
            return response()->json([["message" => "Data Tidak Ada"]]);
        } else {
            return response()->json([$data]);
        }

    }
}
