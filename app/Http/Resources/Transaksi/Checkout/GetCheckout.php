<?php

namespace App\Http\Resources\Transaksi\Checkout;

use Illuminate\Http\Resources\Json\JsonResource;

class GetCheckout extends JsonResource
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
            "nama" => $this->nama,
            "email" => $this->email,
            "tanggal" => $this->tanggal,
            "harga" => number_format($this->harga),
            "nomor_hp" => $this->nomor_hp,
            "lokasi" => $this->lokasi,
            "catatan" => $this->catatan,
            "user_id" => $this->getUser
        ];
        return parent::toArray($request);
    }
}
