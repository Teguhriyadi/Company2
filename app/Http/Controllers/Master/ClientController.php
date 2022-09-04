<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $data = [
            "data_client" => Client::get()
        ];

        return view("pages.admin.master.client.index", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("client_logo")) {
            $data = $request->file("client_logo")->store("client");
        }

        Client::create([
            "client_logo" => url('/storage/' . $data),
            "client_nama" => $request->client_nama,
            "client_status" => 1
        ]);

        return back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Client::where("id", $request->id)->first()
        ];

        return view("pages.admin.master.client.edit", $data);
    }

    public function update(Request $request)
    {
        if ($request->file("client_logo_new")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $nama_gambar = $request->file("client_logo_new")->store("client");

            $data = url('/storage/' . $nama_gambar);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        Client::where("id", $request->id)->update([
            "client_logo" => $data,
            "client_nama" => $request->client_nama
        ]);

        return back();
    }
}
