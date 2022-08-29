<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

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
