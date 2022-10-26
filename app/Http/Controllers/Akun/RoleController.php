<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Models\Akun\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data = [
            "data_role" => Role::get()
        ];

        return view("pages.admin.akun.role.index", $data);
    }

    public function store(Request $request)
    {
        $cek = Role::where("role_nama", $request->role_nama)->count();

        if ($cek > 0) {

            return back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {

            Role::create($request->all());
            return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan!', 'success');</script>"]);
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Role::where("id", $request->id)->first()
        ];

        return view("pages.admin.akun.role.edit", $data);
    }

    public function update(Request $request)
    {
        Role::where("id", decrypt($request->id))->update([
            "role_nama" => $request->role_nama
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan!', 'success');</script>"]);
    }

    public function destroy($id)
    {
        Role::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus!', 'success');</script>"]);
    }
}
