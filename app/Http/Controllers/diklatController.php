<?php

namespace App\Http\Controllers;

use App\diklat;
use Illuminate\Http\Request;
use App\detkriteria;
use Illuminate\Support\Facades\DB;

class diklatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kkriteria = $request->get('kode_kriteria');
        return view("diklat.create",['kkriteria'=> $kkriteria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detailk = new detkriteria();
        $detailk->kode_kriteria = $request->get('kode_kriteria');
        $detailk->nama_detail_kriteria = $request->get('nama_detail');
        $detailk->bobot_detail_kriteria = $request->get('kode_kriteria');
        $detailk->save();
        return redirect('/kelas');
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
        $diklat = diklat::where('kode_diklat', $id)->first();
        return view('diklat/edit', ["diklat" => $diklat]);
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
        $diklat = diklat::find($id);
        $diklat->nama_diklat = $request->get('nama_diklat');
        $diklat->durasi = $request->get('durasi');
        $diklat->harga = $request->get('harga');
        $diklat->update_by = session('nama');
        $diklat->save();
        return redirect('/diklat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = detkriteria::where('kode_detail', $id)->delete();
        return redirect('/kelas');
    }
}
