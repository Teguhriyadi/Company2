<?php

namespace App\Http\Controllers;

use App\Models\Akun\InformasiLogin;
use App\Models\Master\Portfolio;
use App\Models\Pengaturan\ProfilPerusahaan;
use App\Models\Pengaturan\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{

    public function dashboard()
    {
        $data = [
            "data_last_login" => InformasiLogin::where("id_user", Auth::user()->id)->orderBy("created_at", "DESC")->paginate(5),
            "count_testi" => Testimonial::count(),
            "count_portfolio" => Portfolio::count(),
            "count_akun" => User::where("status", 1)->count()
        ];

        return view("pages.admin.dashboard", $data);
    }

    public function app()
    {
        $data = [
            "data_profil" => ProfilPerusahaan::first()
        ];

        return view("app", $data);
    }

    public function informasi_login()
    {
        $data = [
            "data_informasi_login" => InformasiLogin::where("id_user", Auth::user()->id)->get()
        ];

        return view("pages.admin.akun.informasi_login.index", $data);
    }
}
