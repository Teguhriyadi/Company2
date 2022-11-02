<?php

namespace Database\Seeders\transaksi;

use App\Models\Master\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            "kategori_id" => 1,
            "kategori_jasa_id" => 0,
            "produk_image" => "https://images.unsplash.com/photo-1661963477410-77d3268524d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "produk_judul" => "Lorem Ipsum",
            "produk_slug" => "lorem-ipsum",
            "produk_harga" => "50000",
            "produk_deskripsi_singkat" => "Lorem Ipsum Dolor Sit Amet",
            "produk_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        Produk::create([
            "kategori_id" => 1,
            "kategori_jasa_id" => 0,
            "produk_image" => "https://images.unsplash.com/photo-1661963477410-77d3268524d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "produk_judul" => "Lorem Ipsum 2",
            "produk_slug" => "lorem-ipsum-dua",
            "produk_harga" => "30000",
            "produk_deskripsi_singkat" => "Lorem Ipsum Dolor Sit Amet",
            "produk_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        Produk::create([
            "kategori_id" => 1,
            "kategori_jasa_id" => 0,
            "produk_image" => "https://images.unsplash.com/photo-1661963477410-77d3268524d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "produk_judul" => "Lorem Ipsum 3",
            "produk_slug" => "lorem-ipsum-tiga",
            "produk_harga" => "100000",
            "produk_deskripsi_singkat" => "Lorem Ipsum Dolor Sit Amet",
            "produk_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        Produk::create([
            "kategori_id" => 1,
            "kategori_jasa_id" => 0,
            "produk_judul" => "Paket Eksklusif",
            "produk_slug" => "paket-ekslusif",
            "produk_harga" => "50000",
            "produk_deskripsi_singkat" => "Lorem Ipsum Dolor Sit Amet",
            "produk_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        Produk::create([
            "kategori_id" => 1,
            "kategori_jasa_id" => 0,
            "produk_judul" => "Paket Medium",
            "produk_slug" => "paket-medium",
            "produk_harga" => "90000",
            "produk_deskripsi_singkat" => "Lorem Ipsum Dolor Sit Amet",
            "produk_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        Produk::create([
            "kategori_id" => 2,
            "kategori_jasa_id" => 0,
            "produk_judul" => "Platinum",
            "produk_slug" => "platinum",
            "produk_harga" => "500000",
            "produk_deskripsi_singkat" => "Lorem Ipsum Dolor Sit Amet",
            "produk_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        Produk::create([
            "kategori_id" => 2,
            "kategori_jasa_id" => 0,
            "produk_judul" => "Gold",
            "produk_slug" => "gold",
            "produk_harga" => "300000",
            "produk_deskripsi_singkat" => "Lorem Ipsum Dolor Sit Amet",
            "produk_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        Produk::create([
            "kategori_id" => 2,
            "kategori_jasa_id" => 0,
            "produk_judul" => "Silver",
            "produk_slug" => "silver",
            "produk_harga" => "100000",
            "produk_deskripsi_singkat" => "Lorem Ipsum Dolor Sit Amet",
            "produk_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        Produk::create([
            "kategori_id" => 2,
            "kategori_jasa_id" => 0,
            "produk_judul" => "bronze",
            "produk_slug" => "bronze",
            "produk_harga" => "50000",
            "produk_deskripsi_singkat" => "Lorem Ipsum Dolor Sit Amet",
            "produk_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);
    }
}
