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
            "paket_kategori_jasa_id" => 1,
            "paket_kategori_paket_id" => 1
        ]);

        PaketJasa::create([
            "paket_kategori_jasa_id" => 1,
            "paket_kategori_paket_id" => 2
        ]);

        PaketJasa::create([
            "paket_kategori_jasa_id" => 2,
            "paket_kategori_paket_id" => 2
        ]);

    }
}
