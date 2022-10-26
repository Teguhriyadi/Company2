<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $var["question"] = Question::orderBy("created_at", "DESC")->get();

        return view("pages.admin.master.question.index", $var);
    }

    public function store(Request $request)
    {
        $count = Question::where("question_pesan_judul", $request->question_pesan_judul)->count();

        if ($count > 0) {
            return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            Question::create($request->all());

            return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil ditambah!', 'success');</script>");
        }
    }

    public function edit(Request $request)
    {
        $var["edit"] = Question::where("id", $request->id)->first();

        return view("pages.admin.master.question.edit", $var);
    }

    public function update(Request $request)
    {
        Question::where("id", $request->id)->update([
            "question_pesan_judul" => $request->question_pesan_judul,
            "question_pesan_deskripsi" => $request->question_pesan_deskripsi
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil disimpan!', 'success');</script>");
    }

    public function destroy($id)
    {
        Question::where("id", $id)->delete();

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil dihapus!', 'success');</script>");
    }
}
