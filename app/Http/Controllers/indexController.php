<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\guru;
use App\absensi;
use App\kerjasama;
use App\sikapkerja;
use App\alternatif;
use App\kriteria;
use App\skill;
use Hamcrest\Core\IsNull;
use Illuminate\Foundation\Mix;

class indexController extends Controller
{
    public function index(Request $request)
    {
        $periode = $request->get('periode');

        $guru = guru::all();
        $data_nama = ['hanip', 'ferdian', 'amanda', 'hani'];
        // foreach ($guru as $data) {
        //     $cekalternatif = alternatif::where('nip', $data->nip)->where('periode', $periode)->first();
        //     if (!$cekalternatif) {

        //         $absen = absensi::where('nip', $data->nip)->whereYear('tanggal_absen', $periode)->where('status', 'Alpha')->orWhere('status', 'Sakit')->orWhere('status', 'Izin')->count();

        //         $waktu = absensi::where('nip', $data->nip)->whereYear('tanggal_absen', $periode)->whereTime('jam_masuk', '>', '07:00:00')->count();

        //         $kerjasama = kerjasama::where('nip', $data->nip)->whereYear('tanggal_penilaian_kerjasama', $periode)->first();
        //         $jmlpeda = ($kerjasama->komunikasi + $kerjasama->penyesuainan_diri + $kerjasama->konflik) / 3;

        //         $sikap_kerja = sikapkerja::where('nip', $data->nip)->whereYear('tanggal_penilaian_sikapkerja', $periode)->first();
        //         $jmlpribadi = ($sikap_kerja->attitude + $sikap_kerja->minat_kerja + $sikap_kerja->minat_belajar + $sikap_kerja->pressure + $sikap_kerja->inisiatif) / 5;

        //         $skill = skill::where('nip', $data->nip)->whereYear('tanggal_input', $periode)->where('keterangan', 'approve')->count();

        //         $alternatif = new alternatif();
        //         $alternatif->nip = $data->nip;
        //         $alternatif->nama_guru = $data->nama_guru;
        //         $alternatif->absensi = $absen;
        //         $alternatif->waktu_kehadiran = $waktu;
        //         $alternatif->kerjasama = $jmlpeda;
        //         $alternatif->sikap_kerja = $jmlpribadi;
        //         $alternatif->skill_improve = $skill;
        //         $alternatif->periode = $periode;
        //         $alternatif->save();
        //         dd($jmlpribadi);
        //     }
        // }
        $isialter = alternatif::where('periode', $periode)->get();
        $arrayabsen = [];
        $fixabsen = 0;
        $fixwaktu = 0;
        $fixskill = 0;
        foreach ($isialter as $normalisasi) {

            if ($normalisasi->absensi > 7) {
                $fixabsen = 1;
            } elseif ($normalisasi->absensi == 7) {
                $fixabsen = 2;
            } elseif ($normalisasi->absensi == 5) {
                $fixabsen = 3;
            } elseif ($normalisasi->absensi == 6) {
                $fixabsen = 3;
            } elseif ($normalisasi->absensi == 3) {
                $fixabsen = 4;
            } elseif ($normalisasi->absensi == 4) {
                $fixabsen = 4;
            } elseif ($normalisasi->absensi == 2) {
                $fixabsen = 5;
            } elseif ($normalisasi->absensi == 1) {
                $fixabsen = 5;
            } elseif ($normalisasi->absensi == 0) {
                $fixabsen = 6;
            }

            if ($normalisasi->waktu_kehadiran > 7) {
                $fixwaktu = 1;
            } elseif ($normalisasi->waktu_kehadiran == 7) {
                $fixwaktu = 2;
            } elseif ($normalisasi->waktu_kehadiran == 5) {
                $fixwaktu = 3;
            } elseif ($normalisasi->waktu_kehadiran == 6) {
                $fixwaktu = 3;
            } elseif ($normalisasi->waktu_kehadiran == 3) {
                $fixwaktu = 4;
            } elseif ($normalisasi->waktu_kehadiran == 4) {
                $fixwaktu = 4;
            } elseif ($normalisasi->waktu_kehadiran == 2) {
                $fixwaktu = 5;
            } elseif ($normalisasi->waktu_kehadiran == 1) {
                $fixwaktu = 5;
            } elseif ($normalisasi->waktu_kehadiran == 0) {
                $fixwaktu = 6;
            }

            if ($normalisasi->skill_improve > 7) {
                $fixskill = 6;
            } elseif ($normalisasi->skill_improve == 7) {
                $fixskill = 5;
            } elseif ($normalisasi->skill_improve == 5) {
                $fixskill = 5;
            } elseif ($normalisasi->skill_improve == 6) {
                $fixskill = 4;
            } elseif ($normalisasi->skill_improve == 3) {
                $fixskill = 4;
            } elseif ($normalisasi->skill_improve == 4) {
                $fixskill = 3;
            } elseif ($normalisasi->skill_improve == 2) {
                $fixskill = 3;
            } elseif ($normalisasi->skill_improve == 1) {
                $fixskill = 2;
            } elseif ($normalisasi->skill_improve == 0) {
                $fixskill = 1;
            }

            $nilkerjasama = $normalisasi->kerjasama;
            $nilsikap = $normalisasi->sikap_kerja;
            array_push(
                $arrayabsen,
                [
                    'absen' => $fixabsen, 'nama_guru' => $normalisasi->nama_guru, 'waktu' => $fixwaktu,
                    'kerjasama' => $nilkerjasama, 'sikap' => $nilsikap, 'skill' => $fixskill
                ]
            );
        }

        $prioritas = [];
        $nama_prioritas = [];
        $perbandingan = array();
        $pembagian_perbandingan = array();
        $perkalian = array();
        $konsistensi = array();
        function perkalian_matriks($matriks_a, $matriks_b)
        {
            $hasil = array();
            for ($i = 0; $i < sizeof($matriks_a); $i++) {
                for ($j = 0; $j < sizeof($matriks_b[0]); $j++) {
                    $temp = 0;
                    for ($k = 0; $k < sizeof($matriks_b); $k++) {
                        $temp += $matriks_a[$i][$k] * $matriks_b[$k][$j];
                    }
                    $hasil[$i][$j] = $temp;
                }
            }
            return $hasil;
        }

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

        $perkalian = perkalian_matriks($perbandingan, $rata_rata_kriteria);

        for ($i = 0; $i < count($perkalian); $i++) {
            $konsistensi[$i][0] = round($perkalian[$i][0] / $rata_rata_kriteria[$i][0], 2);
        }

        $hkons = 0;
        for ($i = 0; $i < count($konsistensi); $i++) {
            $hkons = $hkons + $konsistensi[$i][0];
        }

        $hasil_lambda = $hkons / count($konsistensi);

        $ci = ($hasil_lambda - count($perbandingan)) / (count($perbandingan) - 1);
        $random_index = array(
            array(1, 0),
            array(2, 0),
            array(3, 0.58),
            array(4, 0.9),
            array(5, 1.12),
            array(6, 1.24),
            array(7, 1.32),
            array(8, 1.41),
            array(9, 1.45),
            array(10, 1.49),
        );

        $tampung_index = 0;
        for ($i = 0; $i < count($random_index); $i++) {
            if ($random_index[$i][0] == count($perbandingan)) {
                $tampung_index = $random_index[$i][1];
            }
        }

        $cr = $ci / $tampung_index;
        $nilai_kon = "";
        if ($cr < 0.1) {
            $nilai_kon = "KONSISTEN";
        } elseif ($cr > 0.1) {
            $nilai_kon = "Tidak KONSISTEN";
        }

        session(['rata_rata_kriteria' => $rata_rata_kriteria]);

        $periode = [];
        for ($i = 2021; $i <= date('Y'); $i++) {
            $periode[] = $i;
        }

        return view(
            'index',
            [
                'isialter' => $isialter, 'arrayabsen' => $arrayabsen, 'perbandingan' => $perbandingan,
                'kriteria' => $kriteria, 'nama_prioritas' => $nama_prioritas,
                'penjumlahan_perbandingan' => $penjumlahan_perbandingan, 'pembagian_perbandingan' => $pembagian_perbandingan,
                'rata_rata_kriteria' => $rata_rata_kriteria, "perkalian" => $perkalian, "konsistensi" => $konsistensi,
                'hkons' => $hkons, 'hasil_lamda' => $hasil_lambda, "ci" => $ci, 'tampung_index' => $tampung_index, 'random_index' => $random_index,
                'cr' => $cr, "nilai_kon" => $nilai_kon, 'data_nama' => $data_nama,
                'periode' => $periode
            ]
        );
    }


