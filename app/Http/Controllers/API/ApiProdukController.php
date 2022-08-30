<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Controllers\Request;
use App\Models\Master\Produk;

class ApiProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        if (empty($produk)) {
            return response()->json([["message" => "Data Kosong"]]);
        } else {
            return response()->json(['message' => 'Success', 'produk' => $produk, 'code' => 200]);
        }
    }

}
