<?php

namespace App\Http\Controllers\API\Master;

use App\Models\Master\BookingOnline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingOnlineController extends Controller
{
    public function index()
    {
        $booking = BookingOnline::orderBy("created_at", "DESC")->get();

        if ($booking->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($booking as $d) {
                $data[] = [
                    "booking_icon" => $d->booking_icon,
                    "booking_judul" => $d->booking_judul,
                    "booking_deskripsi" => $d->booking_deskripsi
                ];
            }
        }
        return response()->json($data, 200);
    }
}
