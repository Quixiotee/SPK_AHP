<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    public $timestamps = false;
    protected $table = "absensi";
    protected $primaryKey = "id_absen";
    protected $guarded = [];
}
