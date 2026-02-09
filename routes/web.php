<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes - Lalapan Cak Der Inventory
|--------------------------------------------------------------------------
*/

// --- GUEST ROUTES (Hanya untuk yang belum login) ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

// --- AUTH ROUTES (Proteksi Keamanan: Harus Login) ---
Route::middleware('auth')->group(function () {
    
    // 1. Dashboard / Beranda
    Route::get('/', [InventoryController::class, 'index'])->name('dashboard');
    
    // 2. Kelola Stok (Input Barang Masuk/Keluar)
    // Gunakan query parameter ?type=in atau ?type=out
    Route::get('/manage', [InventoryController::class, 'manage'])->name('manage');
    Route::post('/manage', [InventoryController::class, 'store'])->name('manage.store');
    
    // 3. Laporan & Riwayat Mutasi
    Route::get('/report', [InventoryController::class, 'report'])->name('report');
    
    // 4. Fitur Ekspor Excel (Fitur Baru)
    Route::get('/report/export', [InventoryController::class, 'exportExcel'])->name('report.export');
    
    // 5. Keamanan
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});