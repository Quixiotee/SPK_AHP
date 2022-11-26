<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sosial extends Model
{
    public $timestamps = false;
    protected $table = "sosial";
    protected $primaryKey = "id_sosial";
    protected $guarded = [];
}
