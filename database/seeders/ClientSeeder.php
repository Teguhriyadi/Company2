<?php

namespace Database\Seeders;

use App\Models\Master\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            "client_nama" => "PT. Mahasiswa",
            "client_logo" => "https://images.unsplash.com/photo-1657214059493-986710bc4788?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxzZWFyY2h8OHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60",
            "client_status" => 1
        ]);
    }
}
