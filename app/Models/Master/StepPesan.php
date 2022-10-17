<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepPesan extends Model
{
    use HasFactory;

    protected $table = "step_pesan";

    protected $guarded = [''];
}
