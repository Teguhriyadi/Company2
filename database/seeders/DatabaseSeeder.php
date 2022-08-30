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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(ContactSeeder::class);
        // $this->call(FooterSeeder::class);
        // $this->call(LayananSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(TentangKamiSeeder::class);
        $this->call(ProfilPerusahaanSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(PartnerSeeder::class);
    }
}
