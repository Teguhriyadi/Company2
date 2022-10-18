<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $carousel = Carousel::orderBy("created_at", "DESC")->paginate(3);

        if ($carousel->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($carousel as $d) {
                $data[] = [
                    "carousel_judul" => $d->carousel_judul,
                    "carousel_deskripsi" => $d->carousel_deskripsi,
                    "carousel_gambar" => $d->carousel_gambar
                ];
            }
        }
        return response()->json($data, 200);
    }
}
