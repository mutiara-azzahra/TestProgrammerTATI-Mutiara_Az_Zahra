<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Auth;
use App\Http\Controllers\Provinsi;

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


//API PROVINSI
Route::get('/api/provinsi', [ProvinsiController::class, 'index'])->name('provinsi.index');
Route::get('/api/provinsi/{id}', [ProvinsiController::class, 'show'])->name('provinsi.show');
Route::post('/api/provinsi/store', [ProvinsiController::class, 'store'])->name('provinsi.store');
Route::put('/api/provinsi/edit/{id}', [ProvinsiController::class, 'update'])->name('provinsi.update');
Route::delete('/api/provinsi/delete/{id}', [ProvinsiController::class, 'destroy'])->name('provinsi.destroy');




