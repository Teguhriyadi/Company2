<?php

namespace App\Http\Resources\Artikel;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class GetAllArtikel extends JsonResource
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
            "artikel_judul" => $this->judul,
            "artikel_slug" => $this->slug,
            "artikel_gambar" => $this->foto,
            "kategori" => $this->getKategori,
            "dibuat_oleh" => $this->getUser,
            "launching" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->isoFormat('D MMMM Y')
        ];
    }
}
