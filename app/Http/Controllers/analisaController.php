<?php

namespace App\Http\Controllers;

use App\pembayaran;
use App\peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\guru;
use App\absensi;
use App\pedagogik;
use App\kepribadian;
use App\profesional;
use App\sosial;
use App\alternatif;
use App\kriteria;
use Illuminate\Foundation\Mix;
use League\CommonMark\Extension\Table\Table;

class analisaController extends Controller
{
    public function index()
    {
        $alternatif = alternatif::all();
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

        for ($i = 0; $i < count($alternatif); $i++) {
            $hasil_banding = 0;
            for ($j = 0; $j < count($alternatif); $j++) {
                $hasil_banding = $hasil_banding + $perbandingan_absen[$j][$i];
            }
            $penjumlahan_perbandingan[0][$i] = $hasil_banding;
        }

        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $pembagian_perbandingan[$i][$j] =
                    round($perbandingan_absen[$i][$j] / $penjumlahan_perbandingan[0][$j], 2);
            }
        }

        for ($i = 0; $i < count($pembagian_perbandingan); $i++) {
            $hasil = array_sum($pembagian_perbandingan[$i]);
            // for ($j = 0; $j < count($pembagian_perbandingan); $j++) {
            //     $hasil = $hasil + $pembagian_perbandingan[0][$j];
            // }
            $hasil = $hasil / count($pembagian_perbandingan);
            $rata_rata_kriteria[$i][0] = round($hasil, 6);
        }

        session(['rata_rata_absen' => $rata_rata_kriteria]);

        return view("analisa.index", [
            'alternatif' => $alternatif, 'arry_alter' => $arry_alter,
            'perbandingan_absen' => $perbandingan_absen, 'penjumlahan_perbandingan' => $penjumlahan_perbandingan,
            'rata_rata_kriteria' => $rata_rata_kriteria
        ]);
    }

    public function kehadiran()
    {
        $alternatif = alternatif::all();
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

        for ($i = 0; $i < count($alternatif); $i++) {
            $hasil_banding_kehadiran = 0;
            for ($j = 0; $j < count($alternatif); $j++) {
                $hasil_banding_kehadiran = $hasil_banding_kehadiran + $perbandingan_kehadiran[$j][$i];
            }
            $penjumlahan_perbandingan_kehadiran[0][$i] = $hasil_banding_kehadiran;
        }

        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $pembagian_perbandingan_kehadiran[$i][$j] =
                    round($perbandingan_kehadiran[$i][$j] / $penjumlahan_perbandingan_kehadiran[0][$j], 3);
            }
        }

        for ($i = 0; $i < count($pembagian_perbandingan_kehadiran); $i++) {
            $hasil_kehadiran = array_sum($pembagian_perbandingan_kehadiran[$i]);

            // for ($j = 0; $j < count($pembagian_perbandingan_kehadiran); $j++) {
            //     $hasil_kehadiran = $hasil_kehadiran + $pembagian_perbandingan_kehadiran[0][$j];
            // }
            $hasil_kehadiran = floatval($hasil_kehadiran) / count($pembagian_perbandingan_kehadiran);
            $rata_rata_kriteria_kehadiran[$i][0] = round($hasil_kehadiran, 3);
        }

        session(['rata_rata_kehadiran' => $rata_rata_kriteria_kehadiran]);

        return view("analisa.kehadiran", [
            'alternatif' => $alternatif, 'arry_kehadiran' => $arry_kehadiran,
            'perbandingan_kehadiran' => $perbandingan_kehadiran, 'penjumlahan_perbandingan_kehadiran' => $penjumlahan_perbandingan_kehadiran,
            'rata_rata_kriteria_kehadiran' => $rata_rata_kriteria_kehadiran
        ]);
    }

    public function kerjasama()
    {
        $alternatif = alternatif::all();
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

        for ($i = 0; $i < count($alternatif); $i++) {
            $hasil_banding_kerjasama = 0;
            for ($j = 0; $j < count($alternatif); $j++) {
                $hasil_banding_kerjasama = $hasil_banding_kerjasama + $perbandingan_kerjasama[$j][$i];
            }
            $penjumlahan_perbandingan_kerjasama[0][$i] = $hasil_banding_kerjasama;
        }

        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $pembagian_perbandingan_kerjasama[$i][$j] =
                    round($perbandingan_kerjasama[$i][$j] / $penjumlahan_perbandingan_kerjasama[0][$j], 3);
                // dd($perbandingan_kerjasama[1][4]);
            }
        }

        for ($i = 0; $i < count($pembagian_perbandingan_kerjasama); $i++) {

            $hasil_kerjasama = array_sum($pembagian_perbandingan_kerjasama[$i]);
            // for ($j = 0; $j < count($pembagian_perbandingan_kerjasama); $j++) {
            //     $hasil_kerjasama = $hasil_kerjasama + $pembagian_perbandingan_kerjasama[0][$j];
            // }
            $hasil_kerjasama = $hasil_kerjasama / count($pembagian_perbandingan_kerjasama);
            $rata_rata_kriteria_kerjasama[$i][0] = round($hasil_kerjasama, 3);
        }

        session(['rata_rata_kerjasama' => $rata_rata_kriteria_kerjasama]);
        // dd($perbandingan_kerjasama);
        return view("analisa.kerjasama", [
            'alternatif' => $alternatif, 'arry_kerjasama' => $arry_kerjasama,
            'perbandingan_kerjasama' => $perbandingan_kerjasama, 'penjumlahan_perbandingan_kerjasama' => $penjumlahan_perbandingan_kerjasama,
            'rata_rata_kriteria_kerjasama' => $rata_rata_kriteria_kerjasama
        ]);
    }

    public function sikapkerja()
    {
        $alternatif = alternatif::all();
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

        for ($i = 0; $i < count($alternatif); $i++) {
            $hasil_banding_sikapkerja = 0;
            for ($j = 0; $j < count($alternatif); $j++) {
                $hasil_banding_sikapkerja = $hasil_banding_sikapkerja + $perbandingan_sikapkerja[$j][$i];
            }
            $penjumlahan_perbandingan_sikapkerja[0][$i] = $hasil_banding_sikapkerja;
        }

        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $pembagian_perbandingan_sikapkerja[$i][$j] =
                    round($perbandingan_sikapkerja[$i][$j] / $penjumlahan_perbandingan_sikapkerja[0][$j], 3);
            }
        }

        for ($i = 0; $i < count($pembagian_perbandingan_sikapkerja); $i++) {

            $hasil_sikapkerja = array_sum($pembagian_perbandingan_sikapkerja[$i]);
            // for ($j = 0; $j < count($pembagian_perbandingan_sikapkerja); $j++) {
            //     $hasil_sikapkerja = $hasil_sikapkerja + $pembagian_perbandingan_sikapkerja[0][$j];
            // }
            $hasil_sikapkerja = $hasil_sikapkerja / count($pembagian_perbandingan_sikapkerja);
            $rata_rata_kriteria_sikapkerja[$i][0] = round($hasil_sikapkerja, 3);
        }

        session(['rata_rata_sikapkerja' => $rata_rata_kriteria_sikapkerja]);

        // dd($perbandingan_sikapkerja);
        return view("analisa.sikapkerja", [
            'alternatif' => $alternatif, 'arry_sikapkerja' => $arry_sikapkerja,
            'perbandingan_sikapkerja' => $perbandingan_sikapkerja, 'penjumlahan_perbandingan_sikapkerja' => $penjumlahan_perbandingan_sikapkerja,
            'rata_rata_kriteria_sikapkerja' => $rata_rata_kriteria_sikapkerja
        ]);
    }

    public function improve()
    {
        $alternatif = alternatif::all();
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

        for ($i = 0; $i < count($alternatif); $i++) {
            $hasil_banding_improve = 0;
            for ($j = 0; $j < count($alternatif); $j++) {
                $hasil_banding_improve = $hasil_banding_improve + $perbandingan_improve[$j][$i];
            }
            $penjumlahan_perbandingan_improve[0][$i] = $hasil_banding_improve;
        }

        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif); $j++) {
                $pembagian_perbandingan_improve[$i][$j] =
                    round($perbandingan_improve[$i][$j] / $penjumlahan_perbandingan_improve[0][$j], 3);
            }
        }

        for ($i = 0; $i < count($pembagian_perbandingan_improve); $i++) {

            $hasil_improve = array_sum($pembagian_perbandingan_improve[$i]);
            // for ($j = 0; $j < count($pembagian_perbandingan_improve); $j++) {
            //     $hasil_improve = $hasil_improve + $pembagian_perbandingan_improve[0][$j];
            // }
            $hasil_improve = $hasil_improve / count($pembagian_perbandingan_improve);
            $rata_rata_kriteria_improve[$i][0] = round($hasil_improve, 3);
        }

        session(['rata_rata_improve' => $rata_rata_kriteria_improve]);
        // dd($perbandingan_improve);
        return view("analisa.improve", [
            'alternatif' => $alternatif, 'arry_improve' => $arry_improve,
            'perbandingan_improve' => $perbandingan_improve, 'penjumlahan_perbandingan_improve' => $penjumlahan_perbandingan_improve,
            'rata_rata_kriteria_improve' => $rata_rata_kriteria_improve
        ]);
    }

    public function matriks_akhir()
    {
        $alternatif = alternatif::all();
        $data[] = session('rata_rata_absen');
        $data[]  = session('rata_rata_kehadiran');
        $data[]  = session('rata_rata_kerjasama');
        $data[]  = session('rata_rata_sikapkerja');
        $data[]  = session('rata_rata_improve');

        // dd($data);
        $rata_rata_kriteria = session('rata_rata_kriteria');

        if (!empty($rata_rata_kriteria)) {
            $rata_rata_kriteria = array_column($rata_rata_kriteria, 0);
            $hasil = [];
            for ($i = 0; $i < count($data); $i++) {
                $tampung = [];
                for ($j = 0; $j < count($data[$i]); $j++) {
                    $res = array_column($data[$i], 0)[$j];

                    // $kali = $res * $rata_rata_kriteria[$j];
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
                $hasil_jumlah[] = $jumlah;
            }

            return view('analisa.hasil', ['alternatif' => $alternatif, 'hasil_jumlah' => $hasil_jumlah, 'hasil' => $arr_hasil]);
        }
    }

    function transpose($array_one) {
        $array_two = [];
        foreach ($array_one as $key => $item) {
            foreach ($item as $subkey => $subitem) {
                $array_two[$subkey][$key] = $subitem;
            }
        }
        return $array_two;
    }
}
