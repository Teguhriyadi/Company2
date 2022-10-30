<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeToken extends Model
{
    use HasFactory;

    protected $table = "kode_token";

    protected $guarded = [''];
}
