<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\KatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard / Katalog Buku untuk Siswa (User)
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {

    Route::get('/dashboard', [KatalogController::class, 'index'])
        ->name('dashboard');

    Route::post('/dashboard/pinjam', [KatalogController::class, 'store'])
        ->name('user.pinjam');

});

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Admin
    Route::get('/admin/dashboard', function () {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.dashboard');
    })->name('admin.dashboard');

    // CRUD Buku
    Route::resource('/admin/buku', BukuController::class, [
        'as' => 'admin'
    ]);

    // CRUD Peminjaman
    Route::resource('/admin/peminjaman', PeminjamanController::class, [
        'as' => 'admin'
    ]);

    // CRUD User
    Route::resource('/admin/user', UserController::class, [
        'as' => 'admin'
    ]);

    // Pengembalian Buku
    Route::patch(
        '/admin/peminjaman/{peminjaman}/kembali',
        [PeminjamanController::class, 'updateStatus']
    )->name('admin.peminjaman.kembali');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';