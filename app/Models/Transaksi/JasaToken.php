<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaToken extends Model
{
    use HasFactory;

    protected $table = "jasa_token";

    protected $guarded = [''];
}
