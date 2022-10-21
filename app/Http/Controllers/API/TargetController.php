<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function index()
    {
        $profil = Target::first();

        if (empty($profil)) {
            return response()->json([["message" => "Data Tidak Ada"]]);
        } else {
            return response()->json([$profil], 200);
        }
    }
}
