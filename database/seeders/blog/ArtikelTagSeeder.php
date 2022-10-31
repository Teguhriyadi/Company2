<?php

namespace Database\Seeders\blog;

use App\Models\Master\ArtikelTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArtikelTag::create([
            "id_blog" => 1,
            "id_tag" => 1,
        ]);

        ArtikelTag::create([
            "id_blog" => 1,
            "id_tag" => 2,
        ]);

        ArtikelTag::create([
            "id_blog" => 1,
            "id_tag" => 3,
        ]);
    }
}
