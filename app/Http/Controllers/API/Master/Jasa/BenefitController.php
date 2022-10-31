<?php

namespace App\Http\Controllers\API\Master\Jasa;

use App\Http\Controllers\Controller;
use App\Models\Jasa\BenefitJasa;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function index()
    {
        $benefit = BenefitJasa::orderBy("created_at", "DESC")->get();

        if ($benefit->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($benefit as $d) {
                $data[] = [
                    "benefit_nama" => $d->benefit_nama,
                    "benefit_produk_id" => $d->getProduk->id
                ];
            }
        }
        return response()->json($data, 200);
    }

    public function detail($produk_id)
    {
        $benefit = BenefitJasa::where("produk_id", $produk_id)->orderBy("created_at", "DESC")->get();

        if ($benefit->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($benefit as $d) {
                $data[] = [
                    "benefit_nama" => $d->benefit_nama,
                ];
            }
        }
        return response()->json($data, 200);
    }
}
