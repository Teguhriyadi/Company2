<?php

namespace App\Models\Jasa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilJasaProduk extends Model
{
    use HasFactory;

    protected $table = "hasil_jasa_produk";

    protected $guarded = [''];
}
