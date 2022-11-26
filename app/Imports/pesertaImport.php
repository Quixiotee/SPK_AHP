<?php

namespace App\Imports;

use App\peserta;
use Maatwebsite\Excel\Concerns\ToModel;

class pesertaImport implements ToModel
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
        return new peserta([
            "id_peserta" => $row[0],
            "username" => $row[1],
            "password" => $row[2],
            "nama_peserta" => $row[3],
            "jenis_training" => $row[4],
            "tanggal_lahir" => $tgl_lahir,
            "tempat_lahir" => $row[6],
            "alamat" => $row[7],
            "telpon_rumah" => $row[8],
            "telpon_mobile" => $row[9],
            "nomer_blanko" => $row[10],
            "nomer_sertifikat" => $row[11],
            "status" => $row[12],
        ]);
    } 
}
