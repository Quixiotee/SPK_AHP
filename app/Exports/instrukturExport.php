<?php

namespace App\Exports;

use App\instruktur;
use Maatwebsite\Excel\Concerns\FromCollection;

class instrukturExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return instruktur::all(); 
    }
}
