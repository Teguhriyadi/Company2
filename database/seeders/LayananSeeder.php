<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Layanan::create([
            'icon' => 'http://127.0.0.1:8000/assets/sosmed-payment.png',
            // 'icon' => 'http://propertiku.proyek.ti.polindra.ac.id/storage/app/public/image/zQPHhwKW65ifu974wSpgvgxn9ZUav3CiJNAo7vwU.png',
            'nm_layanan' => 'Pembayaran Digital',
            'deskripsi' => 'Transaksi menggunakan berbagai macam metode pembayaran',
        ]);

        Layanan::create([
            'icon' => 'http://127.0.0.1:8000/assets/ipaymu_service_edcpos.png',
            // 'icon' => 'http://propertiku.proyek.ti.polindra.ac.id/storage/app/public/image/jxHFhCRj6pVinPsqYOANy6nR2p6h0OZBSWUIoID8.png',
            'nm_layanan' => 'EDC-POS',
            'deskripsi' => 'Transaksi lebih mudah dengan menggunakan terminal EDC POS',
        ]);

        Layanan::create([
            'icon' => 'http://127.0.0.1:8000/assets/ipaymu_service_store.png',
            // 'icon' => 'http://propertiku.proyek.ti.polindra.ac.id/storage/app/public/image/wDkEl2NpVNNZgcUVel9rCyzCR9AFcrJ7UsislNyD.png',
            'nm_layanan' => 'Convenience Stores',
            'deskripsi' => 'Sediakan pembayaran melalui Indomaret dan Alfamart pada bisnis Anda',
        ]);

        Layanan::create([
            'icon' => 'http://127.0.0.1:8000/assets/qrish.png',
            'icon' => 'http://propertiku.proyek.ti.polindra.ac.id/storage/app/public/image/HLtnTIsh6tfOJiS8PAkTTmHNZnZiJohYBjRP1cOT.png',
            'nm_layanan' => 'QRIS',
            'deskripsi' => '1 QRCode Untuk Semua e-wallet',
        ]);

        Layanan::create([
            'icon' => 'http://127.0.0.1:8000/assets/ipaymu_service_va.png',
            // 'icon' => 'http://propertiku.proyek.ti.polindra.ac.id/storage/app/public/image/rPNksMVIwVzqDvjOSYf0wjlh3zfq9LAobclmxwtf.png',
            'nm_layanan' => 'Instant VA',
            'deskripsi' => 'Pembayaran VA dan transfer bank lebih mudah untuk 140 Bank',
        ]);

        Layanan::create([
            'icon' => 'http://127.0.0.1:8000/assets/ipaymu_service_credit_card.png',
            // 'icon' => 'http://propertiku.proyek.ti.polindra.ac.id/storage/app/public/image/TPmGoQFzj0W9WbQi6qehztSaCfi1vWiYD9idYohT.png',
            'nm_layanan' => 'Kartu Kredit',
            'deskripsi' => 'Opsi pembayaran yang komprehensif kepada customer Anda.',
        ]);

    }
}
