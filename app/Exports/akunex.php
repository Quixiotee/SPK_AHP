<?php

namespace App\Exports;

use App\akunM;
use Maatwebsite\Excel\Concerns\FromCollection;

class akunex implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return akunM::all(); 
    }
}
