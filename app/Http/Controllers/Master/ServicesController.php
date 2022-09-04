<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $data = [
            "data_services" => Services::get()
        ];

        return view("pages.admin.master.services.index", $data);
    }

    public function store(Request $request)
    {
        Services::create($request->all());

        return back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Services::where("id", $request->id)->first()
        ];

        return view("pages.admin.master.services.edit", $data);
    }

    public function update(Request $request)
    {
        Services::where("id", $request->id)->update([
            "services_icon" => $request->services_icon,
            "services_title" => $request->services_title,
            "services_deskripsi" => $request->services_deskripsi
        ]);

        return back();
    }
}
