<?php

namespace App\Http\Controllers\AdministrasiController;

use App\administrasi_peserta;
use App\diklat;
use App\Http\Controllers\Controller;
use App\kelas; 
use App\persyaratan;
use App\peserta;
use App\sosial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class administrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosial = DB::table('sosial as p')->join('guru as g','p.nip','=','g.nip')->get();
        return view("administrasi_peserta.index",['sosial' => $sosial]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("administrasi_peserta.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sosial = new sosial();
        $sosial->id_sosial = $request->get("sosial");
        $sosial->nip = $request->get("nip");
        $sosial->S1 = $request->get("S1");
        $sosial->save();
        return redirect('/administrasi');
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
        $sosial = sosial::where('id_sosial', $id)->first();
        return view('administrasi_peserta/edit', ["sosial" => $sosial]);
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
        $sosial = sosial::where('id_sosial', $id)->delete();
        return redirect('/administrasi');
    }
}
