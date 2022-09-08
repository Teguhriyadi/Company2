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
            "portfolio_foto" => "https://images.unsplash.com/photo-1661963477410-77d3268524d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "portfolio_nama" => "App 1",
            "id_kategori" => 1,
            "id_client" => 1,
            "portfolio_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        Portfolio::create([
            "portfolio_foto" => "https://images.unsplash.com/photo-1661963477410-77d3268524d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "portfolio_nama" => "App 1",
            "id_kategori" => 1,
            "id_client" => 1,
            "portfolio_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        Portfolio::create([
            "portfolio_foto" => "https://images.unsplash.com/photo-1661963477410-77d3268524d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
            "portfolio_nama" => "App 1",
            "id_kategori" => 1,
            "id_client" => 1,
            "portfolio_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);
    }
}
