<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Nama barang (Ayam, Beras, dll)
            $table->string('category');      // Kategori (Daging, Sembako, dll)
            $table->string('unit');          // Satuan (Kg, Ekor, Liter)
            $table->integer('stock')->default(0); // Stok total saat ini
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};