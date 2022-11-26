<?php

namespace App\Imports;

use App\inventory;
use Maatwebsite\Excel\Concerns\ToModel;

class inventoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new inventory([
            "no_inv" => $row[0],
            "nama_barang" => $row[1],
            "unit" => $row[2],
            "jumlah_unit" => $row[3],
            "keterangan" => $row[4],
            "gambar" => $row[5],
            "pemakaian" => $row[6],
        ]);
    }
}
