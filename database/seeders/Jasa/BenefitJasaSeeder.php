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
            "produk_id" => 4
        ]);

        BenefitJasa::create([
            "benefit_nama" => "Keren",
            "produk_id" => 4
        ]);

        BenefitJasa::create([
            "benefit_nama" => "Berkualitas",
            "produk_id" => 4
        ]);
    }
}
