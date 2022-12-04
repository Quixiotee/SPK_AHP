<?php

namespace App\Http\Controllers\Laporan;

use App\alternatif;
use App\Http\Controllers\Controller;
use App\Perhitungan;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class RangkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $last_periode = alternatif::distinct('periode')->orderBy('periode', 'DESC')->pluck('periode')->toArray();

        $periode_awal = (!empty($request->get('periode_awal'))) ? Carbon::parse($request->get('periode_awal'))->format('Y') : min($last_periode);

        $periode_akhir = (!empty($request->get('periode_akhir'))) ? Carbon::parse($request->get('periode_akhir'))->format('Y') : max($last_periode);

        $status = $request->get('status');

        $data =  new Perhitungan();

        $arr = [];


        for ($i = $periode_awal; $i <= $periode_akhir; $i++) {

            $hasil = $data->getAll($i)['hasil_jumlah'];

            foreach ($hasil as $key => $row) {
                array_push($arr, $row);
            }

        }

        $keys = array_column($arr, 'jumlah');

        array_multisort($keys, SORT_DESC, $arr);

        array_slice($arr, 0, 10);


        if ($status == 'cetak') {

            $pdf = PDF::loadview('laporan.perangkingan.pdf', ['data' => $arr, 'periode_awal' => $periode_awal, 'periode_akhir' => $periode_akhir]);

            return $pdf->stream('laporan-perangkingan-pdf');
        }

        return view('laporan.perangkingan.index', ['data' => $arr]);
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
