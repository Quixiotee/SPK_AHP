<?php

namespace App\Exports;

use App\pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;

class pegawaiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return pegawai::all(); 
    }
}
