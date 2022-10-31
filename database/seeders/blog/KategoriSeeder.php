<?php

namespace Database\Seeders\blog;

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
            "kategori_slug" => "desain-ui-ux",
            "kategori_nama" => "Desain UI / UX"
        ]);

        Kategori::create([
            "kategori_slug" => "marketing",
            "kategori_nama" => "Marketing"
        ]);

        Kategori::create([
            "kategori_slug" => "business",
            "kategori_nama" => "Business"
        ]);
    }
}
