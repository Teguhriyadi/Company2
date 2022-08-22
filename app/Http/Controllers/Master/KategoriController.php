<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = [
            "data_kategori" => Kategori::get()
        ];

        return view("pages.admin.master.kategori.index", $data);
    }
}
