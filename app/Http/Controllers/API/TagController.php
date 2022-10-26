<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::orderBy("created_at", "DESC")->paginate(6);

        if ($tag->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($tag as $d) {
                $data[] = [
                    "tag_slug" => $d->tag_slug,
                    "tag_nama" => $d->tag_nama
                ];
            }
        }
        return response()->json($data, 200);
    }
}
