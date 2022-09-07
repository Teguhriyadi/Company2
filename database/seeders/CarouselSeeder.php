<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Master\Carousel1;


class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carousel1::create([
            'foto' => 'http://127.0.0.1:8000/assets/HOME.jpg',
            'icon' => 'http://127.0.0.1:8000/assets/qjual_logo.png',
            'deksripsi' => '“Smart Dalam Berjualan & Membuat Transaksi Jadi Lebih Mudah”',
            'nm_link' => 'Learn More',
            'link' => 'http://propertiku.proyek.ti.polindra.ac.id/',
        ]);

        Carousel1::create([
            'foto' => 'http://127.0.0.1:8000/assets/HOME.jpg',
            'icon' => 'http://127.0.0.1:8000/assets/qjual_logo.png',
            'deksripsi' => '“Smart Dalam Berjualan & Membuat Transaksi Jadi Lebih Mudah”',
            'nm_link' => 'Learn More',
            'link' => 'http://propertiku.proyek.ti.polindra.ac.id/',
        ]);

        Carousel1::create([
            'foto' => 'http://127.0.0.1:8000/assets/HOME.jpg',
            'icon' => 'http://127.0.0.1:8000/assets/qjual_logo.png',
            'deksripsi' => '“Smart Dalam Berjualan & Membuat Transaksi Jadi Lebih Mudah”',
            'nm_link' => 'Learn More',
            'link' => 'http://propertiku.proyek.ti.polindra.ac.id/',
        ]);
    }
}
