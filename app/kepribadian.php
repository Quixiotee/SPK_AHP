<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kepribadian extends Model
{
    public $timestamps = false;
    protected $table = "kepribadian";
    protected $primaryKey = "id_kepribadian"; 
    protected $guarded = [];
}
