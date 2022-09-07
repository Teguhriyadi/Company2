<?php

namespace App\Http\Controllers\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Produk;





class ProdukController extends Controller
{
    public function index()
    {
        $data = [
            "data_produk" => Produk::get()
        ];

        return view("pages.admin.proyek.index", $data);

    }
}
