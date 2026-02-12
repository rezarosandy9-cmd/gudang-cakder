<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ResetTransaksiSeeder extends Seeder
{
    /**
     * Jalankan reset tabel transaksi dan id.
     */
    public function run(): void
    {
        // 1. Matikan pengecekan relasi agar tidak error saat dihapus
        Schema::disableForeignKeyConstraints();

        // 2. Kosongkan tabel transactions dan reset ID ke 1
        DB::table('transactions')->truncate();

        // 3. Opsional: Reset juga stok di tabel items agar kembali 0
        DB::table('items')->update(['stock' => 0]);

        // 4. Hidupkan kembali pengecekan relasi
        Schema::enableForeignKeyConstraints();
    }
}