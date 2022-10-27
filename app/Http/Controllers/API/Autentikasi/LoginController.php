<?php

namespace App\Http\Controllers\API\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                "success" => false,
                "message" => "Credentials Do Not Match Our Records"
            ], 400);
        }

        $token = $user->createToken('ApiToken')->plainTextToken;

        $response = [
            "success" => true,
            "user" => $user,
            "token" => $token
        ];

        return response($response, 201);
    }

    public function register(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        if ($request->password != $request->konfirmasi_password) {
            return response()->json([
                "success" => false,
                "message" => "Harap Sesuaikan Dengan Konfirmasi Password"
            ]);
        }

        $user = User::where("email", $request->email)->first();

        if ($user) {
            return response()->json([
                "success" => true,
                "message" => "Email Sudah Terdaftar"
            ]);
        } else {
            User::create([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "nama" => $request->first_name . $request->last_name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "id_role" => 2,
                "foto" => "",
                "created_by" => 1
            ]);

            return response()->json([
                "success" => true,
                "message" => "Data Berhasil di Buat"
            ], 200);
        }

    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            "success" => true
        ], 200);
    }
}
