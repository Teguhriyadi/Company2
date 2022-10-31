<?php

namespace Database\Seeders\blog;

use App\Models\Master\Artikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artikel::create([
            "judul" => "Lorem Ipsum Dolor Sit Amet Satu",
            "slug" => "lorem-ipsum-dolor-sit-amet-satu",
            "kategori_id" => 1,
            "deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "foto" => "https://images.unsplash.com/photo-1665430922646-5f4fecfc02bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80",
            "user_id" => 1
        ]);

        Artikel::create([
            "judul" => "Lorem Ipsum Dolor Sit Amet Dua",
            "slug" => "lorem-ipsum-dolor-sit-amet-dua",
            "kategori_id" => 2,
            "deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "foto" => "https://images.unsplash.com/photo-1665430922646-5f4fecfc02bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80",
            "user_id" => 1
        ]);

        Artikel::create([
            "judul" => "Lorem Ipsum Dolor Sit Amet Tiga",
            "slug" => "lorem-ipsum-dolor-sit-amet-tiga",
            "kategori_id" => 3,
            "deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "foto" => "https://images.unsplash.com/photo-1665430922646-5f4fecfc02bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80",
            "user_id" => 1
        ]);
    }
}
