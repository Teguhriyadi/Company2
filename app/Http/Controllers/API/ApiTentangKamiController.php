<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\TentangKami;

class ApiTentangKamiController extends Controller
{
    public function index()
    {
        $tentangKami = TentangKami::all();
        if (empty($tentangKami)) {
            return response()->json([["message" => "Data Kosong"]]);
        } else {
            return response()->json(['message' => 'Success', 'tentangKami' => $tentangKami, 'code' => 200]);
        }
    }

}
