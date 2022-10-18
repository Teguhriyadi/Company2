<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $var["carousel"] = Carousel::orderBy("created_at", "DESC")->get();

        return view("pages.admin.master.carousel.index", $var);
    }

    public function store(Request $request)
    {
        $count = Carousel::where("carousel_judul", $request->carousel_judul)->count();

        if ($count > 0) {
            return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {

            if ($request->file("carousel_gambar")) {
                $var["gambar"] = $request->file("carousel_gambar")->store("carousel");

                $gambar = url("/storage/".$var["gambar"]);
            }

            Carousel::create([
                "carousel_judul" => $request->carousel_judul,
                "carousel_deskripsi" => $request->carousel_deskripsi,
                "carousel_gambar" => $gambar
            ]);

            return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
        }
    }

    public function edit(Request $request)
    {
        $var["edit"] = Carousel::where("id", $request->id)->first();

        return view("pages.admin.master.carousel.edit", $var);
    }

    public function update(Request $request)
    {
        if ($request->file("carousel_gambar")) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }

            $var["gambar"] = $request->file("carousel_gambar")->store("carousel");

            $gambar = url("/storage/".$var["gambar"]);

        } else {

            $gambar = url("/storage/".$request->oldGambar);

        }

        Carousel::where("id", $request->id)->update([
            "carousel_judul" => $request->carousel_judul,
            "carousel_deskripsi" => $request->carousel_deskripsi,
            "carousel_gambar" => $gambar
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success')</script>");;
    }

    public function destroy($id)
    {
        $carousel = Carousel::where("id", $id)->first();

        $str = $carousel->carousel_gambar;
        $hasil = trim($str, url('/'));

        $print = substr($hasil, 8);

        Storage::delete($print);

        $carousel->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success')</script>");
    }
}
