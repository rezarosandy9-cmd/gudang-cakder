<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        // Langkah 1: Bersihkan data lama agar tidak dobel atau nyampur
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Item::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Langkah 2: Masukkan Data Sesuai List Gambar (Total ~100+ Item)
        $items = [
            // --- KELOMPOK PROTEIN ---
            ['name' => 'AYAM', 'category' => 'AYAM', 'unit' => 'EKOR', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'BEBEK', 'category' => 'AYAM', 'unit' => 'EKOR', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'BURUNG DARA', 'category' => 'AYAM', 'unit' => 'EKOR', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'AYAM KAMPUNG', 'category' => 'AYAM', 'unit' => 'EKOR', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'LELE', 'category' => 'IKAN', 'unit' => 'EKOR', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'GURAMI', 'category' => 'IKAN', 'unit' => 'EKOR', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'MUJAIR', 'category' => 'IKAN', 'unit' => 'EKOR', 'location' => 'FREEZER', 'stock' => 0],
            
            // --- KELOMPOK SEAFOOD ---
            ['name' => 'KAKAP PUTIH', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'KAKAP MERAH', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'KERAPU', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'DORANG', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'PATIN', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'BARONANG', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'KUWE', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'AYAM AYAM', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'KACI KACI', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'BARAKUDA', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'EKOR KUNING', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'KERANG HIJAU', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'KERANG DARA', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'KERANG BAMBU', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'KERANG TAHU', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'KERANG SIMPING', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'CUMI CUMI', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'UDANG', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'KEPITING KECIL', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],
            ['name' => 'KEPITING BESAR', 'category' => 'SEAFOOD', 'unit' => 'KG', 'location' => 'FREEZER', 'stock' => 0],

            // --- KELOMPOK SAYUR & PELENGKAP ---
            ['name' => 'KOBIS', 'category' => 'SAYUR', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'TERONG', 'category' => 'SAYUR', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'TIMUN', 'category' => 'SAYUR', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'TAHU', 'category' => 'SAYUR', 'unit' => 'PCS', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'TEMPE', 'category' => 'SAYUR', 'unit' => 'PCS', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'KANGKUNG', 'category' => 'SAYUR', 'unit' => 'IKAT', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'TAOGE', 'category' => 'SAYUR', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'GENJER', 'category' => 'SAYUR', 'unit' => 'IKAT', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'BABY BUNCIS', 'category' => 'SAYUR', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'PAKCOY', 'category' => 'SAYUR', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'WORTEL', 'category' => 'SAYUR', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],

            // --- KELOMPOK BUMBU & BAHAN MASAK ---
            ['name' => 'CUMI ASIN', 'category' => 'BUMBU', 'unit' => 'KG', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'TELUR ASIN', 'category' => 'BUMBU', 'unit' => 'BUTIR', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'LOMBOK KECIL', 'category' => 'BUMBU', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'LOMBOK LALAP', 'category' => 'BUMBU', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'BAWANG MERAH', 'category' => 'BUMBU', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'BAWANG PUTIH', 'category' => 'BUMBU', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'KRITING IJO', 'category' => 'BUMBU', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'KRITING MERAH', 'category' => 'BUMBU', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'TOMAT', 'category' => 'BUMBU', 'unit' => 'KG', 'location' => 'DAPUR', 'stock' => 0],
            ['name' => 'GULA', 'category' => 'BUMBU', 'unit' => 'KG', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'GARAM KAPAL', 'category' => 'BUMBU', 'unit' => 'PACK', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'MEGGLE SACHET', 'category' => 'BUMBU', 'unit' => 'SACHET', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'ROYCO', 'category' => 'BUMBU', 'unit' => 'PACK', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'MICIN', 'category' => 'BUMBU', 'unit' => 'PACK', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'MENTE', 'category' => 'BUMBU', 'unit' => 'KG', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'WIJEN', 'category' => 'BUMBU', 'unit' => 'KG', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'TAUCO', 'category' => 'BUMBU', 'unit' => 'BOTOL', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'MINYAK WIJEN', 'category' => 'BUMBU', 'unit' => 'BOTOL', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'RAJA RASA', 'category' => 'BUMBU', 'unit' => 'BOTOL', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'KECAP IKAN', 'category' => 'BUMBU', 'unit' => 'BOTOL', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'TIRAM KALENG', 'category' => 'BUMBU', 'unit' => 'KALENG', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'SAOS INGGRIS', 'category' => 'BUMBU', 'unit' => 'BOTOL', 'location' => 'GUDANG', 'stock' => 0],
            
            // --- KELOMPOK NON-FOOD ---
            ['name' => 'TISSUE MEJA', 'category' => 'LAINNYA', 'unit' => 'PACK', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'DAUN PISANG', 'category' => 'LAINNYA', 'unit' => 'IKAT', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'KERTAS PRINT BESAR', 'category' => 'LAINNYA', 'unit' => 'ROLL', 'location' => 'GUDANG', 'stock' => 0],
            ['name' => 'KERTAS PRINT KECIL', 'category' => 'LAINNYA', 'unit' => 'ROLL', 'location' => 'GUDANG', 'stock' => 0],
        ];

        // Masukkan data baru
        Item::insert($items);

        $this->command->info('Database Lalapan Cak Der sudah DIBERSIHKAN dan diisi ulang sesuai list gambar!');
    }
}