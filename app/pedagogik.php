<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedagogik extends Model
{
    public $timestamps = false;
    protected $table = "pedagogik";
    protected $primaryKey = "id_pedagogik"; 
    protected $guarded = [];
}
