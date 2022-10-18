<?php

namespace Database\Seeders;

use App\Models\Pengaturan\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            "team_nama" => "Mohammad Ilham",
            "team_jabatan" => "Training",
            "team_foto" => "http://127.0.0.1:1234/gambar/upload-gambar.jpg",
            "team_status" => 1
        ]);

        Team::create([
            "team_nama" => "Ahmad Fauzi",
            "team_jabatan" => "Training",
            "team_foto" => "http://127.0.0.1:1234/gambar/upload-gambar.jpg",
            "team_status" => 1
        ]);

        Team::create([
            "team_nama" => "Attarva",
            "team_jabatan" => "Training",
            "team_foto" => "http://127.0.0.1:1234/gambar/upload-gambar.jpg",
            "team_status" => 1
        ]);
    }
}
