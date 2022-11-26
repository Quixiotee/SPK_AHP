<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profesional extends Model
{
    public $timestamps = false;
    protected $table = "profesional";
    protected $primaryKey = "id_profesional";
    protected $guarded = [];
}
