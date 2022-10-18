<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $var["tag"] = Tag::orderBy("created_at", "DESC")->get();

        return view("pages.admin.master.tag.index", $var);
    }

    public function store(Request $request)
    {
        $count = Tag::where("tag_nama", $request->tag_nama)->count();

        if ($count > 0) {
            return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            Tag::create([
                "tag_nama" => $request->tag_nama,
                "tag_slug" => Str::slug($request->tag_nama)
            ]);

            return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
        }
    }

    public function edit(Request $request)
    {
        $var["edit"] = Tag::where("id", $request->id)->first();

        return view("pages.admin.master.tag.edit", $var);
    }

    public function update(Request $request)
    {
        Tag::where("id", $request->id)->update([
            "tag_nama" => $request->tag_nama,
            "tag_slug" => Str::slug($request->tag_nama)
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success');</script>");
    }

    public function destroy($id)
    {
        Tag::where("id", $id)->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success');</script>");
    }
}
