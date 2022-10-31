<?php

namespace App\Models\Jasa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketJasa extends Model
{
    use HasFactory;

    protected $table = "paket_jasa";

    protected $guarded = [''];

    public function getKategoriJasa()
    {
        return $this->belongsTo("App\Models\Jasa\KategoriJasa", "kategori_jasa_id", "id");
    }

    public function getKategoriPaket()
    {
        return $this->belongsTo("App\Models\Jasa\KategoriPaket", "kategori_paket_id", "id");
    }
}
