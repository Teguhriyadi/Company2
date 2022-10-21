<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;

    protected $table = "jasa";

    protected $guarded = [''];

    public function getKategori()
    {
        return $this->belongsTo("App\Models\Master\Kategori", "id_kategori", "id");
    }
}
