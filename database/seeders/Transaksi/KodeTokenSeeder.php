<?php

namespace Database\Seeders\transaksi;

use App\Models\Transaksi\KodeToken;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KodeTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KodeToken::create([
            "created_by" => 1,
            "kode" => "29092002",
            "status" => 1,
            "jasa_id" => 3,
        ]);

        KodeToken::create([
            "created_by" => 1,
            "kode" => "29092003",
            "status" => 1,
            "jasa_id" => 1,
        ]);

        KodeToken::create([
            "created_by" => 1,
            "kode" => "06042002",
            "status" => 0,
            "jasa_id" => 3,
        ]);
    }
}
