<?php

namespace Database\Seeders\Jasa;

use App\Models\Jasa\BenefitJasa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BenefitJasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BenefitJasa::create([
            "benefit_nama" => "Bagus",
            "produk_id" => 1
        ]);

        BenefitJasa::create([
            "benefit_nama" => "Keren",
            "produk_id" => 1
        ]);

        BenefitJasa::create([
            "benefit_nama" => "Berkualitas",
            "produk_id" => 4
        ]);

        BenefitJasa::create([
            "benefit_nama" => "Bersih",
            "produk_id" => 5
        ]);

        BenefitJasa::create([
            "benefit_nama" => "Mengkilat",
            "produk_id" => 2
        ]);

        BenefitJasa::create([
            "benefit_nama" => "Terpercaya",
            "produk_id" => 3
        ]);

        BenefitJasa::create([
            "benefit_nama" => "Kilau",
            "produk_id" => 6
        ]);

        BenefitJasa::create([
            "benefit_nama" => "Keren",
            "produk_id" => 7
        ]);

        BenefitJasa::create([
            "benefit_nama" => "Rapih",
            "produk_id" => 8
        ]);

        BenefitJasa::create([
            "benefit_nama" => "Rata",
            "produk_id" => 9
        ]);
    }
}
