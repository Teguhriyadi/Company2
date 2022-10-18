<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingOnline extends Model
{
    use HasFactory;

    protected $table = "booking_online";

    protected $guarded = [''];
}
