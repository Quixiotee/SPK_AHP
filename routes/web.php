<?php

use App\Http\Controllers\form_pesertaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/index');
});
Route::group(['middleware' => 'checklogin'], function () {

    Route::get('/logout', 'loginController@logout');
    Route::get('analisa/kehadiran','analisaController@kehadiran')->name('analisa.kehadiran');
    Route::get('analisa/kerjasama','analisaController@kerjasama')->name('analisa.kerjasama');
    Route::get('analisa/sikapkerja','analisaController@sikapkerja')->name('analisa.sikapkerja');
    Route::get('analisa/improve','analisaController@improve')->name('analisa.improve');
    Route::get('hasil','analisaController@matriks_akhir')->name('hasil_akhir');
    // Route::post('index/refresh','indexController@refresh');
    Route::resource('index', 'indexController');
    Route::resource('analisa','analisaController');
    Route::resource('dashboard','dashboardController');
    Route::resource('kerjasama', 'kerjasamaController');
    Route::resource('data_pegawai', 'pesertaController');
    Route::resource('sikapkerja', 'instrukturController');
    Route::resource('skill', 'skillController');
    Route::resource('kriteria', 'kelas\kelasController');
    Route::resource('jadwal', 'jadwalController');

});
Route::resource('login', 'loginController');
Route::post('/checklogin', 'loginController@checklogin');
