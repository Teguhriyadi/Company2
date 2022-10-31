<?php

namespace Database\Seeders\selengkapnya;

use App\Models\Pengaturan\KebijakanPrivasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KebijakanPrivasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KebijakanPrivasi::create([
            "kebijakan_judul" => "Bagaimana Cara 1",
            "kebijakan_deskripsi" => "Lorem Ipsum Dolor Sit Amet",
            "kebijakan_first" => 1
        ]);

        KebijakanPrivasi::create([
            "kebijakan_judul" => "Bagaimana Cara 2",
            "kebijakan_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "kebijakan_first" => 0
        ]);

        KebijakanPrivasi::create([
            "kebijakan_judul" => "Bagaimana Cara 3",
            "kebijakan_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "kebijakan_first" => 0
        ]);
    }
}
