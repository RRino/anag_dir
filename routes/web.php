<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnagraficaController;
use App\Http\Controllers\PdfBollettinoController;

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


Route::get('/',[AnagraficaController::class,'list']);

Route::view('add', 'anagrafica.AddAnagrafica');
Route::POST('add',[AnagraficaController::class,'AddAnagrafica']);
Auth::routes();


Route::get('delete/{id}',[AnagraficaController::class,'delete']);

Route::get('edit/{id}',[AnagraficaController::class,'showData']);
Route::post('edit',[AnagraficaController::class,'edit']);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('mod',[AnagraficaController::class,'operateDB']);

Route::get('pdfBollettini', [App\Http\Controllers\PdfBollettinoController::class, 'PdfBollettini']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


