<?php

namespace App\Models\Jasa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPaket extends Model
{
    use HasFactory;

    protected $table = "kategori_paket";

    protected $guarded = [''];
}
