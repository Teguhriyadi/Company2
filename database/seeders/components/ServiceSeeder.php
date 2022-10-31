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
            "services_title" => "Testing",
            "services_deskripsi" => "Lorem Ipsum Dolor Sit Amet"
        ]);

        Services::create([
            "services_icon" => "bx bxl-dribbble",
            "services_title" => "Desain UI / UX",
            "services_deskripsi" => "Lorem Ipsum Dolor Sit Amet"
        ]);

        Services::create([
            "services_icon" => "bx bxl-dribbble",
            "services_title" => "Web Application",
            "services_deskripsi" => "Lorem Ipsum Dolor Sit Amet"
        ]);

        Services::create([
            "services_icon" => "bx bxl-dribbble",
            "services_title" => "IT Bussiness",
            "services_deskripsi" => "Lorem Ipsum Dolor Sit Amet"
        ]);
    }
}
