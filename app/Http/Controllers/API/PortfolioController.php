<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = Portfolio::orderBy("created_at", "DESC")->paginate(4);

        if ($portfolio->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($portfolio as $d) {
                $data[] = [
                    "portfolio_foto" => $d->portfolio_foto,
                    "portfolio_nama" => $d->portfolio_nama,
                    "portfolio_deskripsi" => $d->portfolio_deskripsi,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
