<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Portfolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        $portfolio = Portfolio::orderBy("created_at", "DESC")->get();

        if ($portfolio->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($portfolio as $d) {
                $data[] = [
                    "portofolio_url" => $d->portofolio_url,
                    "portofolio_nama" => $d->portofolio_nama,
                    "portofolio_deskripsi" => $d->portofolio_deskripsi,
                    "kategori_jasa_id" => $d->kategori_jasa_id
                ];
            }
        }
        return response()->json($data, 200);
    }
}
