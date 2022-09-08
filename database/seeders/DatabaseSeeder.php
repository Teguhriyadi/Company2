<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServiceSeeder::class);
        $this->call(TentangKamiSeeder::class);
        $this->call(ProfilPerusahaanSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(WorkSeeder::class);
        $this->call(KategoriSeeder::class);
    }
}
