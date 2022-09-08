<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan\ProfilPerusahaan;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function dashboard()
    {
        return view("pages.admin.dashboard");
    }

    public function app()
    {
        $data = [
            "data_profil" => ProfilPerusahaan::first()
        ];

        return view("app", $data);
    }
}
