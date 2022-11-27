<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Payment\Order;
use App\Models\Transaksi\Keranjang;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($id_cart)
    {
        $cart = Keranjang::where("id", $id_cart)->first();

        $first_name = $cart->getUser->first_name;
        $last_name = $cart->getUser->last_name;
        $email = $cart->getUser->email;
        $nomor_hp = $cart->nomor_hp;
        $harga = $cart->harga;

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
                'gross_amount' => $harga,
            ),
            'customer_details' => array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $nomor_hp,
            ),
        );

        $snapToken = [];

        $snapToken[] = [
            "snap_token" => \Midtrans\Snap::getSnapToken($params)
        ];

        return response()->json($snapToken, 200);
    }

    public function store(Request $request)
    {
        $json = json_decode($request->get('json'));

        $order = new Order();

        $order["status"] = $json->transaction_status;
        $order["transaction_id"] = $json->transaction_id;
        $order["order_id"] = $json->order_id;
        $order["gross_amount"] = $json->gross_amount;
        $order["payment_type"] = $json->payment_type;
        $order["payment_code"] = isset($json->payment_code) ? $json->payment_code : null;
        $order["pdf_url"] = isset($json->pdf_url) ? $json->pdf_url : null;
        $order->save();

        return response()->json([
            "success" => true,
            "message" => "Berhasil Di Proses"
        ], 200);
    }
}
