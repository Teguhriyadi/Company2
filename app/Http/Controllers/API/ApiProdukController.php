<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
