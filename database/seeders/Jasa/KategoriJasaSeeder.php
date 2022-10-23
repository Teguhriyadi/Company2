<?php

namespace Database\Seeders\Jasa;

use App\Models\Jasa\KategoriJasa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriJasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriJasa::create([
            "kategori_jasa_nama" => "Jasa Videografi",
            "kategori_jasa_slug" => "jasa-videografi"
        ]);

        KategoriJasa::create([
            "kategori_jasa_nama" => "Jasa Fotografi",
            "kategori_jasa_slug" => "jasa-fotografi"
        ]);

        KategoriJasa::create([
            "kategori_jasa_nama" => "Jasa Animasi",
            "kategori_jasa_slug" => "jasa-animasi"
        ]);
    }
}
