<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Payment\Order;
use App\Models\Transaksi\Keranjang;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function counting($id)
    {
        $count = Order::where("user_id", $id)->count();

        return response()->json([
            "message" => true,
            "jumlah" => $count
        ]);
    }
}
