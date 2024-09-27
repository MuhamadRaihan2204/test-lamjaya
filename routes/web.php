<?php

use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProvinsiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// end point kecamatan
Route::get('kecamatan',[KecamatanController::class, 'index'])->name('kecamatan');
Route::get('kecamatan/create',[KecamatanController::class, 'create'])->name('kecamatan.create');
Route::post('kecamatan/store',[KecamatanController::class, 'store'])->name('kecamatan.store');
Route::get('kecamatan/edit/{id}',[KecamatanController::class, 'edit'])->name('kecamatan.edit');
Route::put('kecamatan/update/{id}',[KecamatanController::class, 'update'])->name('kecamatan.update');
Route::delete('kecamatan/destroy/{id}',[KecamatanController::class, 'destroy'])->name('kecamatan.destroy');

// end point keluarahan
Route::get('kelurahan',[KelurahanController::class, 'index'])->name('kelurahan');
Route::get('kelurahan/create',[KelurahanController::class, 'create'])->name('kelurahan.create');
Route::post('kelurahan/store',[KelurahanController::class, 'store'])->name('kelurahan.store');
Route::get('kelurahan/edit/{id}',[KelurahanController::class, 'edit'])->name('kelurahan.edit');
Route::put('kelurahan/update/{id}',[KelurahanController::class, 'update'])->name('kelurahan.update');
Route::delete('kelurahan/destroy/{id}',[KelurahanController::class, 'destroy'])->name('kelurahan.destroy');

// end point provinsi
Route::get('provinsi',[ProvinsiController::class, 'index'])->name('provinsi');
Route::get('provinsi/create',[ProvinsiController::class, 'create'])->name('provinsi.create');
Route::post('provinsi/store',[ProvinsiController::class, 'store'])->name('provinsi.store');
Route::get('provinsi/edit/{id}',[ProvinsiController::class, 'edit'])->name('provinsi.edit');
Route::put('provinsi/update/{id}',[ProvinsiController::class, 'update'])->name('provinsi.update');
Route::delete('provinsi/destroy/{id}',[ProvinsiController::class, 'destroy'])->name('provinsi.destroy');

// end point pegawai
Route::get('pegawai',[PegawaiController::class, 'index'])->name('pegawai');
Route::get('pegawai/create',[PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('pegawai/store',[PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('pegawai/edit/{id}',[PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('pegawai/update/{id}',[PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('pegawai/destroy/{id}',[PegawaiController::class, 'destroy'])->name('pegawai.destroy');
