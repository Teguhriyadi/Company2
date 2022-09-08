<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\SpesialisasiKami;

class ApiSpesialisasiKamiController extends Controller
{
    public function index()
    {
        $spesialisasiKami = SpesialisasiKami::all();
        if (empty($spesialisasiKami)) {
            return response()->json([["message" => "Data Kosong"]]);
        } else {
            return response()->json(['message' => 'Success', 'tentangKami' => $spesialisasiKami, 'code' => 200]);
        }
    }

}
