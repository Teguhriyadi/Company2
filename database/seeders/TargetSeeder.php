<?php

namespace Database\Seeders;

use App\Models\Pengaturan\Target;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Target::create([
            "visi" => "Lorem Ipsum Dolor Sit Amet Visi",
            "misi" => "Lorem Ipsum Dolor Sit Amet Misi",
            "goal" => "Lorem Ipsum Dolor SIt Amet Goal"
        ]);
    }
}
