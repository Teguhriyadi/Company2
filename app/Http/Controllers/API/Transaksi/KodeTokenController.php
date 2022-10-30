<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Transaksi\KodeToken;
use Illuminate\Http\Request;

class KodeTokenController extends Controller
{
    public function index(Request $request)
    {
        $generate = KodeToken::where("kode", $request->kode)->first();

        if (empty($generate)) {
            return response()->json([["message" => "Data Tidak Ada"]]);
        } else {
            return response()->json([$generate]);
        }
    }
}
