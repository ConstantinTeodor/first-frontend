<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InchiriereController;
use App\Http\Controllers\LocatieController;
use App\Http\Controllers\PlataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasinaController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/masini', [MasinaController::class, 'index']);
Route::get('/masini/{id}', [MasinaController::class, 'show']);
Route::put('/masini', [MasinaController::class, 'update']);
Route::post('/masini', [MasinaController::class, 'store']);
Route::delete('/masini/{id}', [MasinaController::class, 'destroy']);

Route::get('/clienti', [ClientController::class, 'index']);
Route::get('/clienti/{id}', [ClientController::class, 'show']);
Route::put('/clienti', [ClientController::class, 'update']);
Route::post('/clienti', [ClientController::class, 'store']);
Route::delete('/clienti/{id}', [ClientController::class, 'destroy']);

Route::get('/locatii', [LocatieController::class, 'index']);
Route::get('/locatii/{id}', [LocatieController::class, 'show']);
Route::put('/locatii', [LocatieController::class, 'update']);
Route::post('/locatii', [LocatieController::class, 'store']);
Route::delete('/locatii/{id}', [LocatieController::class, 'destroy']);

Route::get('/plati', [PlataController::class, 'index']);
Route::get('/plati/{id}', [PlataController::class, 'show']);
Route::put('/plati', [PlataController::class, 'update']);
Route::post('/plati', [PlataController::class, 'store']);
Route::delete('/plati/{id}', [PlataController::class, 'destroy']);

Route::get('/inchirieri', [InchiriereController::class, 'index']);
Route::get('/inchirieri/{id}', [InchiriereController::class, 'show']);
Route::put('/inchirieri', [InchiriereController::class, 'update']);
Route::post('/inchirieri', [InchiriereController::class, 'store']);
Route::delete('/inchirieri/{id}', [InchiriereController::class, 'destroy']);
