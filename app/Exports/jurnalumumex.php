<?php

namespace App\Exports;

use App\jurnalUm;
use Maatwebsite\Excel\Concerns\FromCollection;

class jurnalumumex implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return jurnalUm::all(); 
    }
}
