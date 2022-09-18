<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $data = [
            "data_portfolio" => Portfolio::get()
        ];

        return view("pages.admin.master.portfolio.index", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("portfolio_foto")) {
            $data = $request->file("portfolio_foto")->store("portfolio");
        }

        Portfolio::create([
            "portfolio_foto" => url("/storage/".$data),
            "portfolio_nama" => $request->portfolio_nama,
            "portfolio_deskripsi" => $request->portfolio_deskripsi
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Portfolio::where("id", $request->id)->first()
        ];

        return view("pages.admin.master.portfolio.edit", $data);
    }

    public function update(Request $request)
    {
        if ($request->file("portfolio_foto")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $nama_gambar = $request->file("portfolio_foto")->store("portfolio");

            $data = url('/storage/' . $nama_gambar);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        Portfolio::where("id", $request->id)->update([
            "portfolio_foto" => $data,
            "portfolio_nama" => $request->portfolio_nama,
            "portfolio_deskripsi" => $request->portfolio_deskripsi
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>");
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::where("id", $id)->first();

        $hasil = trim($portfolio->portfolio_foto, url('/'));

        $print = substr($hasil, 8);

        Storage::delete($print);

        $portfolio->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
