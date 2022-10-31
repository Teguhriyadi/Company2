<?php

namespace App\Models\Jasa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukPaket extends Model
{
    use HasFactory;

    protected $table = "produk_paket";

    protected $guarded = [''];

    public function getProdukPaket()
    {
        return $this->belongsTo("App\Models\Jasa\PaketJasa", "paket_jasa_id", "id");
    }

    public function getProduk()
    {
        return $this->belongsTo("App\Models\Master\Produk", "produk_id", "id");
    }
}
