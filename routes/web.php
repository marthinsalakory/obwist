<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/objek_wisata', [App\Http\Controllers\ObjekWisataController::class, 'index'])->name('objek_wisata')->middleware('auth');
Route::get('/objek_wisata/tambah', [App\Http\Controllers\ObjekWisataController::class, 'tambah'])->name('objek_wisata.tambah')->middleware('auth');
Route::post('/objek_wisata/tambah', [App\Http\Controllers\ObjekWisataController::class, 'kirim'])->middleware('auth');
Route::get('/objek_wisata/ubah/{id}', [App\Http\Controllers\ObjekWisataController::class, 'ubah'])->name('objek_wisata.ubah')->middleware('auth');
Route::post('/objek_wisata/ubah/{id}', [App\Http\Controllers\ObjekWisataController::class, 'simpan'])->middleware('auth');
Route::get('/objek_wisata/hapus/{id}', [App\Http\Controllers\ObjekWisataController::class, 'hapus'])->name('objek_wisata.hapus')->middleware('auth');

Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil')->middleware('auth');
Route::get('/profil/ubah', [App\Http\Controllers\ProfilController::class, 'ubah'])->name('profil.ubah')->middleware('auth');
Route::post('/profil/ubah', [App\Http\Controllers\ProfilController::class, 'update'])->middleware('auth');
Route::get('/profil/ubah_password', [App\Http\Controllers\ProfilController::class, 'ubah_password'])->name('profil.ubah_password')->middleware('auth');
Route::post('/profil/ubah_password', [App\Http\Controllers\ProfilController::class, 'update_password'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
