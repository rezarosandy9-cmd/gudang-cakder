<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

/*
|--------------------------------------------------------------------------
| API Routes - Project Lalapan Cak Der
|--------------------------------------------------------------------------
|
| Semua route di sini otomatis memiliki awalan /api
| Contoh: http://127.0.0.1:8000/api/masuk-api
|
*/

// ==========================================
// 🔑 LOGIN API (JALUR KHUSUS C#)
// ==========================================
// Pakai nama 'auth-cakder' supaya tidak dicegat sistem Bcrypt bawaan
Route::post('auth-cakder', [App\Http\Controllers\InventoryController::class, 'apiLogin']);

// ==========================================
// 📦 DATA BARANG (DROP DOWN C#)
// ==========================================
Route::get('/items', [InventoryController::class, 'apiItems']);
Route::get('/items-transactions', [InventoryController::class, 'apiItemsWithTransactions']);

// ==========================================
// 📝 TRANSAKSI (INPUT & LIST C#)
// ==========================================
Route::get('/transactions', [InventoryController::class, 'apiTransactions']);
Route::post('/transactions', [InventoryController::class, 'apiStoreTransaction']);

// ==========================================
// 📊 EXPORT EXCEL (TOMBOL DOWNLOAD C#)
// ==========================================
Route::get('/export-excel', [InventoryController::class, 'exportExcel']);