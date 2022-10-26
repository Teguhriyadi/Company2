<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelTag extends Model
{
    use HasFactory;

    protected $table = "artikel_tag";

    protected $guarded = [''];

    public function getTag()
    {
        return $this->belongsTo("App\Models\Master\Tag", "id_tag", "id");
    }
}
