<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $data = [
            "data_pesan" => Pesan::get()
        ];

        return view("pages.admin.pengaturan.pesan.index", $data);
    }
}
