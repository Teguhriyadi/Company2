<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\Carousel1;

class ApiCarouselController extends Controller
{
    public function index()
    {
        $carousel = Carousel1::all();
        if (empty($carousel)) {
            return response()->json(["message" => "Data Kosong"]);
        } else {
            return response()->json(['message' => 'Success', 'carousel' => $carousel, 'code' => 200]);
        }
    }
}
