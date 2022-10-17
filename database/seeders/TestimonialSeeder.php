<?php

namespace Database\Seeders;

use App\Models\Pengaturan\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::create([
            "testimonial_nama" => "Mohammad Ilham",
            "testimonial_foto" => "",
            "testimonial_jobtitle" => "Freelance",
            "testimonial_review" => "Lorem Ipsum Dolor Sit Amet"
        ]);

        Testimonial::create([
            "testimonial_nama" => "Ahmad Fauzi",
            "testimonial_foto" => "",
            "testimonial_jobtitle" => "Programmer",
            "testimonial_review" => "Lorem Ipsum Dolor Sit Amet"
        ]);

        Testimonial::create([
            "testimonial_nama" => "Ahmad Hamdan",
            "testimonial_foto" => "",
            "testimonial_jobtitle" => "Freelance",
            "testimonial_review" => "Lorem Ipsum Dolor Sit Amet"
        ]);

        Testimonial::create([
            "testimonial_nama" => "Rizki Fauzan",
            "testimonial_foto" => "",
            "testimonial_jobtitle" => "IT Support",
            "testimonial_review" => "Lorem Ipsum Dolor Sit Amet"
        ]);
    }
}
