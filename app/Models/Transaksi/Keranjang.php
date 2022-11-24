<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = "keranjang";

    protected $guarded = [''];

    public function getUser()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

    public function getOrders()
    {
        return $this->belongsTo("App\Models\Payment\Order", "id", "order_id");
    }
}
