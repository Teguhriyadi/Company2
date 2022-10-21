<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partner = Partner::orderBy("created_at", "DESC")->paginate(4);

        if ($partner->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($partner as $d) {
                $data[] = [
                    "partner_nama" => $d->partner_nama,
                    "partner_logo" => $d->partner_logo
                ];
            }
        }
        return response()->json($data, 200);
    }
}
