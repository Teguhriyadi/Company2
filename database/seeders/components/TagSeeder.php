<?php

namespace Database\Seeders\components;

use App\Models\Master\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            "tag_slug" => "app",
            "tag_nama" => "App"
        ]);

        Tag::create([
            "tag_slug" => "it",
            "tag_nama" => "IT"
        ]);

        Tag::create([
            "tag_slug" => "business",
            "tag_nama" => "Business"
        ]);

        Tag::create([
            "tag_slug" => "design",
            "tag_nama" => "design"
        ]);
    }
}
