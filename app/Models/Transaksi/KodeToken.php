<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeToken extends Model
{
    use HasFactory;

    protected $table = "kode_token";

    protected $guarded = [''];

    public function getUser()
    {
        return $this->belongsTo("App\Models\User", "created_by", "id");
    }

    public function getJasa()
    {
        return $this->belongsTo("App\Models\Jasa\KategoriJasa", "jasa_id", "id");
    }
}
