<?php

namespace Database\Seeders\components;

use App\Models\Pengaturan\Carousel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carousel::create([
            "carousel_judul" => "Web 1",
            "carousel_deskripsi" => "Lorem Ipsum Dolor Sit Amet",
            "carousel_gambar" => "https://images.unsplash.com/photo-1665430922646-5f4fecfc02bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80"
        ]);

        Carousel::create([
            "carousel_judul" => "Web 2",
            "carousel_deskripsi" => "Lorem Ipsum Dolor Sit Amet",
            "carousel_gambar" => "https://images.unsplash.com/photo-1665430922646-5f4fecfc02bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80"
        ]);
    }
}
