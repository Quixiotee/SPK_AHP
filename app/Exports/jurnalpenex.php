<?php

namespace App\Exports;

use App\jurnalPen;
use Maatwebsite\Excel\Concerns\FromCollection;

class jurnalpenex implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return jurnalPen::all(); 
    }
}
