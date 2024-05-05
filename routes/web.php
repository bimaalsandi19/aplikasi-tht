<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'index']);
Route::post('/auth', [LoginController::class, 'auth']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::resource('/dashboard', BarangController::class)->except('show')->middleware('auth');


Route::get('/profil', function () {
    return view('dashboard.profil', [
        'title' => "Aplikasi THT | Profil",
        'active' => 'profil'
    ]);
});
