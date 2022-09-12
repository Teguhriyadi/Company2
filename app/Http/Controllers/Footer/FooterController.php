<?php

namespace App\Http\Controllers\Footer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Footer;



class FooterController extends Controller
{
    public function index()
    {
        $data = [
            "footer" => Footer::get()
        ];

        return view("pages.admin.footer.index", $data);

    }
}
