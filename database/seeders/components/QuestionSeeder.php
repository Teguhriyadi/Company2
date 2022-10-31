<?php

namespace Database\Seeders\components;

use App\Models\Master\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            "question_pesan_judul" => "Bagaimana Cara Pesan 3",
            "question_pesan_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "question_pesan_first" => 0,
        ]);

        Question::create([
            "question_pesan_judul" => "Bagaimana Cara Pesan 2",
            "question_pesan_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "question_pesan_first" => 0,
        ]);

        Question::create([
            "question_pesan_judul" => "Bagaimana Cara Pesan 1",
            "question_pesan_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "question_pesan_first" => 1,
        ]);
    }
}
