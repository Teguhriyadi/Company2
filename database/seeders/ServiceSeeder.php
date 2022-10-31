<?php

namespace Database\Seeders;

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
            "services_title" => "Testing",
            "services_deskripsi" => "Menyediakan jasa testing berbagai device"
        ]);

        Services::create([
            "services_icon" => "bx bxl-dribbble",
            "services_title" => "Desain UI / UX",
            "services_deskripsi" => "Menyediakan jasa desain pada ui/ux"
        ]);

        Services::create([
            "services_icon" => "bx bxl-dribbble",
            "services_title" => "Web Application",
            "services_deskripsi" => "Menyediakan Jasa Pembuatan aplikasi website"
        ]);

        Services::create([
            "services_icon" => "bx bxl-dribbble",
            "services_title" => "IT Bussiness",
            "services_deskripsi" => "Kami juga menyediakan jasa untuk menjembatani it dengan bisnin yang anda jalankan"
        ]);
    }
}
