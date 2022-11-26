<?php

namespace App\Http\Controllers;

use App\sikapkerja;
use Illuminate\Http\Request;
use App\skill;
use Illuminate\Support\Facades\DB;

class skillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = DB::table('skill')->get();
        return view("skill.index",['skill' =>$skill]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = DB::table('guru')->get();
        return view("skill.create",['guru'=>$guru]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('bukti');
 
		$nama_file = time()."_".$file->getClientOriginalName();
        
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'Bukti_ide';
		$file->move($tujuan_upload,$nama_file);
 
		skill::create([
            'nip'           => $request->get("nip"),
            'tipe_dokumen'  => $request->get("tipe_dokumen"),
            'tanggal_input' => $request->get("tanggal_input"),
			'bukti'         => $nama_file,
            'keterangan'    => $request->get("keterangan")
		]);

		return redirect('/skill');
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
        $skill = skill::where('id_skill', $id)->delete();
        return redirect('/skill');
    }
}
