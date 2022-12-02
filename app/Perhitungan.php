<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\kriteria;

class Perhitungan extends Model
{

    public function getAll($periode)
    {
        $prioritas = [];

        $nama_prioritas = [];

        $perbandingan = [];

        $pembagian_perbandingan = [];

        // $periode = date('Y');

        $alternatif = alternatif::where('periode', $periode)->get();

        $kriteria = kriteria::all();
        foreach ($kriteria as $isi_kri) {
            array_push($prioritas, $isi_kri->bobot);
            array_push($nama_prioritas, $isi_kri->nama_kriteria);
        }

        for ($i = 0; $i < count($kriteria); $i++) {
            for ($j = 0; $j < count($kriteria); $j++) {
                $perbandingan[$i][$j] = round($prioritas[$i] / $prioritas[$j], 2);
            }
        }
        for ($i = 0; $i < count($perbandingan); $i++) {
            $hasil_banding = 0;
            for ($j = 0; $j < count($perbandingan); $j++) {
                $hasil_banding = $hasil_banding + $perbandingan[$j][$i];
            }
            $penjumlahan_perbandingan[0][$i] = $hasil_banding;
        }

        for ($i = 0; $i < count($perbandingan); $i++) {
            for ($j = 0; $j < count($perbandingan); $j++) {
                $pembagian_perbandingan[$i][$j] = round($perbandingan[$i][$j] / $penjumlahan_perbandingan[0][$j], 2);
            }
        }

        for ($i = 0; $i < count($pembagian_perbandingan); $i++) {
            $hasil = 0;
            for ($j = 0; $j < count($pembagian_perbandingan); $j++) {
                $hasil = $hasil + $pembagian_perbandingan[$i][$j];
            }
            $hasil = $hasil / count($pembagian_perbandingan);
            $rata_rata_kriteria[$i][0] = round($hasil, 2);
        }


        // perhitungan absen

        $arry_alter = [];
        $absen = [];
        $fixabsen = 0;
        //<-----------------absensi------------------>//
        foreach ($alternatif as $idxalter) {
            if ($idxalter->absensi > 7) {
                $fixabsen = 1;
            } elseif ($idxalter->absensi == 7) {
                $fixabsen = 2;
            } elseif ($idxalter->absensi == 5) {
                $fixabsen = 3;
            } elseif ($idxalter->absensi == 6) {
                $fixabsen = 3;
            } elseif ($idxalter->absensi == 3) {
                $fixabsen = 4;
            } elseif ($idxalter->absensi == 4) {
                $fixabsen = 4;
            } elseif ($idxalter->absensi == 2) {
                $fixabsen = 5;
            } elseif ($idxalter->absensi == 1) {
                $fixabsen = 5;
            } elseif ($idxalter->absensi == 0) {
                $fixabsen = 6;
            }

            array_push($arry_alter, ['absen' => $fixabsen, 'nama_guru' => $idxalter->nama_guru]);
            array_push($absen, [$fixabsen]);
        }

        $perbandingan_absen = array();
        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $perbandingan_absen[$i][$j] = round($absen[$i][0] / $absen[$j][0], 2);
            }
        }

        $penjumlahan_perbandingan = [];
        for ($i = 0; $i < count($alternatif); $i++) {
            $hasil_banding = 0;
            for ($j = 0; $j < count($alternatif); $j++) {
                $hasil_banding = $hasil_banding + $perbandingan_absen[$j][$i];
            }
            $penjumlahan_perbandingan[0][$i] = $hasil_banding;
        }

        $pembagian_perbandingan = [];
        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $pembagian_perbandingan[$i][$j] =
                    round($perbandingan_absen[$i][$j] / $penjumlahan_perbandingan[0][$j], 2);
            }
        }

        $rata_rata_absen = [];
        for ($i = 0; $i < count($pembagian_perbandingan); $i++) {
            $hasil = array_sum($pembagian_perbandingan[$i]);
            $hasil = $hasil / count($pembagian_perbandingan);
            $rata_rata_absen[$i][0] = round($hasil, 6);
        }



        // perhitungan kehadiran

        $arry_kehadiran = [];
        $kehadiran = [];
        $fixkehadiran = 0;
        //<-----------------kehadiran------------------>//
        foreach ($alternatif as $altrkehadiran) {
            if ($altrkehadiran->waktu_kehadiran > 7) {
                $fixkehadiran = 1;
            } elseif ($altrkehadiran->waktu_kehadiran == 7) {
                $fixkehadiran = 2;
            } elseif ($altrkehadiran->waktu_kehadiran == 5) {
                $fixkehadiran = 3;
            } elseif ($altrkehadiran->waktu_kehadiran == 6) {
                $fixkehadiran = 3;
            } elseif ($altrkehadiran->waktu_kehadiran == 3) {
                $fixkehadiran = 4;
            } elseif ($altrkehadiran->waktu_kehadiran == 4) {
                $fixkehadiran = 4;
            } elseif ($altrkehadiran->waktu_kehadiran == 2) {
                $fixkehadiran = 5;
            } elseif ($altrkehadiran->waktu_kehadiran == 1) {
                $fixkehadiran = 5;
            } elseif ($altrkehadiran->waktu_kehadiran == 0) {
                $fixkehadiran = 6;
            }
            array_push($arry_kehadiran, ['absen' => $fixkehadiran, 'nama_guru' => $altrkehadiran->nama_guru]);
            array_push($kehadiran, [$fixkehadiran]);
        }

        $perbandingan_kehadiran = array();
        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $perbandingan_kehadiran[$i][$j] = round($kehadiran[$i][0] / $kehadiran[$j][0], 3);
            }
        }

        $penjumlahan_perbandingan_kehadiran = [];
        for ($i = 0; $i < count($alternatif); $i++) {
            $hasil_banding_kehadiran = 0;
            for ($j = 0; $j < count($alternatif); $j++) {
                $hasil_banding_kehadiran = $hasil_banding_kehadiran + $perbandingan_kehadiran[$j][$i];
            }
            $penjumlahan_perbandingan_kehadiran[0][$i] = $hasil_banding_kehadiran;
        }

        $pembagian_perbandingan_kehadiran = [];
        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $pembagian_perbandingan_kehadiran[$i][$j] =
                    round($perbandingan_kehadiran[$i][$j] / $penjumlahan_perbandingan_kehadiran[0][$j], 3);
            }
        }

        $rata_rata_kriteria_kehadiran = [];
        for ($i = 0; $i < count($pembagian_perbandingan_kehadiran); $i++) {
            $hasil_kehadiran = array_sum($pembagian_perbandingan_kehadiran[$i]);

            $hasil_kehadiran = floatval($hasil_kehadiran) / count($pembagian_perbandingan_kehadiran);
            $rata_rata_kriteria_kehadiran[$i][0] = round($hasil_kehadiran, 3);
        }


        // perhitungan kerjasama
        $arry_kerjasama = [];
        $kerjasama = [];
        //<-----------------kerjasama------------------>//
        foreach ($alternatif as $altrkerjasama) {
            array_push($arry_kerjasama, ['kerjasama' => $altrkerjasama->kerjasama, 'nama_guru' => $altrkerjasama->nama_guru]);
            array_push($kerjasama, [$altrkerjasama->kerjasama]);
        }

        $perbandingan_kerjasama = array();
        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $perbandingan_kerjasama[$i][$j] = round($kerjasama[$i][0] / $kerjasama[$j][0], 3);
            }
        }

        $penjumlahan_perbandingan_kerjasama = [];
        for ($i = 0; $i < count($alternatif); $i++) {
            $hasil_banding_kerjasama = 0;
            for ($j = 0; $j < count($alternatif); $j++) {
                $hasil_banding_kerjasama = $hasil_banding_kerjasama + $perbandingan_kerjasama[$j][$i];
            }
            $penjumlahan_perbandingan_kerjasama[0][$i] = $hasil_banding_kerjasama;
        }

        $pembagian_perbandingan_kerjasama = [];
        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $pembagian_perbandingan_kerjasama[$i][$j] =
                    round($perbandingan_kerjasama[$i][$j] / $penjumlahan_perbandingan_kerjasama[0][$j], 3);
                // dd($perbandingan_kerjasama[1][4]);
            }
        }

        $rata_rata_kriteria_kerjasama = [];
        for ($i = 0; $i < count($pembagian_perbandingan_kerjasama); $i++) {

            $hasil_kerjasama = array_sum($pembagian_perbandingan_kerjasama[$i]);

            $hasil_kerjasama = $hasil_kerjasama / count($pembagian_perbandingan_kerjasama);
            $rata_rata_kriteria_kerjasama[$i][0] = round($hasil_kerjasama, 3);
        }


        // perhitungan sikap kerja

        $arry_sikapkerja = [];
        $sikapkerja = [];
        //<-----------------sikapkerja------------------>//
        foreach ($alternatif as $altrsikapkerja) {
            array_push($arry_sikapkerja, ['sikapkerja' => $altrsikapkerja->sikap_kerja, 'nama_guru' => $altrsikapkerja->nama_guru]);
            array_push($sikapkerja, [$altrsikapkerja->sikap_kerja]);
        }

        $perbandingan_sikapkerja = array();
        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $perbandingan_sikapkerja[$i][$j] = round($sikapkerja[$i][0] / $sikapkerja[$j][0], 3);
            }
        }

        $penjumlahan_perbandingan_sikapkerja = [];
        for ($i = 0; $i < count($alternatif); $i++) {
            $hasil_banding_sikapkerja = 0;
            for ($j = 0; $j < count($alternatif); $j++) {
                $hasil_banding_sikapkerja = $hasil_banding_sikapkerja + $perbandingan_sikapkerja[$j][$i];
            }
            $penjumlahan_perbandingan_sikapkerja[0][$i] = $hasil_banding_sikapkerja;
        }

        $pembagian_perbandingan_sikapkerja = [];
        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $pembagian_perbandingan_sikapkerja[$i][$j] =
                    round($perbandingan_sikapkerja[$i][$j] / $penjumlahan_perbandingan_sikapkerja[0][$j], 3);
            }
        }

        $rata_rata_kriteria_sikapkerja = [];
        for ($i = 0; $i < count($pembagian_perbandingan_sikapkerja); $i++) {

            $hasil_sikapkerja = array_sum($pembagian_perbandingan_sikapkerja[$i]);

            $hasil_sikapkerja = $hasil_sikapkerja / count($pembagian_perbandingan_sikapkerja);
            $rata_rata_kriteria_sikapkerja[$i][0] = round($hasil_sikapkerja, 3);
        }


        // perhitungan improve
        $arry_improve = [];
        $improve = [];
        $fixskill = 0;
        //<-----------------improve------------------>//
        foreach ($alternatif as $altimprove) {
            if ($altimprove->skill_improve > 7) {
                $fixskill = 6;
            } elseif ($altimprove->skill_improve == 7) {
                $fixskill = 5;
            } elseif ($altimprove->skill_improve == 5) {
                $fixskill = 5;
            } elseif ($altimprove->skill_improve == 6) {
                $fixskill = 4;
            } elseif ($altimprove->skill_improve == 3) {
                $fixskill = 4;
            } elseif ($altimprove->skill_improve == 4) {
                $fixskill = 3;
            } elseif ($altimprove->skill_improve == 2) {
                $fixskill = 3;
            } elseif ($altimprove->skill_improve == 1) {
                $fixskill = 2;
            } elseif ($altimprove->skill_improve == 0) {
                $fixskill = 1;
            }

            array_push($arry_improve, ['improve' => $fixskill, 'nama_guru' => $altimprove->nama_guru]);
            array_push($improve, [$fixskill]);
        }

        $perbandingan_improve = array();
        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $perbandingan_improve[$i][$j] = round($improve[$i][0] / $improve[$j][0]);
            }
        }

        $penjumlahan_perbandingan_improve = [];
        for ($i = 0; $i < count($alternatif); $i++) {
            $hasil_banding_improve = 0;
            for ($j = 0; $j < count($alternatif); $j++) {
                $hasil_banding_improve = $hasil_banding_improve + $perbandingan_improve[$j][$i];
            }
            $penjumlahan_perbandingan_improve[0][$i] = $hasil_banding_improve;
        }

        $pembagian_perbandingan_improve = [];
        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $pembagian_perbandingan_improve[$i][$j] =
                    round($perbandingan_improve[$i][$j] / $penjumlahan_perbandingan_improve[0][$j], 3);
            }
        }

        $rata_rata_kriteria_improve = [];
        for ($i = 0; $i < count($pembagian_perbandingan_improve); $i++) {

            $hasil_improve = array_sum($pembagian_perbandingan_improve[$i]);

            $hasil_improve = $hasil_improve / count($pembagian_perbandingan_improve);
            $rata_rata_kriteria_improve[$i][0] = round($hasil_improve, 3);
        }


        $data[]  = $rata_rata_absen;
        $data[]  = $rata_rata_kriteria_kehadiran;
        $data[]  = $rata_rata_kriteria_kerjasama;
        $data[]  = $rata_rata_kriteria_sikapkerja;
        $data[]  = $rata_rata_kriteria_improve;


        if (!empty($rata_rata_kriteria)) {
            $rata_rata_kriteria = array_column($rata_rata_kriteria, 0);
            $hasil = [];
            for ($i = 0; $i < count($data); $i++) {
                $tampung = [];
                for ($j = 0; $j < count($data[$i]); $j++) {
                    $res = array_column($data[$i], 0)[$j];
                    $tampung[] = $res;
                }
                $hasil[] = $tampung;
            }

            $hasil = $this->transpose($hasil);

            $arr_hasil = [];

            for ($i = 0; $i < count($hasil); $i++) {
                $tampung_kali = [];
                for ($j = 0; $j < count($hasil[$i]); $j++) {
                    $kali = $hasil[$i][$j] * $rata_rata_kriteria[$j];
                    $tampung_kali[] = $kali;
                }
                $arr_hasil[] = $tampung_kali;
            }

            $hasil_jumlah = [];
            foreach ($arr_hasil as $key => $value) {

                $jumlah = array_sum($value);
                $x['nip'] = $alternatif[$key]->nip;
                $x['jumlah'] = $jumlah;
                $x['nama_guru'] = $alternatif[$key]->nama_guru;
                $hasil_jumlah[] = $x;
            }


            return [
                'alternatif' => $alternatif,
                'hasil_jumlah' => $hasil_jumlah,
                'arr_hasil' => $arr_hasil
            ];
        }
    }


    public function transpose($array_one)
    {
        $array_two = [];
        foreach ($array_one as $key => $item) {
            foreach ($item as $subkey => $subitem) {
                $array_two[$subkey][$key] = $subitem;
            }
        }
        return $array_two;
    }

    public static function getPeriode()
    {
        $periode = [];
        for ($i = 2021; $i <= date('Y'); $i++) {
            $periode[] = $i;
        }

        return $periode;
    }
}
