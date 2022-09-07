<?php

namespace App\Http\Controllers\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\Layanan;


class LayananController extends Controller
{
    public function index()
    {
        $data = [
            "data_layanan" => Layanan::get()
        ];

        return view("pages.admin.layanan.index", $data);

    }
}
