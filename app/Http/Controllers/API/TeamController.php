<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::orderBy("created_at", "DESC")->paginate(6);

        if ($team->count() < 1) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];
            foreach ($team as $d) {
                $data[] = [
                    "team_nama" => $d->team_nama,
                    "team_jabatan" => $d->team_jabatan,
                    "team_foto" => $d->team_foto,
                    "team_status" => $d->team_status
                ];
            }
        }
        return response()->json($data, 200);
    }
}
