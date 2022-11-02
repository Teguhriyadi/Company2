<?php

namespace Database\Seeders;

use App\Models\Master\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::create([
            "portofolio_url" => "https://www.youtube.com/embed/hmma0aVux9o",
            "portofolio_nama" => "Muslim APP",
            "portofolio_deskripsi" => "Negara Indonesia merupakan negara yang kaya akan kekayaan alam, kebudayaan, Ras , Suku, serta Agama",
            "kategori_jasa_id" => 1
        ]);

        Portfolio::create([
            "portofolio_url" => "https://www.youtube.com/embed/EEqF3Z4bCBk",
            "portofolio_nama" => "Personal Video Profil",
            "portofolio_deskripsi" => "Menjelaskan Tentang Data Pribadi dan Keseharian Saya",
            "kategori_jasa_id" => 1
        ]);

        Portfolio::create([
            "portofolio_url" => "https://www.youtube.com/embed/Y7M1qlAsXFw",
            "portofolio_nama" => "POV Street Photography Jakarta",
            "portofolio_deskripsi" => "Menjelaskan Keadaan Jalanan Sekitar Daerah Jakarta",
            "kategori_jasa_id" => 1
        ]);

        Portfolio::create([
            "portofolio_url" => "https://www.youtube.com/embed/qnXcB5L97MI",
            "portofolio_nama" => "Indonesia - Our Home",
            "portofolio_deskripsi" => "Indonesia - Adalah Rumah Kita",
            "kategori_jasa_id" => 1
        ]);

        Portfolio::create([
            "portofolio_url" => "https://www.youtube.com/embed/vuZ_9hPksCQ",
            "portofolio_nama" => "Bisnis Besar Koruptor",
            "portofolio_deskripsi" => "Wahh.. Ternyata Ada Bisnis Besar - Besaran Sang Koruptor",
            "kategori_jasa_id" => 3
        ]);

        Portfolio::create([
            "portofolio_url" => "https://www.youtube.com/embed/23ysetJ2Quw",
            "portofolio_nama" => "MINIONS",
            "portofolio_deskripsi" => "Best Moment For Despicable Me",
            "kategori_jasa_id" => 3
        ]);

    }
}
