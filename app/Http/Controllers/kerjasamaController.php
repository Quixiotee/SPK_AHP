<?php

namespace App\Http\Controllers;

use App\pegawai;
use App\pedagogik;
use App\kerjasama;
use App\Exports\pegawaiExport;
use App\Imports\pegawaiImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class kerjasamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kerjasama = kerjasama::all(); 
        $tam = DB::table('kerjasama as p')->join('guru as g','p.nip','=','g.nip')->get();
        return view("kerjasama.index",['kerjasama' => $kerjasama,'tam'=>$tam]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = DB::table('guru')->get();
        return view("kerjasama.create",['guru'=>$guru]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kerjasama = new kerjasama();
        $kerjasama->id_kerjasama = $request->get("id_kerjasama");
        $kerjasama->nip = $request->get("nip");
        $kerjasama->komunikasi = $request->get("komunikasi");
        $kerjasama->penyesuainan_diri = $request->get("penyesuainan_diri");
        $kerjasama->konflik = $request->get("konflik");
        $kerjasama->save();
        return redirect('/kerjasama');
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
        $kerjasama = kerjasama::where('id_kerjasama', $id)->first();
        return view('kerjasama/edit', ["kerjasama" => $kerjasama]);
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
        $kerjasama = kerjasama::find($id);
        $kerjasama->nip = $request->get('nip');
        $kerjasama->komunikasi = $request->get('komunikasi');
        $kerjasama->penyesuainan_diri = $request->get('penyesuainan_diri');
        $kerjasama->konflik = $request->get('konflik');
        $kerjasama->save();
        return redirect('/kerjasama');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kerjasama = kerjasama::where('id_kerjasama', $id)->delete();
        return redirect('/kerjasama');
    }
}
