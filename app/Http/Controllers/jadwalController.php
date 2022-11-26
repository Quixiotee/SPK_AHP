<?php

namespace App\Http\Controllers;

use App\absensi;
use App\instruktur;
use App\jadwal;
use App\kelas;
use App\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $absen = DB::table('absensi as p')->join('guru as g','p.nip','=','g.nip')->get();
        return view("jadwal.jadwal", ['absen'=>$absen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = DB::table('guru')->get();
        return view("jadwal.create",['guru'=>$guru]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $absensi = new absensi();
        $absensi->id_absen = $request->get('absen');
        $absensi->nip = $request->get('nip');
        $absensi->tanggal_absen = $request->get('tgl_absen');
        $absensi->jam_masuk = $request->get('jam_masuk');
        $absensi->jam_keluar = $request->get('jam_keluar');
        $absensi->status = $request->get('status');
        $absensi->save();
        return redirect('/jadwal');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absen = absensi::where('id_absen', $id)->delete();
        return redirect('/jadwal');
    }
}
