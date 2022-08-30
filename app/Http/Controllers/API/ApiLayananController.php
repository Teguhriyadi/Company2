<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\Layanan;

class ApiLayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        if (empty($layanan)) {
            return response()->json([["message" => "Data Kosong"]]);
        } else {
            return response()->json(['message' => 'Success', 'layanan' => $layanan, 'code' => 200]);
        }
    }

}
