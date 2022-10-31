<?php

namespace Database\Seeders;

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
            "judul" => "Desain UI / UX",
            "slug" => "desain",
            "kategori_id" => 1,
            "deskripsi" => "Desain ini bersumber dari keinginan yang klien inginkan",
            "foto" => "https://images.unsplash.com/photo-1665430922646-5f4fecfc02bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80",
            "user_id" => 1
        ]);

        Artikel::create([
            "judul" => "Halaman Pemasaran",
            "slug" => "marketing",
            "kategori_id" => 2,
            "deskripsi" => "Jasa telah digubakan di berbagai wilayah indonesia",
            "foto" => "https://images.unsplash.com/photo-1665430922646-5f4fecfc02bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80",
            "user_id" => 1
        ]);

        Artikel::create([
            "judul" => "IT Bussiness",
            "slug" => "it-business",
            "kategori_id" => 3,
            "deskripsi" => "beberapa bisnis yang sedang berlangsung",
            "foto" => "https://images.unsplash.com/photo-1665430922646-5f4fecfc02bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80",
            "user_id" => 1
        ]);
    }
}
