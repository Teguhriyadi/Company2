<?php

namespace Database\Seeders;

use App\Models\Master\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            "kategori_nama" => "Desain UI / UX"
        ]);

        Kategori::create([
            "kategori_nama" => "Marketing"
        ]);

        Kategori::create([
            "kategori_nama" => "Business"
        ]);
    }
}
