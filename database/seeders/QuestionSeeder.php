<?php

namespace Database\Seeders;

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
            "question_pesan_judul" => "Step 1",
            "question_pesan_deskripsi" => "Login terlebih dahulu, jika belum mempunyai akun bisa klik menu daftar pada navbar",
            "question_pesan_first" => 0,
        ]);

        Question::create([
            "question_pesan_judul" => "Step 2",
            "question_pesan_deskripsi" => "Pilih jasa yang anda butuhkan",
            "question_pesan_first" => 0,
        ]);

        Question::create([
            "question_pesan_judul" => "Step 3",
            "question_pesan_deskripsi" => "Kemudian bayar dengan dengan banyak metode yang pembayaran yang kami sediakan",
            "question_pesan_first" => 1,
        ]);
    }
}
