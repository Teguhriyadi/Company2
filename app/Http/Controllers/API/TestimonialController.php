<?php

namespace App\Http\Controllers\API;

use App\Models\Pengaturan\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial = Testimonial::orderBy("created_at", "DESC")->get();

        if ($testimonial->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($testimonial as $d) {
                $data[] = [
                    "testimonial_nama" => $d->testimonial_nama,
                    "testimonial_foto" => $d->testimonial_foto,
                    "testimonial_jobtitle" => $d->testimonial_jobtitle,
                    "testimonial_review" => $d->testimonial_review
                ];
            }
        }
        return response()->json($data, 200);
    }
}
