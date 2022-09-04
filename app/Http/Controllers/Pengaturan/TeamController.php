<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $data = [
            "data_team" => Team::get()
        ];

        return view("pages.admin.pengaturan.team.index", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("team_foto")) {
            $data = $request->file("team_foto")->store("team");
        }

        Team::create([
            "team_nama" => $request->team_nama,
            "team_jabatan" => $request->team_jabatan,
            "team_foto" => url('/storage/' . $data),
            "team_status" => 1
        ]);

        return back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Team::where("id", $request->id)->first()
        ];

        return view("pages.admin.pengaturan.team.edit", $data);
    }

    public function update(Request $request)
    {
        if ($request->file("team_foto_new")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $nama_gambar = $request->file("team_foto_new")->store("team");

            $data = url('/storage/' . $nama_gambar);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        Team::where("id", $request->id)->update([
            "team_nama" => $request->team_nama,
            "team_jabatan" => $request->team_jabatan,
            "team_foto" => $data,
        ]);

        return back();
    }
}
