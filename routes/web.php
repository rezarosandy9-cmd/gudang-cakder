<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Rute Login & Auth
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute Utama (Hanya bisa diakses jika sudah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/', [InventoryController::class, 'index'])->name('dashboard');
    
    // Kelola Barang (Pemasukan & Sisa Akhir)
    Route::get('/manage', [InventoryController::class, 'manage'])->name('manage');
    Route::post('/manage', [InventoryController::class, 'store'])->name('manage.store');
    
    // Laporan & Export
    Route::get('/report', [InventoryController::class, 'report'])->name('report');
    Route::get('/report/export', [InventoryController::class, 'exportExcel'])->name('report.export');
    
    // FITUR BARU: Arsip Data
    Route::post('/report/archive', [InventoryController::class, 'archiveData'])->name('report.archive');
});