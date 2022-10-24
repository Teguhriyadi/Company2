<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\Akun\InformasiLogin;
use App\Models\Pengaturan\ProfilPerusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        $data = [
            "profil" => ProfilPerusahaan::first()
        ];

        return view("pages.auth.login", $data);
    }

    public function post_login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", $request->email)->first();

        if ($user) {
            if ($user->status == 1) {
                if (Auth::attempt($credentials)) {
                    InformasiLogin::create([
                        "id_user" => $user->id,
                        "nama" => $user->nama
                    ]);

                    $request->session()->regenerate();

                    return redirect()->intended("/admin/dashboard");
                } else {
                    return redirect("/admin/login");
                }
            } else {

                return redirect("/admin/login");
            }
        } else {
            return redirect("/admin/login");
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/admin/login");
    }
}
