<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Models\Akun\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            "data_user" => User::get()
        ];

        return view("pages.admin.akun.users.index", $data);
    }

    public function create()
    {
        $data = [
            "data_role" => Role::get()
        ];

        return view("pages.admin.akun.users.tambah", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("foto")) {
            $data = $request->file("foto")->store("users");
        }

        User::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "id_role" => $request->id_role,
            "created_by" => Auth::user()->id,
            "foto" => $data
        ]);

        return back();
    }
}
