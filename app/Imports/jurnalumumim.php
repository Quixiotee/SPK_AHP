<?php

namespace App\Imports;

use App\jurnalUm;
use Maatwebsite\Excel\Concerns\ToModel;

class jurnalumumim implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new jurnalUm([
            "id" => $row[0],
            "ref" => $row[1],
            "keterangan" => $row[2],
            "tanggal" => $row[3],
            "debet" => $row[4],
            "kredit" => $row[5],
            "update_by" => $row[6],
        ]);

    }
}
