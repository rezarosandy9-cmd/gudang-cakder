<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;

// =======================
// 🔐 AUTH (LOGIN API)
// =======================
// untuk login (POST)
Route::post('/login', [AuthController::class, 'apilogin']);

// untuk test API di browser
Route::get('/login-test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API berjalan'
    ]);
});

// =======================
// 📦 ITEMS
// =======================
Route::get('/items', [InventoryController::class, 'apiItems']);
Route::get('/items-transactions', [InventoryController::class, 'apiItemsWithTransactions']);

// =======================
// 📊 TRANSAKSI
// =======================
Route::get('/transactions', [InventoryController::class, 'apiTransactions']);
Route::post('/transactions', [InventoryController::class, 'apiStoreTransaction']);