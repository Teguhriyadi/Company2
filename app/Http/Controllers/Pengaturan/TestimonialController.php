<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $data = [
            "data_testimonial" => Testimonial::get()
        ];

        return view("pages.admin.pengaturan.testimonial.index", $data);
    }

    public function create()
    {
        return view("pages.admin.pengaturan.testimonial.tambah");
    }

    public function store(Request $request)
    {
        if ($request->file("testimonial_foto")) {
            $data = $request->file("testimonial_foto")->store("testimonial");
        }

        Testimonial::create([
            "testimonial_nama" => $request->testimonial_nama,
            "testimonial_foto" => url('/storage/' . $data),
            "testimonial_jobtitle" => $request->testimonial_jobtitle,
            "testimonial_review" => $request->testimonial_review
        ]);

        return redirect("/admin/pengaturan/testimonial")->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan!', 'success');</script>"]);
    }

    public function edit($id)
    {
        $data = [
            "edit" => Testimonial::where("id", $id)->first()
        ];

        return view("pages.admin.pengaturan.testimonial.edit", $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->file("testimonial_foto")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $nama_gambar = $request->file("testimonial_foto")->store("testimonial");

            $data = url('/storage/' . $nama_gambar);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        Testimonial::where("id", $id)->update([
            "testimonial_nama" => $request->testimonial_nama,
            "testimonial_foto" => $data,
            "testimonial_jobtitle" => $request->testimonial_jobtitle,
            "testimonial_review" => $request->testimonial_review
        ]);

        return redirect("/admin/pengaturan/testimonial")->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan!', 'success');</script>"]);
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::where("id", $id)->first();

        $str = $testimonial->testimonial_foto;
        $hasil = trim($str, url('/'));

        $print = substr($hasil, 8);

        Storage::delete($print);

        $testimonial->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus!', 'success');</script>"]);
    }
}
