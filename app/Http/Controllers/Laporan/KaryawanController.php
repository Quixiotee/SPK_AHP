<?php

namespace App\Http\Controllers\Laporan;

use App\absensi;
use App\alternatif;
use App\guru;
use App\Http\Controllers\Controller;
use App\kerjasama;
use App\Perhitungan;
use App\sikapkerja;
use App\skill;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $periode_awal = (!empty($request->get('periode_awal'))) ? Carbon::parse($request->get('periode_awal'))->format('Y-m-d') : '';

        $periode_akhir = (!empty($request->get('periode_akhir'))) ? Carbon::parse($request->get('periode_akhir'))->format('Y-m-d') : '';

        $karyawan = guru::all();

        $nip = $request->get('karyawan');

        $status = $request->get('status');

        $kerjasama = kerjasama::whereDate('tanggal_penilaian_kerjasama', '>=', $periode_awal)->whereDate('tanggal_penilaian_kerjasama', '<=', $periode_akhir)->where('nip', $nip)->get();

        $sikap_kerja = sikapkerja::whereDate('tanggal_penilaian_sikapkerja', '>=', $periode_awal)->whereDate('tanggal_penilaian_sikapkerja', '<=', $periode_akhir)->where('nip', $nip)->get();

        $pengajuan = skill::whereDate('tanggal_input', '>=', $periode_awal)->whereDate('tanggal_input', '<=', $periode_akhir)->where('nip', $nip)->get();

        $presensi = absensi::whereDate('tanggal_absen', '>=', $periode_awal)->whereDate('tanggal_absen', '<=', $periode_akhir)->where('status', 'Hadir')->where('nip', $nip)->count();

        $terlambat = absensi::whereDate('tanggal_absen', '>=', $periode_awal)->whereDate('tanggal_absen', '<=', $periode_akhir)->where('status', 'Terlambat')->where('nip', $nip)->count();

        if ($status == 'cetak') {

            $karyawan = guru::where('nip', $nip)->first();

            $pdf = PDF::loadview('laporan.karyawan.pdf', ['karyawan' => $karyawan, 'kerjasama' => $kerjasama, 'sikap_kerja' => $sikap_kerja, 'pengajuan' => $pengajuan, 'presensi' => $presensi, 'terlambat' => $terlambat, 'periode_awal' => $periode_awal, 'periode_akhir' => $periode_akhir]);

            return $pdf->stream('laporan-karyawan-pdf');
        }

        return view('laporan.karyawan.index', ['karyawan' => $karyawan, 'kerjasama' => $kerjasama, 'sikap_kerja' => $sikap_kerja, 'pengajuan' => $pengajuan, 'presensi' => $presensi, 'terlambat' => $terlambat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
