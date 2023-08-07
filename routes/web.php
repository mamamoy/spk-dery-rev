<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelasiController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\TKController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PKController;
use App\Http\Controllers\UserController;

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



Route::resource('/', HomeController::class);
Route::resource('daftar', RegisterController::class);
Route::post('daftar', [RegisterController::class, 'store']);

Route::resource('masuk', LoginController::class);
Route::post('masuk', [LoginController::class, 'authenticate']);

Route::get('keluar', [LoginController::class, 'logout']);
Route::get('daftar-gejala', [GejalaController::class, 'daftar']);
Route::get('daftar-penyakit', [TKController::class, 'daftar']);
Route::get('tentang', [HomeController::class, 'tentang'])->name('home.tentang');


Route::middleware(['add.user.data'])->group(function () {
    Route::resource('/dashboard', DashboardController::class)->middleware('auth');
    Route::resource('relasi', RelasiController::class)->middleware('admin');
    
    Route::resource('pohon-keputusan', PKController::class)->middleware('admin');
    Route::resource('gejala', GejalaController::class)->middleware('admin');
    Route::resource('tumbuh-kembang', TKController::class)->middleware('admin');
    Route::resource('diagnosa', DiagnosaController::class)->middleware('auth');
    Route::resource('user-list', UserController::class)->middleware('admin');
    Route::match(['get', 'post'], 'diagnosa/hasil', [DiagnosaController::class, 'hasil'])->name('diagnosa.hasil');
    
    Route::get('history', [DiagnosaController::class, 'showDiagnosa'])->name('diagnosa.showDiagnosa')->middleware('auth');
});
