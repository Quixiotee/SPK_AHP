<?php

namespace App\Exports;

use App\inventory;
use Maatwebsite\Excel\Concerns\FromCollection;

class inventoryExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return inventory::all();
    }
}
