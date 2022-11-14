<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = "artikel";

    protected $guarded = [''];

    public function getKategori()
    {
        return $this->belongsTo("App\Models\Master\Kategori", "kategori_id", "id");
    }

    public function getUser()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

    public function getArtikelTag()
    {
        return $this->hasMany("App\Models\Master\ArtikelTag", "id_blog", "id");
    }
}
