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

Route::get('/login', [App\Http\Controllers\AuthController::class, 'form_login'])->name('form_login');
Route::post('/authLogin', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'form_register'])->name('form_register');
Route::post('/authRegister', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\InicioController::class, 'home'])->name('home');
Route::get('/mangas', [App\Http\Controllers\MangasController::class, 'list'])->name('admin_mangas');

Route::get('/mangas/añadir', [App\Http\Controllers\MangasController::class, 'form_create'])->name('form_create_manga');
Route::post('/create_manga', [App\Http\Controllers\MangasController::class, 'create'])->name('create_manga');

Route::get('/mangas/leer/{id}-{manga}', [App\Http\Controllers\MangasController::class, 'read'])->name('read_manga');

Route::post('/add_item/{id}', [App\Http\Controllers\CarritoController::class, 'add_item'])->name('add_item');
Route::get('/remove_item/{id}', [App\Http\Controllers\CarritoController::class, 'remove_item'])->name('remove_item');
Route::get('/shopping', [App\Http\Controllers\CarritoController::class, 'list'])->name('shopping');
Route::get('/delete_car', [App\Http\Controllers\CarritoController::class, 'delete_car'])->name('delete_car');
Route::get('/edit_item/{id}', [App\Http\Controllers\CarritoController::class, 'edit_item'])->name('edit_item');
Route::get('car_checkout', [App\Http\Controllers\CarritoController::class, 'car_checkout'])->name('car_checkout');

Route::get('/mangas/actualizar/{id}-{manga}', [App\Http\Controllers\MangasController::class, 'form_update'])->name('form_update_manga');
Route::post('/update_manga', [App\Http\Controllers\MangasController::class, 'update'])->name('update_manga');

Route::get('/mangas/{id}-{manga}', [App\Http\Controllers\MangasController::class, 'delete'])->name('delete_manga');

Route::get('/tomos/leer/{id}', [App\Http\Controllers\TomesController::class, 'list'])->name('administrartomos');
Route::get('/tomos/add/{id}', [App\Http\Controllers\TomesController::class, 'form_add'])->name('form_add_tomo');
Route::post('/add_tomo/{id}', [App\Http\Controllers\TomesController::class, 'add'])->name('add_tomo');

Route::get('/tomos/actualizar/{id}', [App\Http\Controllers\TomesController::class, 'form_update'])->name('form_update_tomo');
Route::post('/tomos/actualizando/{id}', [App\Http\Controllers\TomesController::class, 'update'])->name('update_tomo');
Route::get('/tomos/eliminar/{id}', [App\Http\Controllers\TomesController::class, 'delete'])->name('delete_tomo');
