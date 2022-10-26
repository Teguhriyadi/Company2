<?php

namespace App\Models\Pengaturan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebijakanPrivasi extends Model
{
    use HasFactory;

    protected $table = "kebijakan_privasi";

    protected $guarded = [''];
}
