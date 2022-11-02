<?php

namespace Database\Seeders\components;

use App\Models\Master\Services;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Services::create([
            "services_icon" => "bx bxl-dribbble",
            "services_title" => "Videografi",
            "services_deskripsi" => "Bergerak Dalam Bidang Videografi"
        ]);

        Services::create([
            "services_icon" => "bx bxl-dribbble",
            "services_title" => "Fotografi",
            "services_deskripsi" => "Bergerak Dalam Bidang Fotografi"
        ]);

        Services::create([
            "services_icon" => "bx bxl-dribbble",
            "services_title" => "Animasi",
            "services_deskripsi" => "Bergerak Dalam Bidang Animasi"
        ]);
    }
}
