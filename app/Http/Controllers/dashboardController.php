<?php

namespace App\Http\Controllers;

use App\absensi;
use App\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

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
        $waktu = absensi::whereTime('jam_masuk', '>', '07:00:00')->whereYear('tanggal_absen','=',$year)->count();
        $nama_karyawan = guru::select("nama_guru")->pluck('nama_guru');
        // dd($nama_karyawan);
        return view('dashboard.index',['tkaryawan' => $tkaryawan,'waktu'=>$waktu,'nama_karyawan'=>$nama_karyawan]);
    }

    public function chart1(){
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
}
