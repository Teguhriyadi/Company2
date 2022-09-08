<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::orderBy("created_at", "DESC")->paginate(4);

        if ($services->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($services as $d) {
                $data[] = [
                    "services_icon" => $d->services_icon,
                    "services_title" => $d->services_title,
                    "services_deskripsi" => $d->services_deskripsi
                ];
            }
        }
        return response()->json($data, 200);
    }
}
