<?php

namespace App\Http\Resources\Transaksi\History;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class GetHistory extends JsonResource
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
            "history_nama" => $this->nama,
            "history_email" => $this->email,
            "history_harga" => "Rp. " . number_format($this->gross_amount),
            "history_lokasi" => $this->lokasi,
            "history_catatan" => $this->catatan,
            "history_waktu" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->isoFormat('dddd, D MMMM Y H:mm:s'),
            "tipe_pembayaran" => $this->payment_type,
            "status" => $this->status
        ];
    }
}
