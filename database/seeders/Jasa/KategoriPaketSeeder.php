<?php

namespace Database\Seeders\Jasa;

use App\Models\Jasa\KategoriPaket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriPaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriPaket::create([
            "kategori_paket_nama" => "Paket Indoor",
            "kategori_paket_status" => 1
        ]);

        KategoriPaket::create([
            "kategori_paket_nama" => "Paket Outdoor",
            "kategori_paket_status" => 1
        ]);

        KategoriPaket::create([
            "kategori_paket_nama" => "Paket Platinum",
            "kategori_paket_status" => 1
        ]);

        KategoriPaket::create([
            "kategori_paket_nama" => "Paket Gold",
            "kategori_paket_status" => 1
        ]);

        KategoriPaket::create([
            "kategori_paket_nama" => "Paket Silver",
            "kategori_paket_status" => 1
        ]);

        KategoriPaket::create([
            "kategori_paket_nama" => "Paket Bronze",
            "kategori_paket_status" => 1
        ]);
    }
}
