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

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success')</script>");
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

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success')</script>");
    }

    public function destroy($id)
    {
        $client = Client::where("id", $id)->first();

        $str = $client->client_logo;
        $hasil = trim($str, url('/'));

        $print = substr($hasil, 8);

        Storage::delete($print);

        $client->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success')</script>");
    }

    public function non_aktifkan($id)
    {
        Client::where("id", $id)->update([
            "client_status" => 0
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Non Aktifkan', 'success');</script>"]);
    }

    public function aktifkan($id)
    {
        Client::where("id", $id)->update([
            "client_status" => 1
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Aktifkan', 'success');</script>"]);
    }
}
