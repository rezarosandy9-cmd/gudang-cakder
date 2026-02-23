<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// --- AUTENTIKASI ---
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- OPERASIONAL GUDANG ---
Route::middleware(['auth'])->group(function () {
    // Dashboard Utama
    Route::get('/', [InventoryController::class, 'index'])->name('dashboard');
    
    // Kelola Barang (Input Stok)
    Route::get('/manage', [InventoryController::class, 'manage'])->name('manage');
    Route::post('/manage', [InventoryController::class, 'store'])->name('manage.store');
    
    // Laporan Real-Time & Export Excel
    Route::get('/report', [InventoryController::class, 'report'])->name('report');
    Route::get('/report/export', [InventoryController::class, 'exportExcel'])->name('report.export');
});