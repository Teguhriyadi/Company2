<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view("pages.auth.login");
    }

    public function post_login(Request $request)
    {
        $validasi = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $user = User::where("email", $request->email)->first();

        if ($user) {
            if ($user->status == 1) {
                if (Auth::attempt($validasi)) {
                    $request->session()->regenerate();

                    return redirect()->intended("/admin/dashboard");
                }
            } else {
                return back();
            }
        } else {
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/admin/login");
    }
}
