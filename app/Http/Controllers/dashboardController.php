<?php

namespace App\Http\Controllers;

use App\absensi;
use App\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use App\alternatif;
use App\kerjasama;
use App\sikapkerja;
use App\kriteria;
use App\skill;
use App\Perhitungan;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = guru::all();
        $tkaryawan = $guru->count();
        $year = date("Y");
        $waktu = absensi::whereTime('jam_masuk', '>', '07:00:00')->whereYear('tanggal_absen', '=', $year)->count();
        $nama_karyawan = guru::select("nama_guru")->pluck('nama_guru');

        $perhitungan = new Perhitungan();
        $perhitungan = $perhitungan->getAll(date('Y'));
        $hasil_jumlah = $perhitungan['hasil_jumlah'];
        $keys = array_column($hasil_jumlah, 'jumlah');
        array_multisort($keys, SORT_DESC, $hasil_jumlah);

        return view('dashboard.index', ['tkaryawan' => $tkaryawan, 'waktu' => $waktu, 'nama_karyawan' => $nama_karyawan, 'hasil' => $hasil_jumlah]);
    }

    public function chart1()
    {
        $guru = guru::all();
        $nama_karyawan = DB::table('guru')->select('nama_guru')->get();
        dd($nama_karyawan);
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

    public function getChartKinerja(Request $request)
    {
        if ($request->ajax()) {

            $periode = alternatif::distinct('periode')->orderBy('periode', 'DESC')->limit(2)->pluck('periode');

            $arr = [];

            foreach ($periode as $key => $value) {

                $perhitungan = new Perhitungan();

                $perhitungan = $perhitungan->getAll($value);

                array_push($arr, $perhitungan);
            }

            $perhitungan_1 = $arr[0];

            $nama_karyawan = [];

            foreach ($perhitungan_1['alternatif'] as $key => $value) {
                array_push($nama_karyawan, $value['nama_guru']);
            }


            $dataset_1 = $arr[0]['hasil_jumlah'];
            $dataset_2 = $arr[1]['hasil_jumlah'];

            $data = [
                'perhitungan' => $arr,
                'nama_karyawan' => $nama_karyawan,
                'periode_1' => $periode[0],
                'periode_2' => $periode[1],
                'dataset_1' => $dataset_1,
                'dataset_2' => $dataset_2
            ];

            return response()->json(['status' => true, 'data' => $data]);
        }
    }


    public function getChartDetail(Request $request)
    {
        if ($request->ajax()) {

            $nip = $request->get('nip');

            $guru = guru::where('nip', $nip)->first();

            $periode = alternatif::distinct('periode')->orderBy('periode', 'DESC')->limit(2)->pluck('periode');

            $bulan = range(1, 12);

            $perhitungan = new Perhitungan();

            $arr = [];

            foreach ($periode as $key => $value) {

                $arr_sub = [];

                foreach ($bulan as $key => $row) {

                    $x['tanggal'] = $perhitungan->getBulanById($row) . '-' . $value;

                    $absen = absensi::where('nip', $nip)->whereYear('tanggal_absen', $value)->whereMonth('tanggal_absen', $row)->where('status', 'Alpha')->orWhere('status', 'Sakit')->orWhere('status', 'Izin')->count();

                    $waktu = absensi::where('nip', $nip)->whereYear('tanggal_absen', $value)->whereMonth('tanggal_absen', $row)->whereTime('jam_masuk', '>', '07:00:00')->count();

                    $kerjasama = kerjasama::where('nip', $nip)->whereYear('tanggal_penilaian_kerjasama', $value)->whereMonth('tanggal_penilaian_kerjasama', $row)->first();

                    if ($kerjasama) {
                        $jmlpeda = ($kerjasama->komunikasi + $kerjasama->penyesuainan_diri + $kerjasama->konflik) / 3;
                    } else {
                        $jmlpeda = 0;
                    }

                    $sikap_kerja = sikapkerja::where('nip', $nip)->whereYear('tanggal_penilaian_sikapkerja', $value)->whereMonth('tanggal_penilaian_sikapkerja', $row)->first();

                    if ($sikap_kerja) {

                        $jmlpribadi = ($sikap_kerja->attitude + $sikap_kerja->minat_kerja + $sikap_kerja->minat_belajar + $sikap_kerja->pressure + $sikap_kerja->inisiatif) / 5;
                    } else {
                        $jmlpribadi = 0;
                    }

                    $skill = skill::where('nip', $nip)->whereYear('tanggal_input', $value)->where('keterangan', 'approve')->whereMonth('tanggal_input', $row)->count();

                    $x['absen'] = $absen;
                    $x['waktu'] = $waktu;
                    $x['kerjasama'] = $jmlpeda;
                    $x['sikap_kerja'] = $jmlpribadi;
                    $x['skill'] = $skill;

                    array_push($arr_sub, $x);

                }

                $y['periode'] = $value;
                $y['data'] = $arr_sub;

                array_push($arr, $y);
            }

            $periode_1 = $arr[0]['periode'];
            $label_1 = array_column($arr[0]['data'], 'tanggal');
            $absen_1 = array_column($arr[0]['data'], 'absen');
            $kerjasama_1 = array_column($arr[0]['data'], 'kerjasama');
            $sikap_kerja_1 = array_column($arr[0]['data'], 'sikap_kerja');
            $skill_1 = array_column($arr[0]['data'], 'skill');


            $periode_2 = $arr[1]['periode'];
            $label_2 = array_column($arr[1]['data'], 'tanggal');
            $absen_2 = array_column($arr[1]['data'], 'absen');
            $kerjasama_2 = array_column($arr[1]['data'], 'kerjasama');
            $sikap_kerja_2 = array_column($arr[1]['data'], 'sikap_kerja');
            $skill_2 = array_column($arr[1]['data'], 'skill');

            $data = [
                'label_1' => $label_1,
                'absen_1' => $absen_1,
                'kerjasama_1' => $kerjasama_1,
                'sikap_kerja_1' => $sikap_kerja_1,
                'skill_1' => $skill_1,
                'periode_1' => $periode_1,
                'label_2' => $label_2,
                'absen_2' => $absen_2,
                'kerjasama_2' => $kerjasama_2,
                'sikap_kerja_2' => $sikap_kerja_2,
                'skill_2' => $skill_2,
                'periode_2' => $periode_2,
                'nip' => $nip,
                'nama_karyawan' => $guru->nama_guru

            ];

            return response()->json(['status' => true, 'data' => $data]);
        }
    }
}
