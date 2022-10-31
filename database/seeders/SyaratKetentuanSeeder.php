<?php

namespace Database\Seeders;

use App\Models\Pengaturan\SyaratKetentuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SyaratKetentuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SyaratKetentuan::create([
            "syarat_ketentuan_judul" => "Syarat & Kententuan",
            "syarat_ketentuan_deskripsi" => "Informasi di Situs ini disediakan untuk membantu Anda dalam memilih jasa yang sesuai dengan kebutuhan Anda. Dan Anda sepenuhnya bertanggung jawab atas tiap dan seluruh keputusan terkait pemilihan jasa."
        ]);

        // SyaratKetentuan::create([
        //     "syarat_ketentuan_judul" => "Bagaimana Cara 2",
        //     "syarat_ketentuan_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        // ]);

        // SyaratKetentuan::create([
        //     "syarat_ketentuan_judul" => "Bagaimana Cara 3",
        //     "syarat_ketentuan_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        // ]);
    }
}
