<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\ProfilPerusahaan;
use Illuminate\Http\Request;

class ProfilPerusahaanController extends Controller
{
    public function index()
    {
        $profil = ProfilPerusahaan::get();

        if (empty($profil)) {
            return response()->json([["message" => "Data Tidak Ada"]]);
        } else {
            return response()->json(["status" => 1, "message" => $profil]);
        }
    }
}
