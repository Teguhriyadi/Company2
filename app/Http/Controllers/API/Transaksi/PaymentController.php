<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Transaksi\Keranjang;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($id_cart)
    {
        $cart = Keranjang::where("id", $id_cart)->first();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env("MIDTRANS_SERVER_KEY");
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'item_details' => array(
                [
                    "id" => "a1",
                    "price" => "10000",
                    "quantity" => 1,
                    "name" => "Apple"
                ],
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );
        $snapToken = [];

        $snapToken[] = [
            "snap_token" => \Midtrans\Snap::getSnapToken($params)
        ];

        return response()->json($snapToken, 200);
    }
}
