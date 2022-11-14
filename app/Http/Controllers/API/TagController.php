<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tag\GetDataResource;
use App\Models\Master\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::orderBy("created_at", "DESC")->get();

        return GetDataResource::collection($tag);
    }
}
