<?php

namespace Database\Seeders;

use App\Models\Master\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Work::create([
            "id_kategori" => 1,
            "work_title" => "Berita 5",
            "work_slug" => "berita-5",
            "work_gambar" => "https://images.unsplash.com/photo-1629808363515-bdfbd573c356?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "work_kutipan" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "work_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "id_user" => 1
        ]);

        Work::create([
            "id_kategori" => 1,
            "work_title" => "Berita 2",
            "work_slug" => "berita-2",
            "work_gambar" => "https://images.unsplash.com/photo-1629808363515-bdfbd573c356?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "work_kutipan" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "work_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "id_user" => 1
        ]);

        Work::create([
            "id_kategori" => 1,
            "work_title" => "Berita 3",
            "work_slug" => "berita-3",
            "work_gambar" => "https://images.unsplash.com/photo-1629808363515-bdfbd573c356?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "work_kutipan" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "work_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "id_user" => 1
        ]);

        Work::create([
            "id_kategori" => 1,
            "work_title" => "Berita 4",
            "work_slug" => "berita-4",
            "work_gambar" => "https://images.unsplash.com/photo-1629808363515-bdfbd573c356?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "work_kutipan" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "work_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet",
            "id_user" => 1
        ]);
    }
}
