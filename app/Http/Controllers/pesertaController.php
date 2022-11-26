<?php

namespace App\Http\Controllers;

use App\administrasi_peserta;
use App\diklat;
use App\Exports\pesertaExport;
use App\Imports\pesertaImport;
use App\kelas;
use App\kelasbaru;
use App\masterkelas;
use App\persyaratan;
use App\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class pesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = DB::table('guru')->get();

        return view(
            "data_pegawai.index",
            ['guru' => $guru]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = guru::all();
        return view("data_pegawai.create", ["guru" => $guru]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = new guru();
        $guru->nip = $request->get("nip");
        $guru->nama_guru = $request->get("nama");
        $guru->tgl_lahir = $request->get("tanggal_lahir");
        $guru->tempat_lahir = $request->get("tempat_lahir");
        $guru->alamat = $request->get("alamat");
        $guru->jenis_kelamin = $request->get("jk");
        $guru->jabatan = $request->get("jabatan");
        $guru->shift = $request->get("shift");
        $guru->nomor_tlp = $request->get("tlp");
        $guru->save();

        return redirect('/data_pegawai');
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
        $guru = guru::where('nip', $id)->first();
        return view('data_pegawai/edit', ["guru" => $guru]);
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
        $guru = guru::find($id);
        $guru->nip = $request->get("nip");
        $guru->nama_guru = $request->get("nama");
        $guru->tgl_lahir = $request->get("tanggal_lahir");
        $guru->tempat_lahir = $request->get("tempat_lahir");
        $guru->alamat = $request->get("alamat");
        $guru->jenis_kelamin = $request->get("jk");
        $guru->jabatan = $request->get("jabatan");
        $guru->shift = $request->get("shift");
        $guru->nomor_tlp = $request->get("tlp");
        $guru->save(); 

        return redirect('/data_pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = guru::where('nip', $id)->delete();
        return redirect('/data_pegawai');
    }
}
