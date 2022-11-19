<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "kategori";

    protected $guarded = [''];

    public function getCount()
    {
        return $this->hasMany("App\Models\Master\Artikel", "kategori_id", "id");
    }
}
