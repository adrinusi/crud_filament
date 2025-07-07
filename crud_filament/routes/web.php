<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;


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
    return redirect()->route('login');
});


Route::resource('mahasiswa', MahasiswaController::class)->parameters([
    'mahasiswa' => 'nim'
]);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['ceklogin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // ganti dengan halaman utama setelah login
    });

    // contoh akses terbatas
    Route::resource('mahasiswa', MahasiswaController::class);
});