<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Transaksi\Keranjang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoryPemesananController extends Controller
{
    public function index($user_id)
    {
        $history = Keranjang::where("user_id", $user_id)->get();

        if ($history->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($history as $d) {
                $data[] = [
                    "history_nama" => $d->nama,
                    "history_harga" => "Rp. " . number_format($d->harga),
                    "history_lokasi" => $d->lokasi,
                    "history_catatan" => $d->catatan,
                    "history_waktu" => Carbon::createFromFormat('Y-m-d H:i:s', $d->created_at)->isoFormat('dddd, D MMMM Y H:mm:s')
                ];
            }
        }
        return response()->json($data, 200);
    }
}
