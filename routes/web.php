<?php

use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('belajar', [\App\Http\Controllers\BelajarController::class, 'index']);
Route::get('belajar/tambah', [\App\Http\Controllers\BelajarController::class, 'tambah'])->name('belajar.tambah');
Route::post('storeTambah', [\App\Http\Controllers\BelajarController::class, 'storeTambah'])->name('storeTambah');
Route::get('belajar/kurang', [\App\Http\Controllers\BelajarController::class, 'kurang'])->name('belajar.kurang');
Route::post('storeKurang', [\App\Http\Controllers\BelajarController::class, 'storeKurang'])->name('storeKurang');
Route::get('belajar/bagi', [\App\Http\Controllers\BelajarController::class, 'bagi'])->name('belajar.bagi');
Route::post('storeBagi', [\App\Http\Controllers\BelajarController::class, 'storeBagi'])->name('storeBagi');
Route::get('belajar/kali', [\App\Http\Controllers\BelajarController::class, 'kali'])->name('belajar.kali');
Route::post('storeKali', [\App\Http\Controllers\BelajarController::class, 'storeKali'])->name('storeKali');

Route::get('calculator', [CalculatorController::class, 'create']);
Route::post('calculator/create', [CalculatorController::class, 'store'])->name('calculator.store');

// get: preview / menampilkan
// post: mengirim sebuah data melalui form
// put: mengirim sebuah data melalui form tapi untuk update
// delete: mengirim sebuah data melalui form tapi untuk hapus
