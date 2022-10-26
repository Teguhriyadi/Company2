<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama" => "Mohammad Ilham",
            "email" => "mohammad@gmail.com",
            "password" => bcrypt("password"),
            "id_role" => 1,
            "created_by" => 0,
            "foto" => "https://images.unsplash.com/photo-1659535828770-6d9e1915b5dc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxzZWFyY2h8MTV8fHBlb3BsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60",
            "status" => 1
        ]);

        User::create([
            "first_name" => "Ahmad",
            "last_name" => "Fauzi",
            "nama" => "Ahmad Fauzi",
            "email" => "fauzi@gmail.com",
            "password" => bcrypt("password"),
            "id_role" => 2,
            "created_by" => 0,
            "foto" => "https://images.unsplash.com/photo-1659535828770-6d9e1915b5dc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxzZWFyY2h8MTV8fHBlb3BsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60",
            "status" => 1
        ]);
    }
}
