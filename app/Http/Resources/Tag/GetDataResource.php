<?php

namespace App\Http\Resources\Tag;

use Illuminate\Http\Resources\Json\JsonResource;

class GetDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "tag_id" => $this->id,
            "tag_slug" => $this->tag_slug,
            "tag_nama" => $this->tag_nama
        ];
    }
}
