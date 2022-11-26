<?php

namespace App\Imports;

use App\akunM;
use Maatwebsite\Excel\Concerns\ToModel;

class akunim implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new akunM([
            "ref" => $row[0],
            "nama_akun" => $row[1],
            "update_by" => $row[2],
        ]);
    }
}
