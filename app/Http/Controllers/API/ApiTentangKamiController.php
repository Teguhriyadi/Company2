<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\TentangKami;

class ApiTentangKamiController extends Controller
{
    public function index()
    {
        $ttgKami = TentangKami::all();
        if (empty($ttgKami)) {
            return response()->json([["message" => "Data Kosong"]]);
        } else {
            return response()->json(['message' => 'Success', 'ttgKami' => $ttgKami, 'code' => 200]);
        }
    }

}

