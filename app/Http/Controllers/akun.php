<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\akunM;
use App\Imports\akunim;
use App\Exports\akunex;

class akun extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = DB::table('akun')->get();
        return view(
            "akun.akun",
            [
                'akun' => $akun
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("akun.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $akun = new akunM();
        $akun->ref = $request->get('ref');
        $akun->nama = $request->get('namaAkun');
        $akun->update_by = session('nama');
        $akun->save();
        return redirect('/akun');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akun = akunM::where('ref', $id)->first();
        return view('akun/edit' , ["akun" => $akun]);
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
        $akun = akunM::find($id);
        $akun->ref = $request->get('ref');
        $akun->namaAkun = $request->get('nama');
        $akun->update_by = session('nama');
        $akun->save();
        return redirect('/akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akun = akunM::where('ref', $id)->delete();
        return redirect('/akun');
    }

    public function importakun(Request $request){
        if ($request->file('file')) {
            Excel::import(new akunim,$request->file('file'));

            return redirect('/akun');
        }else
            echo "<script>alert('Import Gagal');</script>"; 

            return redirect('/akun');
    }
    
    public function exportakun(){
        return Excel::download(new akunex,'Laporan Akun.xlsx');
    }
}
