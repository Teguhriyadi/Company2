<?php

namespace Database\Seeders;

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
            "produk_image" => "",
            "produk_judul" => "Lorem Ipsum",
            "produk_slug" => "lorem-ipsum",
            "produk_harga" => "50000",
            "produk_deskripsi_singkat" => "Lorem Ipsum Dolor Sit Amet",
            "produk_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        Produk::create([
            "kategori_id" => 1,
            "produk_image" => "",
            "produk_judul" => "Lorem Ipsum 2",
            "produk_slug" => "lorem-ipsum-dua",
            "produk_harga" => "30000",
            "produk_deskripsi_singkat" => "Lorem Ipsum Dolor Sit Amet",
            "produk_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        Produk::create([
            "kategori_id" => 1,
            "produk_image" => "",
            "produk_judul" => "Lorem Ipsum 3",
            "produk_slug" => "lorem-ipsum-tiga",
            "produk_harga" => "100000",
            "produk_deskripsi_singkat" => "Lorem Ipsum Dolor Sit Amet",
            "produk_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);
    }
}
