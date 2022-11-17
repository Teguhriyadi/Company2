<?php

namespace App\Http\Resources\Master\KategoriJasa;

use Illuminate\Http\Resources\Json\JsonResource;

class GetDetailJasa extends JsonResource
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
            "jasa_id" => $this->id,
            "jasa_slug" => $this->kategori_jasa_slug,
            "jasa_nama" => $this->kategori_jasa_nama
        ];
    }
}
