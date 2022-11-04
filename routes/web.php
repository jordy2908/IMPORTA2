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

Route::get('/', [\App\Http\Controllers\get_all::class, 'index']) -> name('index');
Route::get('/home', [\App\Http\Controllers\get_all::class, 'get_all']) -> middleware(['auth', 'verified']) -> name('home');

Route::get('/buscador', [\App\Http\Controllers\get_all::class, 'get_all_']) -> name('home.buscador');
Route::get('/buscador_', [\App\Http\Controllers\get_all::class, 'get_all__']) -> name('home.buscador1');
Route::get('/all', [\App\Http\Controllers\get_all::class, 'all_']) -> name('home.all');
Route::get('/alll', [\App\Http\Controllers\get_all::class, 'all__']) -> name('home.alll');
Route::get('/get/{proveedor}', [\App\Http\Controllers\get_all::class, 'get']) -> name('home.get');
Route::get('/get_pdf/{proveedor}', [\App\Http\Controllers\get_all::class, 'get_pdf']) -> name('home.pdf');

Route::get('/login', [\App\Http\Controllers\SessionsController::class, 'create']) -> name('login.index');
Route::post('/login', [\App\Http\Controllers\SessionsController::class, 'login']) -> name('login.login');
Route::get('/logout', [\App\Http\Controllers\SessionsController::class, 'destroy']) -> name('login.destroy');

Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register']) -> name('register.create');
Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create']) -> name('register.index');

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']) -> middleware('admin.auth') -> name('admin.index');
Route::post('/admin/all', [\App\Http\Controllers\AdminController::class, 'all']) -> middleware('admin.auth') -> name('admin.all');
Route::post('/admin/users', [\App\Http\Controllers\AdminController::class, 'users']) -> middleware('admin.auth') -> name('admin.alll');


require __DIR__.'/auth.php';
