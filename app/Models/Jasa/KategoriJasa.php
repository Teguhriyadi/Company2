<?php

namespace App\Models\Jasa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriJasa extends Model
{
    use HasFactory;

    protected $table = "kategori_jasa";

    protected $guarded = [''];
}
