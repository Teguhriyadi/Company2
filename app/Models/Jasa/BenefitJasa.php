<?php

namespace App\Models\Jasa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitJasa extends Model
{
    use HasFactory;

    protected $table = "benefit_jasa";

    protected $guarded = [''];

    public function getProduk()
    {
        return $this->belongsTo("App\Models\Master\Produk", "produk_id", "id");
    }
}
