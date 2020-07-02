<?php

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
    return view('welcome');
});

Route::group(['prefix' => 'pertanyaan'], function() {
    Route::get('/', 'PertanyaanController@index')->name('pertanyaan.index');
    Route::get('/create', 'PertanyaanController@create')->name('pertanyaan.create');
    Route::post('/', 'PertanyaanController@store')->name('pertanyaan.store');
});

Route::group(['prefix' => 'jawaban'], function() {
    Route::get('/{pertanyaan_id}', 'JawabanController@index')->name('jawaban.index');
    Route::get('/{pertanyaan_id}/jawab', 'JawabanController@create')->name('jawaban.create');
    Route::post('/{pertanyaan_id}', 'JawabanController@store')->name('jawaban.store');
});
