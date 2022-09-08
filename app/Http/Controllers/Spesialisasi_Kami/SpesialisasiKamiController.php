<?php

namespace App\Http\Controllers\Spesialisasi_Kami;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\SpesialisasiKami;





class SpesialisasiKamiController extends Controller
{
    public function index()
    {
        $data = [
            "data_spesialisasi_kami" =>SpesialisasiKami::get()
        ];

        return view("pages.admin.SpesialisasiKami.index", $data);;
    }
}
