<?php

namespace App\Http\Controllers;

use App\Models\Payment\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
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

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view("pages.admin.pengaturan.payment.index", ['snap_token' => $snapToken]);
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

        return $order->save() ? redirect(url("/payment")) : redirect(url("/payment"));
    }
}
