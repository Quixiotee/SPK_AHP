<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    public $timestamps = false;
    protected $table = "guru";
    protected $primaryKey = "nip";
    protected $guarded = [];
}
