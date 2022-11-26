<?php

namespace App\Imports;

use App\pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class pegawaiImport implements ToModel
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
        return new pegawai([
            "id_pegawai" => $row[0],
            "nama_pegawai" => $row[1],
            "alamat_pegawai" => $row[2],
            "no_telpon_pegawai" => $row[3],
            "tgl_lahir_pegawai" => $tgl_lahir,
            "tempat_lahir_pegawai" => $row[5],
            "divisi" => $row[6],
            "jabatan" => $row[7],
        ]);
    } 
}
