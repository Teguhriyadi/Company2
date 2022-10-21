<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $question = Question::orderBy("created_at", "DESC")->get();

        if ($question->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($question as $d) {
                $data[] = [
                    "question_pesan_judul" => $d->question_pesan_judul,
                    "question_pesan_deskripsi" => $d->question_pesan_deskripsi
                ];
            }
        }
        return response()->json($data, 200);
    }
}
