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
            "testimonial_foto" => "http://127.0.0.1:2909/gambar/gambar_user.png",
            "testimonial_jobtitle" => "Freelance",
            "testimonial_review" => "Hasil yang sangat memuaskan sesuai dengan keinginan pelanggan kami"
        ]);

        Testimonial::create([
            "testimonial_nama" => "Ahmad Fauzi",
            "testimonial_foto" => "http://127.0.0.1:2909/gambar/gambar_user.png",
            "testimonial_jobtitle" => "Programmer",
            "testimonial_review" => "Membantu dalam melakukan problem solving yang saya hadapi"
        ]);

        Testimonial::create([
            "testimonial_nama" => "Ahmad Hamdan",
            "testimonial_foto" => "http://127.0.0.1:2909/gambar/gambar_user.png",
            "testimonial_jobtitle" => "Freelance",
            "testimonial_review" => "Output yang diberikan cukup baik"
        ]);

        Testimonial::create([
            "testimonial_nama" => "Rizki Fauzan",
            "testimonial_foto" => "http://127.0.0.1:2909/gambar/gambar_user.png",
            "testimonial_jobtitle" => "IT Support",
            "testimonial_review" => "Penjelasan yang Singkat dan padat serta mudah dipahami"
        ]);
    }
}
