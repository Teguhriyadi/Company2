<?php

namespace Database\Seeders;

use App\Models\Master\StepPesan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StepPesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StepPesan::create([
            "step_pesan_judul" => "Bagaimana Cara Pesan",
            "step_pesan_deskripsi" => "Lorem Ipsum Dolor Sit Amet",
            "step_pesan_first" => 1,
        ]);

        StepPesan::create([
            "step_pesan_judul" => "Bagaimana Cara Pesan 2",
            "step_pesan_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "step_pesan_first" => 0,
        ]);

        StepPesan::create([
            "step_pesan_judul" => "Bagaimana Cara Pesan 3",
            "step_pesan_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "step_pesan_first" => 0,
        ]);
    }
}
