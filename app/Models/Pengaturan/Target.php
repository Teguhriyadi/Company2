<?php

namespace App\Models\Pengaturan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $table = "target";

    protected $guarded = [''];
}
