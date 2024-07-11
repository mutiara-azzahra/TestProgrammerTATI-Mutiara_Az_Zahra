<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MasterPegawaiController;
use App\Http\Controllers\MasterLevelPegawaiController;
use App\Http\Controllers\LogHarianPegawaiController;
use App\Http\Controllers\VerifikasiLogController;

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

Route::group(['middleware' => 'auth'], function () {
    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //USER
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/reset/{id}', [UserController::class, 'reset'])->name('user.reset');

    //PROFIL
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

    //MASTER LEVEL PEGAWAI
    Route::get('/master-level-pegawai', [MasterLevelPegawaiController::class, 'index'])->name('master-level-pegawai.index');
    Route::get('/master-level-pegawai/create', [MasterLevelPegawaiController::class, 'create'])->name('master-level-pegawai.create');
    Route::get('/master-level-pegawai/update/{id}', [MasterLevelPegawaiController::class, 'edit'])->name('master-level-pegawai.edit');
    Route::get('/master-level-pegawai/delete/{id}', [MasterLevelPegawaiController::class, 'delete'])->name('master-level-pegawai.delete');
    Route::get('/master-level-pegawai/show/{id}', [MasterLevelPegawaiController::class, 'show'])->name('master-level-pegawai.show');
    Route::post('/master-level-pegawai/store', [MasterLevelPegawaiController::class, 'store'])->name('master-level-pegawai.store');
    Route::post('/master-level-pegawai/update/{id}', [MasterLevelPegawaiController::class, 'update'])->name('master-level-pegawai.update');

    //MASTER PEGAWAI
    Route::get('/master-pegawai', [MasterPegawaiController::class, 'index'])->name('master-pegawai.index');
    Route::get('/master-pegawai/create', [MasterPegawaiController::class, 'create'])->name('master-pegawai.create');
    Route::get('/master-pegawai/update/{id}', [MasterPegawaiController::class, 'edit'])->name('master-pegawai.edit');
    Route::get('/master-pegawai/delete/{id}', [MasterPegawaiController::class, 'delete'])->name('master-pegawai.delete');
    Route::get('/master-pegawai/show/{id}', [MasterPegawaiController::class, 'show'])->name('master-pegawai.show');
    Route::post('/master-pegawai/store', [MasterPegawaiController::class, 'store'])->name('master-pegawai.store');
    Route::post('/master-pegawai/update/{id}', [MasterPegawaiController::class, 'update'])->name('master-pegawai.update');

    //LOG HARIAN PEGAWAI
    Route::get('/log-harian-pegawai', [LogHarianPegawaiController::class, 'index'])->name('log-harian-pegawai.index');
    Route::get('/log-harian-pegawai/create', [LogHarianPegawaiController::class, 'create'])->name('log-harian-pegawai.create');
    Route::get('/log-harian-pegawai/update/{id}', [LogHarianPegawaiController::class, 'edit'])->name('log-harian-pegawai.edit');
    Route::get('/log-harian-pegawai/delete/{id}', [LogHarianPegawaiController::class, 'delete'])->name('log-harian-pegawai.delete');
    Route::get('/log-harian-pegawai/show/{id}', [LogHarianPegawaiController::class, 'show'])->name('log-harian-pegawai.show');
    Route::post('/log-harian-pegawai/store', [LogHarianPegawaiController::class, 'store'])->name('log-harian-pegawai.store');
    Route::post('/log-harian-pegawai/update/{id}', [LogHarianPegawaiController::class, 'update'])->name('log-harian-pegawai.update');

    //VERIFIKASI LOG HARIAN
    Route::get('/verifikasi-log', [VerifikasiLogController::class, 'index'])->name('verifikasi-log.index');
    Route::post('/verifikasi-log/terima/{id}', [VerifikasiLogController::class, 'diterima'])->name('verifikasi-log.diterima');
    Route::post('/verifikasi-log/tolak/{id}', [VerifikasiLogController::class, 'ditolak'])->name('verifikasi-log.ditolak');

});

//REGISTER
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

//LOGIN
Route::get('/login', [LoginController::class, 'formLogin'])->name('login.formLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




