<?php

namespace Database\Seeders\Jasa;

use App\Models\Jasa\PaketJasa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketJasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaketJasa::create([
            "kategori_jasa_id" => 1,
            "kategori_paket_id" => 1
        ]);

        PaketJasa::create([
            "kategori_jasa_id" => 1,
            "kategori_paket_id" => 2
        ]);

        PaketJasa::create([
            "kategori_jasa_id" => 2,
            "kategori_paket_id" => 2
        ]);

        PaketJasa::create([
            "kategori_jasa_id" => 2,
            "kategori_paket_id" => 1
        ]);
    }
}
