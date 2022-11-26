<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kerjasama extends Model
{
    public $timestamps = false;
    protected $table = "kerjasama";
    protected $primaryKey = "id_kerjasama"; 
    protected $guarded = [];
}
