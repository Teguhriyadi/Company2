<?php

namespace App\Http\Controllers\Web\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Master\ChooseUs;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    public function index()
    {
        $data["why_us"] = ChooseUs::first();

        return view("pages.admin.pengaturan.why_us.index", $data);
    }

    public function store(Request $request)
    {
        ChooseUs::create($request->all());

        return back();
    }

    public function upload_gambar(Request $request)
    {
        if ($request->hasFile("upload"))
        {
            $originName = $request->file("upload")->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file("upload")->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file("upload")->move(public_path("gambar_ckeditor"), $fileName);

            $url = asset("gambar_ckeditor/" . $fileName);

            return response()->json(["fileName" => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
