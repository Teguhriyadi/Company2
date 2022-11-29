<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaksi\History\GetHistory;
use App\Models\Payment\Order;

class HistoryPemesananController extends Controller
{
    public function index($user_id)
    {
        $history = Order::where("user_id", $user_id)->orderBy("created_at", "DESC")->paginate(3);

        return GetHistory::collection($history);
    }
}
