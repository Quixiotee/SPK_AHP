<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detkriteria extends Model
{
    public $timestamps = false;
    protected $table = "detail_kriteria";
    protected $primaryKey = "kode_detail";
    protected $keyType = "string";

    public function kriteria(){
        return $this->belongsTo('App\kriteria','kode_kriteria','kode_kriteria');
    }
}
