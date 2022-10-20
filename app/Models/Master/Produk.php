<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = "produk";

    protected $guarded = [''];

    public function getKategori()
    {
        return $this->belongsTo("App\Models\Master\Kategori", "kategori_id", "id");
    }
}
