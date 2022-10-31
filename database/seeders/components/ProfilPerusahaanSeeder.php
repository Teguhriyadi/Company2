<?php

namespace Database\Seeders\components;

use App\Models\Pengaturan\ProfilPerusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilPerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfilPerusahaan::create([
            "profil_nama" => "DuoBintang",
            "profil_singkat" => "Murah , Aman dan Terpercaya",
            "profil_deskripsi" => "Lorem ipsum dolor sit amet Lorem Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet Lorem Ipsum Dolor Sit Amet Lorem ipsum dolor sit amet Lorem Ipsum Dolor Sit Amet",
            "profil_no_hp" => "085324237299",
            "profil_email" => "admin@gmail.com",
            "profil_alamat" => "Villa Intan 2 Blok i4 No.1",
            "profil_foto" => "https://images.unsplash.com/photo-1661637051124-15a46f74f30b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
        ]);
    }
}
