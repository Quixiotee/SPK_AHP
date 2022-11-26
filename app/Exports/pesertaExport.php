<?php

namespace App\Exports;

use App\peserta;
use Maatwebsite\Excel\Concerns\FromCollection;

class pesertaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return peserta::all(); 
    }
}
