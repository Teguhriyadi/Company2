<?php

namespace Database\Seeders\Jasa;

use App\Models\Jasa\ProdukPaket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukPaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProdukPaket::create([
            "paket_jasa_id" => 2,
            "produk_id" => 1
        ]);

        ProdukPaket::create([
            "paket_jasa_id" => 2,
            "produk_id" => 2
        ]);

        ProdukPaket::create([
            "paket_jasa_id" => 2,
            "produk_id" => 3
        ]);

        ProdukPaket::create([
            "paket_jasa_id" => 1,
            "produk_id" => 4
        ]);

        ProdukPaket::create([
            "paket_jasa_id" => 1,
            "produk_id" => 5
        ]);

        ProdukPaket::create([
            "paket_jasa_id" => 3,
            "produk_id" => 6
        ]);

        ProdukPaket::create([
            "paket_jasa_id" => 3,
            "produk_id" => 7
        ]);

        ProdukPaket::create([
            "paket_jasa_id" => 3,
            "produk_id" => 8
        ]);

        ProdukPaket::create([
            "paket_jasa_id" => 3,
            "produk_id" => 9
        ]);
    }
}
