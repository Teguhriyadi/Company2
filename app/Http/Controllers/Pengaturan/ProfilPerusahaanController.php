<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\ProfilPerusahaan;
use Illuminate\Http\Request;

class ProfilPerusahaanController extends Controller
{
    public function index()
    {
        $data = [
            "data_profil_perusahaan" => ProfilPerusahaan::first()
        ];

        return view("pages.admin.pengaturan.profil_perusahaan.index", $data);
    }
}
