<?php

namespace App\Http\Controllers;

use App\pegawai;
use App\pengguna;
use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('user')->get();
        $pegawai = pegawai::all();
        return view("user.index", ['user' => $user, 'pegawai' => $pegawai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = pegawai::all();
        return view("user.create", ['pegawai' => $pegawai]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new pengguna();
        $user->id_user = $request->get("id_user");
        $user->username = $request->get("username");
        $user->id_pegawai = $request->get("id_pegawai");
        $user->password = $request->get("password");
        $user->role = $request->get("role");
        $user->update_by = session('nama');
        $user->save();
        return redirect('/user');
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
        $pegawai = pegawai::all();
        $user = pengguna::where('id_user', $id)->first();
        return view('user/edit', ['user' => $user, 'pegawai' => $pegawai]);
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
        $user = pengguna::find($id);
        $user->id_user = $request->get("id_user");
        $user->username = $request->get("username");
        $user->id_pegawai = $request->get("id_pegawai");
        $user->password = $request->get("password");
        $user->role = $request->get("role");
        $user->update_by = session('nama');
        $user->save();
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::where('id_user', $id)->delete();
        return redirect('/user');
    }
}
