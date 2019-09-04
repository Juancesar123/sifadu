<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('datapenduduks', 'datapendudukAPIController');

Route::resource('pendudukmeninggals', 'pendudukmeninggalAPIController');

Route::resource('pendudukpindahs', 'pendudukpindahAPIController');

Route::resource('rencanapembangunans', 'rencanapembangunanAPIController');

Route::resource('kegiatanpembangunans', 'kegiatanpembangunanAPIController');

Route::resource('inventarisproyeks', 'inventarisproyekAPIController');

Route::resource('kaderpembangunans', 'kaderpembangunanAPIController');

Route::resource('suratpengantarktps', 'suratpengantarktpAPIController');

Route::resource('suratpengantarkks', 'suratpengantarkkAPIController');

Route::resource('suratketerangantidakmampus', 'suratketerangantidakmampuAPIController');

Route::resource('suratketerangandomisilis', 'suratketerangandomisiliAPIController');

Route::resource('suratketeranganskcks', 'suratketeranganskckAPIController');

Route::resource('suratketeranganusahas', 'suratketeranganusahaAPIController');

Route::resource('suratketeranganpenguasaantanahs', 'suratketeranganpenguasaantanahAPIController');

Route::resource('suratketeranganlainnyas', 'suratketeranganlainnyaAPIController');

Route::resource('suratketerangandesas', 'suratketerangandesaAPIController');

Route::resource('keputusanbpds', 'keputusanbpdAPIController');

Route::resource('anggotabpds', 'anggotabpdAPIController');

Route::resource('kegiatanbpds', 'kegiatanbpdAPIController');

Route::resource('agendabpds', 'agendabpdAPIController');

Route::resource('dataekspedisis', 'dataekspedisiAPIController');

Route::resource('datasuratmasuks', 'datasuratmasukAPIController');

Route::resource('datasuratkeluars', 'datasuratkeluarAPIController');

Route::resource('parameterjeniskelamins', 'parameterjeniskelaminAPIController');

Route::resource('parameterstatuskawins', 'parameterstatuskawinAPIController');





Route::resource('jenispekerjaans', 'jenispekerjaanAPIController');

Route::resource('pendidikans', 'pendidikanAPIController');

Route::resource('dusuns', 'dusunAPIController');

Route::resource('agamas', 'agamaAPIController');

Route::resource('pajaktanahs', 'pajaktanahAPIController');