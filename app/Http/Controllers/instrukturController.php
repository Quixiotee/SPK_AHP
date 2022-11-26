<?php

namespace App\Http\Controllers;
use App\sikapkerja;
use App\Exports\instrukturExport;
use App\Imports\instrukturImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class instrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sikapkerja = DB::table('sikap_kerja as p')->join('guru as g','p.nip','=','g.nip')->get();
        return view("sikapkerja.index",['sikapkerja' => $sikapkerja]
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
        return view("sikapkerja.create",['guru'=>$guru]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sikapkerja = new sikapkerja();
        $sikapkerja->nip = $request->get("nip");
        $sikapkerja->attitude = $request->get("k1");
        $sikapkerja->minat_kerja = $request->get("k2");
        $sikapkerja->minat_belajar = $request->get("k3");
        $sikapkerja->pressure = $request->get("k4");
        $sikapkerja->inisiatif = $request->get("k5");
        $sikapkerja->save();
        return redirect('/sikapkerja');
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
        $sikapkerja = sikapkerja::where('id_kerja', $id)->first();
        return view('sikapkerja/edit', ["sikapkerja" => $sikapkerja]);
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
        $sikapkerja = sikapkerja::find($id);
        $sikapkerja->nip = $request->get("nip");
        $sikapkerja->attitude = $request->get("k1");
        $sikapkerja->minat_kerja = $request->get("k2");
        $sikapkerja->minat_belajar = $request->get("k3");
        $sikapkerja->pressure = $request->get("k4");
        $sikapkerja->inisiatif = $request->get("k5");
        $sikapkerja->save();
        return redirect('/sikapkerja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sikapkerja = sikapkerja::where('id_kerja', $id)->delete();
        return redirect('/sikapkerja');
    }
}
