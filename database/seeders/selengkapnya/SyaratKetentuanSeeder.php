<?php

namespace Database\Seeders\selengkapnya;

use App\Models\Pengaturan\SyaratKetentuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SyaratKetentuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SyaratKetentuan::create([
            "syarat_ketentuan_judul" => "Bagaimana Cara 1",
            "syarat_ketentuan_deskripsi" => "Lorem Ipsum Dolor Sit Amet"
        ]);

        SyaratKetentuan::create([
            "syarat_ketentuan_judul" => "Bagaimana Cara 2",
            "syarat_ketentuan_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        SyaratKetentuan::create([
            "syarat_ketentuan_judul" => "Bagaimana Cara 3",
            "syarat_ketentuan_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);
    }
}
