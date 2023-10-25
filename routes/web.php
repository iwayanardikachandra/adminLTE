<?php

use App\Models\Pegawai;
use App\Models\User;

//Models
use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;


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

// Route::get('/data-pegawai', 'PegawaiController@index')->name('data-pegawai');


//page
Route::get('/beranda', function () {
    return view('HalamanDepan.beranda');
});

Route::get('/register', function () {
    return view('Pengguna.register');
});

Route::get('/data-pegawai', [PegawaiController::class, 'index'])->name('data-pegawai');
Route::get('/create-pegawai', [PegawaiController::class, 'create'])->name('create-pegawai');
Route::post('/simpan-pegawai', [PegawaiController::class, 'store'])->name('simpan-pegawai');
Route::get('/edit-pegawai/{id}', [PegawaiController::class, 'edit'])->name('edit-pegawai');
Route::post('/update-pegawai/{id}', [PegawaiController::class, 'update'])->name('update-pegawai');
Route::get('/delete-pegawai/{id}', [PegawaiController::class, 'destroy'])->name('delete-pegawai');

//Login
Route::get('/login', function () {
    return view('Pengguna.login');
});

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

//Logout
Route::get('/beranda', function () {
    return view('HalamanDepan.beranda');
})->middleware('auth.user');

Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth.user');




