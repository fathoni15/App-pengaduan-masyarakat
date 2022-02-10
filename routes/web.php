<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as AC;
use App\Http\Controllers\MasyarakatController as MC;
use App\Http\Controllers\PetugasController as PC;

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
    return redirect('register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'admin'], function(){
        Route::get('/admin/home', [AC::class, 'index'])->name('admin.home');
        Route::get('/admin/daftar/petugas', [AC::class, 'listPetugas'])->name('admin.listPetugas');
        Route::get('/admin/tambah/petugas', [AC::class, 'addPetugas'])->name('admin.addPetugas');
        Route::post('/admin/petugas/store', [AC::class, 'petugasStore'])->name('admin.petugasStore');
        Route::get('/admin/laporan/daftar', [AC::class, 'listPengaduan'])->name('admin.listPengaduan');
        Route::get('/admin/laporan/selesai', [AC::class, 'listSelesai'])->name('admin.listSelesai');
    });

    Route::group(['middleware' => 'petugas'], function(){
        Route::get('/petugas/home', [PC::class, 'index'])->name('petugas.home');
        Route::get('/petugas/listPengaduan', [PC::class, 'listPengaduan'])->name('petugas.listPengaduan');
        Route::get('/petugas/listSelesai', [PC::class, 'listSelesai'])->name('petugas.listSelesai');
        Route::patch('/petugas/proses/{id}', [PC::class, 'proses'])->name('petugas.proses');
        Route::get('/petugas/selesai/{id}', [PC::class, 'selesai'])->name('petugas.selesai');
    });

    Route::group(['middleware' => 'masyarakat'], function(){
        Route::get('/masyarakat/home', [MC::class, 'index'])->name('masyarakat.home');
        Route::get('/masyarakat/listPengaduan', [MC::class, 'listPengaduan'])->name('masyarakat.listPengaduan');
        Route::get('/masyarakat/add', [MC::class, 'create'])->name('masyarakat.create');
        Route::post('/masyarakat/store', [MC::class, 'store'])->name('masyarakat.store');
    });
});
