<?php

namespace App\Imports;

use App\instruktur;
use Maatwebsite\Excel\Concerns\ToModel;

class instrukturImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tgl = strtotime($row[5]);
        $tgl_lahir = date('Y-m-d',$tgl);
        return new instruktur([
            "id_instruktur" => $row[0],
            "Nama" => $row[1],
            "P_Formal" => $row[2],
            "P_Informal" => $row[3],
            "S_1" => $tgl_lahir,
            "S_2" => $row[5],
            "S_3" => $row[6],
            "Diklat_1" => $row[7],
            "Diklat_2" => $row[8],
        ]);
    } 
}
