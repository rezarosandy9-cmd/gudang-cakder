<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel items agar tidak double/bentrok
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Item::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $items = [
            // UNGGAS & IKAN AIR TAWAR
            ['name' => 'Ayam', 'category' => 'UNGGAS'],
            ['name' => 'Bebek', 'category' => 'UNGGAS'],
            ['name' => 'Burung Dara', 'category' => 'UNGGAS'],
            ['name' => 'Ayam Kampung', 'category' => 'UNGGAS'],
            ['name' => 'Lele', 'category' => 'IKAN AIR TAWAR'],
            ['name' => 'Gurami', 'category' => 'IKAN AIR TAWAR'],
            ['name' => 'Mujair', 'category' => 'IKAN AIR TAWAR'],

            // IKAN LAUT
            ['name' => 'Kakap Putih', 'category' => 'IKAN LAUT'],
            ['name' => 'Kakap Merah', 'category' => 'IKAN LAUT'],
            ['name' => 'Kerapu', 'category' => 'IKAN LAUT'],
            ['name' => 'Dorang', 'category' => 'IKAN LAUT'],
            ['name' => 'Patin', 'category' => 'IKAN LAUT'],
            ['name' => 'Baronang', 'category' => 'IKAN LAUT'],
            ['name' => 'Kuwe', 'category' => 'IKAN LAUT'],
            ['name' => 'Ayam Ayam', 'category' => 'IKAN LAUT'],
            ['name' => 'Kaci Kaci', 'category' => 'IKAN LAUT'],
            ['name' => 'Barakuda', 'category' => 'IKAN LAUT'],
            ['name' => 'Ekor Kuning', 'category' => 'IKAN LAUT'],
            ['name' => 'pe', 'category' => 'IKAN LAUT'],

            // SEAFOOD (Lengkap dengan ukuran Kepiting)
            ['name' => 'Kerang Hijau', 'category' => 'SEAFOOD'],
            ['name' => 'Kerang Dara', 'category' => 'SEAFOOD'],
            ['name' => 'Kerang Bambu', 'category' => 'SEAFOOD'],
            ['name' => 'Kerang Tahu', 'category' => 'SEAFOOD'],
            ['name' => 'Kerang Simping', 'category' => 'SEAFOOD'],
            ['name' => 'Cumi Cumi', 'category' => 'SEAFOOD'],
            ['name' => 'Kepiting Kecil', 'category' => 'SEAFOOD'],
            ['name' => 'Kepiting Besar 150', 'category' => 'SEAFOOD'],
            ['name' => 'Kepiting Besar 175', 'category' => 'SEAFOOD'],
            ['name' => 'Kepiting Besar 200', 'category' => 'SEAFOOD'],
            ['name' => 'Kepiting Besar 250', 'category' => 'SEAFOOD'],
            ['name' => 'Kepiting Besar 300', 'category' => 'SEAFOOD'],
            ['name' => 'Kepiting Besar 350', 'category' => 'SEAFOOD'],
            ['name' => 'Kepiting Besar 400', 'category' => 'SEAFOOD'],

            // BUMBU, SAYUR & LAIN-LAIN
            ['name' => 'Pete', 'category' => 'SAYUR'],
            ['name' => 'Aqua', 'category' => 'MINUMAN'],
            ['name' => 'Saos Inggris', 'category' => 'BUMBU'],
            ['name' => 'Gula', 'category' => 'BUMBU'],
            ['name' => 'Garam Kapal', 'category' => 'BUMBU'],
            ['name' => 'Garam Grasak', 'category' => 'BUMBU'],
            ['name' => 'Micin', 'category' => 'BUMBU'],
            ['name' => 'Royco', 'category' => 'BUMBU'],
            ['name' => 'Meggie Sachet', 'category' => 'BUMBU'],
            ['name' => 'Pakcoy', 'category' => 'SAYUR'],
            ['name' => 'Tauge', 'category' => 'SAYUR'],
            ['name' => 'Genjer', 'category' => 'SAYUR'],
            ['name' => 'Baby Buncis', 'category' => 'SAYUR'],
            ['name' => 'Nanas', 'category' => 'BUAH'],
            ['name' => 'Kangkung', 'category' => 'SAYUR'],
            ['name' => 'Tahu', 'category' => 'BAHAN'],
            ['name' => 'Tempe', 'category' => 'BAHAN'],
            ['name' => 'Kubis', 'category' => 'SAYUR'],
            ['name' => 'Terong', 'category' => 'SAYUR'],
            ['name' => 'Selada Air', 'category' => 'SAYUR'],
            ['name' => 'Jeruk nipis', 'category' => 'BUMBU'],
            ['name' => 'Jeruk Sambal', 'category' => 'BUMBU'],
            ['name' => 'wijen', 'category' => 'BUMBU'],
            ['name' => 'Mente', 'category' => 'BUMBU'],
            ['name' => 'Gerabah Belah', 'category' => 'IKAN ASIN'],
            ['name' => 'Klotok', 'category' => 'IKAN ASIN'],
            ['name' => 'Cumi Asin', 'category' => 'IKAN ASIN'],
            ['name' => 'Telur Asin', 'category' => 'BAHAN'],
            ['name' => 'Lombok Kecil', 'category' => 'BUMBU'],
            ['name' => 'Lombok Lalap', 'category' => 'BUMBU'],
            ['name' => 'Bawang Merah', 'category' => 'BUMBU'],
            ['name' => 'Bawang Putih', 'category' => 'BUMBU'],
            ['name' => 'Kriting Ijo', 'category' => 'BUMBU'],
            ['name' => 'Kriting Merah', 'category' => 'BUMBU'],
            ['name' => 'Tomat', 'category' => 'BUMBU'],
            ['name' => 'Timun', 'category' => 'SAYUR'],
            ['name' => 'Minya Wijen', 'category' => 'BUMBU'],
            ['name' => 'Rajarasa', 'category' => 'BUMBU'],
            ['name' => 'Butter', 'category' => 'BUMBU'],
            ['name' => 'Kacang Tanah', 'category' => 'BUMBU'],
            ['name' => 'Kecap Ikan', 'category' => 'BUMBU'],
            ['name' => 'Brambang goreng', 'category' => 'BUMBU'],
            ['name' => 'Tiram Kaleng', 'category' => 'BUMBU'],
            ['name' => 'Merica Halus', 'category' => 'BUMBU'],
            ['name' => 'Sereh', 'category' => 'BUMBU'],
            ['name' => 'Kunir', 'category' => 'BUMBU'],
            ['name' => 'Jahe', 'category' => 'BUMBU'],
            ['name' => 'Lengkuas', 'category' => 'BUMBU'],
            ['name' => 'Bumbu Asap(Per Biji)', 'category' => 'BUMBU'],
            ['name' => 'Bumbu Bakar(Per Biji)', 'category' => 'BUMBU'],
            ['name' => 'Bumbu Seafood', 'category' => 'BUMBU'],
            ['name' => 'Terasi', 'category' => 'BUMBU'],
            ['name' => 'Delmonte Tomat', 'category' => 'BUMBU'],
            ['name' => 'Delmonte Sambal', 'category' => 'BUMBU'],
            ['name' => 'Belibis Tomat', 'category' => 'BUMBU'],
            ['name' => 'Wortel', 'category' => 'SAYUR'],
            ['name' => 'Daun Pisang', 'category' => 'LOGISTIK'],
            ['name' => 'Tissue Meja', 'category' => 'LOGISTIK'],
            ['name' => 'Kertas Print Besar', 'category' => 'LOGISTIK'],
            ['name' => 'Kertas Print Kecil', 'category' => 'LOGISTIK'],
            ['name' => 'Tepung Terigu', 'category' => 'BAHAN'],
            ['name' => 'Tepung Beras', 'category' => 'BAHAN'],
            ['name' => 'Tepung Kanji', 'category' => 'BAHAN'],
            ['name' => 'Pasta Tomyum', 'category' => 'BUMBU'],
            ['name' => 'Kecombrang', 'category' => 'BUMBU'],
            ['name' => 'Udang Eby', 'category' => 'SEAFOOD'],
            ['name' => 'Mayonnaise', 'category' => 'BUMBU'],
            ['name' => 'Juhi (Biji)', 'category' => 'SEAFOOD'],
            ['name' => 'Kayu Manis', 'category' => 'BUMBU'],
            ['name' => 'Daun Prei (Gram)', 'category' => 'BUMBU'],
            ['name' => 'Bombay (gram)', 'category' => 'BUMBU'],
            ['name' => 'Keripik Usus', 'category' => 'LAIN'],
            ['name' => 'Tomat Hiaju', 'category' => 'BUMBU'],
            ['name' => 'Kaldu Ayam', 'category' => 'BUMBU'],
        ];

        foreach ($items as $item) {
            Item::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}