    public function refresh()
    {

        $data_periode = [];
        for ($i = 2021; $i <= date('Y'); $i++) {
            $data_periode[] = $i;
        }

        $guru = guru::all();
        foreach ($guru as $data) {
            foreach ($data_periode as $key => $periode) {
                $cekalternatif = alternatif::where('nip', $data->nip)->where('periode', $periode)->first();
                if (!$cekalternatif) {

                    $absen = absensi::where('nip', $data->nip)->whereYear('tanggal_absen', $periode)->where('status', 'Alpha')->orWhere('status', 'Sakit')->orWhere('status', 'Izin')->count();

                    $waktu = absensi::where('nip', $data->nip)->whereYear('tanggal_absen', $periode)->whereTime('jam_masuk', '>', '07:00:00')->count();

                    $kerjasama = kerjasama::where('nip', $data->nip)->whereYear('tanggal_penilaian_kerjasama', $periode)->first();

                    if ($kerjasama) {
                        $jmlpeda = ($kerjasama->komunikasi + $kerjasama->penyesuainan_diri + $kerjasama->konflik) / 3;
                    } else {
                        $jmlpeda = 0;
                    }


                    $sikap_kerja = sikapkerja::where('nip', $data->nip)->whereYear('tanggal_penilaian_sikapkerja', $periode)->first();

                    if ($sikap_kerja) {

                        $jmlpribadi = ($sikap_kerja->attitude + $sikap_kerja->minat_kerja + $sikap_kerja->minat_belajar + $sikap_kerja->pressure + $sikap_kerja->inisiatif) / 5;
                    } else {
                        $jmlpribadi = 0;
                    }


                    $skill = skill::where('nip', $data->nip)->whereYear('tanggal_input', $periode)->where('keterangan', 'approve')->count();

                    $alternatif = new alternatif();
                    $alternatif->nip = $data->nip;
                    $alternatif->nama_guru = $data->nama_guru;
                    $alternatif->absensi = $absen;
                    $alternatif->waktu_kehadiran = $waktu;
                    $alternatif->kerjasama = $jmlpeda;
                    $alternatif->sikap_kerja = $jmlpribadi;
                    $alternatif->skill_improve = $skill;
                    $alternatif->periode = $periode;
                    $alternatif->save();
                } else {

                    $absen = absensi::where('nip', $data->nip)->whereYear('tanggal_absen', $periode)->where('status', 'Alpha')->orWhere('status', 'Sakit')->orWhere('status', 'Izin')->count();

                    $waktu = absensi::where('nip', $data->nip)->whereYear('tanggal_absen', $periode)->whereTime('jam_masuk', '>', '07:00:00')->count();

                    $kerjasama = kerjasama::where('nip', $data->nip)->whereYear('tanggal_penilaian_kerjasama', $periode)->first();

                    if ($kerjasama) {
                        $jmlpeda = ($kerjasama->komunikasi + $kerjasama->penyesuainan_diri + $kerjasama->konflik) / 3;
                    } else {
                        $jmlpeda = 0;
                    }


                    $sikap_kerja = sikapkerja::where('nip', $data->nip)->whereYear('tanggal_penilaian_sikapkerja', $periode)->first();

                    if ($sikap_kerja) {

                        $jmlpribadi = ($sikap_kerja->attitude + $sikap_kerja->minat_kerja + $sikap_kerja->minat_belajar + $sikap_kerja->pressure + $sikap_kerja->inisiatif) / 5;
                    } else {
                        $jmlpribadi = 0;
                    }

                    $skill = skill::where('nip', $data->nip)->whereYear('tanggal_input', $periode)->where('keterangan', 'approve')->count();

                    $cekalternatif->absensi = $absen;
                    $cekalternatif->waktu_kehadiran = $waktu;
                    $cekalternatif->kerjasama = $jmlpeda;
                    $cekalternatif->sikap_kerja = $jmlpribadi;
                    $cekalternatif->skill_improve = $skill;
                    $cekalternatif->save();
                }
            }
        }

        $periode = alternatif::orderBy('periode', 'DESC')->first()->periode;

        return redirect()->route('index.index', ['periode' => $periode]);
    }
}
