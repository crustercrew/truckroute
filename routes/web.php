<?php

use App\Http\Controllers\ArmadasControllers;
use App\Http\Controllers\BfsControllers;
use App\Http\Controllers\DashboardControllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginControllers;
use App\Http\Controllers\PenentuanrouteController;
use App\Http\Controllers\PetaControllers;

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

Route::get('/',[LoginControllers::class, 'index']);
Route::post('/login',[LoginControllers::class, 'authenticate']);
Route::post('/logout',[LoginControllers::class, 'logout']);

Route::get('/dashboard',[DashboardControllers::class, 'index'])->middleware('auth');
Route::get('/registuser',[DashboardControllers::class,'register'])->middleware('auth');
Route::post('/create',[DashboardControllers::class,'create'])->middleware('auth');

Route::get('/Tps',[DashboardControllers::class, 'tps_location'])->middleware('auth');

Route::resource('armada', ArmadasControllers::class)->middleware('auth');

Route::resource('penentuanroute', PenentuanrouteController::class)->middleware('auth');
Route::get('/updatevolume',[BfsControllers::class, 'updatevolume'])->middleware('auth');

Route::get('/find',[PenentuanrouteController::class, 'find'])->middleware('auth');
Route::get('/findarmada',[PenentuanrouteController::class, 'findarmada'])->middleware('auth');
Route::get('/tanggal',[PenentuanrouteController::class, 'tanggal'])->middleware('auth');
Route::get('/destroy',[PenentuanrouteController::class, 'destroy'])->middleware('auth');
Route::get('/destroypertanggal',[PenentuanrouteController::class, 'destroypertanggal'])->middleware('auth');

Route::resource('route', BfsControllers::class)->middleware('auth');
Route::get('/findroutearmada',[BfsControllers::class, 'findroutearmada'])->middleware('auth');
Route::get('/findbfs',[BfsControllers::class, 'findbfs'])->middleware('auth');
Route::get('/findall',[BfsControllers::class, 'findall'])->middleware('auth');

Route::get('/peta',[PetaControllers::class, 'index'])->middleware('auth');
Route::get('/findpeta',[PetaControllers::class, 'findpeta'])->middleware('auth');