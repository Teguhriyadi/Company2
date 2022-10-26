<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Models\Akun\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            "foto" => url('/storage/'.$data)
        ]);

        return redirect("/admin/akun/users")->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function edit($id)
    {
        $data = [
            "data_role" => Role::get(),
            "edit" => User::where("id", $id)->first()
        ];

        return view("pages.admin.akun.users.edit", $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->file("foto")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }
            $nama_gambar = $request->file("foto")->store("users");

            $data = url('/storage/' . $nama_gambar);
        } else {
            $data = url("/storage/". $request->gambarLama);
        }

        User::where("id", $id)->update([
            "nama" => $request->nama,
            "email" => $request->email,
            "foto" => $data
        ]);

        return redirect("/admin/akun/users")->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function non_aktifkan($id)
    {
        User::where("id", $id)->update([
            "status" => 0
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Non - Aktifkan', 'success');</script>"]);
    }

    public function aktifkan($id)
    {
        User::where("id", $id)->update([
            "status" => 1
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Aktifkan', 'success');</script>"]);
    }
}
