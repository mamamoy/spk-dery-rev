<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelasiController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\TKController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

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
Route::resource('relasi', RelasiController::class);
Route::resource('gejala', GejalaController::class);
Route::resource('tumbuh-kembang', TKController::class);
Route::resource('diagnosa', DiagnosaController::class);
Route::match(['get', 'post'], 'diagnosa/hasil', [DiagnosaController::class, 'hasil'])->name('diagnosa.hasil');