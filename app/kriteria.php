<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    public $timestamps = false;
    protected $table = "kriteria";
    protected $primaryKey = "kode_kriteria"; 
    protected $guarded = [];

    public function detail(){
        return $this->hasMany('App\detkriteria','kode_kriteria','kode_kriteria');
    }
}