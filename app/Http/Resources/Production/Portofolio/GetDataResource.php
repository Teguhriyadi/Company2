<?php

namespace App\Http\Resources\Production\Portofolio;

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
            "portofolio_url" => $this->portofolio_url,
            "portofolio_nama" => $this->portofolio_nama,
            "portofolio_deskripsi" => $this->portofolio_deskripsi,
            "kategori" => $this->getKategoriJasa
        ];
    }
}
