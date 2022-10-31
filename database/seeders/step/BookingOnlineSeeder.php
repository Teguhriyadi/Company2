<?php

namespace Database\Seeders\step;

use App\Models\Master\BookingOnline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingOnlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookingOnline::create([
            "booking_icon" => "fa fa-user",
            "booking_judul" => "Murah",
            "booking_deskripsi" => "Lorem Ipsum Dolor Sit Amet"
        ]);

        BookingOnline::create([
            "booking_icon" => "fa fa-book",
            "booking_judul" => "Hemat",
            "booking_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);

        BookingOnline::create([
            "booking_icon" => "fa fa-tag",
            "booking_judul" => "Terjangkau",
            "booking_deskripsi" => "Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet Lorem Ipsum Dolor Sit Amet"
        ]);
    }
}
