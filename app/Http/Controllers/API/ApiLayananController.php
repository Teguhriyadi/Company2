<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Controllers\Request;
use App\Models\Master\Layanan;

class ApiLayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        if (empty($layanan)) {
            return response()->json(["message" => "Data Kosong", 'layanan' => $layanan, 'code' => 404]);
        } else {
            return response()->json(['message' => 'Success', 'layanan' => $layanan, 'code' => 200]);
        }
    }

}
