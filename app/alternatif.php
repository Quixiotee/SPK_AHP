<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alternatif extends Model
{
    public $timestamps = false;
    protected $table = "alternatif";
    protected $primaryKey = "id_alternatif";
    protected $guarded = [];
}
