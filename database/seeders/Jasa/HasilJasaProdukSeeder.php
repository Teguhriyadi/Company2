<?php

namespace Database\Seeders\Jasa;

use App\Models\Jasa\HasilJasaProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HasilJasaProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HasilJasaProduk::create([
            "hasil_gambar" => "https://images.unsplash.com/photo-1661963477410-77d3268524d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "produk_id" => 4
        ]);

        HasilJasaProduk::create([
            "hasil_gambar" => "https://images.unsplash.com/photo-1661963477410-77d3268524d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "produk_id" => 4
        ]);

        HasilJasaProduk::create([
            "hasil_gambar" => "https://images.unsplash.com/photo-1661963477410-77d3268524d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "produk_id" => 4
        ]);
    }
}
