<?php

namespace Database\Seeders;

use App\Models\Master\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::create([
            "partner_nama" => "Inventara",
            "partner_logo" => "http://127.0.0.1:1234/gambar/upload-gambar.jpg",
            "partner_status" => 1
        ]);

        Partner::create([
            "partner_nama" => "Jaring",
            "partner_logo" => "http://127.0.0.1:1234/gambar/upload-gambar.jpg",
            "partner_status" => 1
        ]);

        Partner::create([
            "partner_nama" => "Solusi",
            "partner_logo" => "http://127.0.0.1:1234/gambar/upload-gambar.jpg",
            "partner_status" => 1
        ]);
    }
}
