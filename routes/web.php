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

Route::get('/', function () {return redirect()->route('home');});

Route::get('/home', [App\Http\Controllers\InicioController::class, 'home'])->name('home');
Route::get('/mangas', [App\Http\Controllers\MangasController::class, 'list'])->name('mangas');

Route::get('/mangas/añadir', [App\Http\Controllers\MangasController::class, 'form_create'])->name('form_create_manga');
Route::post('/create_manga', [App\Http\Controllers\MangasController::class, 'create'])->name('create_manga');

Route::get('/mangas/leer/{id}-{manga}', [App\Http\Controllers\MangasController::class, 'read'])->name('read_manga');

Route::get('/mangas/actualizar/{id}-{manga}', [App\Http\Controllers\MangasController::class, 'form_update'])->name('form_update_manga');
Route::post('/update_manga', [App\Http\Controllers\MangasController::class, 'update'])->name('update_manga');

Route::get('/mangas/{id}-{manga}', [App\Http\Controllers\MangasController::class, 'delete'])->name('delete_manga');
