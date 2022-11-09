<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = "portofolio";

    protected $guarded = [''];

    public function getKategoriJasa()
    {
        return $this->belongsTo("App\Models\Jasa\KategoriJasa", "kategori_jasa_id", "id");
    }
}
