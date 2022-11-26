<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    //
    public $timestamps = false;
    protected $table = "skill";
    protected $primaryKey = "id_skill";
    protected $guarded = [];
}
