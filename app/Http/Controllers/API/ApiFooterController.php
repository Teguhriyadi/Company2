<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Controllers\Request;
use App\Models\Master\Footer;

class ApiFooterController extends Controller
{
    public function index()
    {
        $footer = Footer::all();
        if (empty($footer)) {
            return response()->json([["message" => "Data Kosong"]]);
        } else {
            return response()->json(['message' => 'Success', 'footer' => $footer, 'code' => 200]);
        }
    }

}
