<?php

namespace Database\Seeders;

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
            "profil_deskripsi" => "Era digital semakin berkembang, dengan kemajuan teknologi semua orang bisa mendapat informasi yang lebih cepat dan luas secara mudah. disini kami menyediakan jasa untuk videografi, fotografi, dan animasi. jasa yang kami tawarkan memiliki para ahli dalam bidangnya , serta hasil yang diperoleh memuaskan.",
            "profil_no_hp" => "085324237299",
            "profil_email" => "admin@gmail.com",
            "profil_alamat" => "Villa Intan 2 Blok i4 No.1",
            "profil_foto" => "https://images.unsplash.com/photo-1661637051124-15a46f74f30b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80",
        ]);
    }
}
