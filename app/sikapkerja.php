<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sikapkerja extends Model
{
    public $timestamps = false;
    protected $table = "sikap_kerja";
    protected $primaryKey = "id_kerja";
    protected $guarded = [];
}
