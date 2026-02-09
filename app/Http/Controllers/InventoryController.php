<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Exports\TransactionsExport;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{
    /**
     * Menampilkan Dashboard (Ringkasan Stok)
     */
    public function index()
    {
        $lowStockItems = Item::where('stock', '<=', 5)->orderBy('stock', 'asc')->get();
        $todayTransactions = Transaction::whereDate('date', today())->count();
        $totalItems = Item::count();
        
        return view('dashboard', compact('lowStockItems', 'todayTransactions', 'totalItems'));
    }

    /**
     * Menampilkan Halaman Input Stok
     */
    public function manage(Request $request) 
    { 
        // Check if type is specified in query string (for different forms)
        $type = $request->query('type', 'in'); // default to 'in' (pemasukan)
        return view('manage', compact('type')); 
    }

    /**
     * Menyimpan Transaksi Masuk/Keluar
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|in:SAYUR,IKAN,AYAM,SEAFOOD,BUMBU',
            'unit'     => 'required|in:KG,EKOR,LITER,IKAT,BUNGKUS,PORSI',
            'type'     => 'required|in:in,out',
            'quantity' => 'required|numeric|min:0.1',
            'date'     => 'required|date',
        ]);

        // Cari barang berdasarkan nama, jika tidak ada maka buat baru
        $item = Item::firstOrCreate(
            ['name' => strtoupper($request->name)],
            [
                'category' => $request->category, 
                'unit'     => $request->unit, 
                'stock'    => 0,
                'location' => $request->location ?? 'GUDANG UTAMA'
            ]
        );

        // Jika barang sudah ada, update kategorinya agar tetap sinkron
        if (!$item->wasRecentlyCreated) {
            $item->update([
                'category' => $request->category, 
                'unit'     => $request->unit,
                'location' => $request->location ?? $item->location
            ]);
        }

        // Cek apakah stok cukup jika barang keluar
        if ($request->type == 'out' && $item->stock < $request->quantity) {
            return back()->with('error', "Stok {$item->name} sisa {$item->stock}, tidak cukup!");
        }

        // Update stok di tabel items
        $request->type == 'in' 
            ? $item->increment('stock', $request->quantity) 
            : $item->decrement('stock', $request->quantity);

        // Simpan catatan ke tabel transactions
        Transaction::create([
            'item_id'  => $item->id,
            'type'     => $request->type,
            'quantity' => $request->quantity,
            'date'     => $request->date,
        ]);

        return redirect()->route('report')->with('success', "Stok {$item->name} berhasil diperbarui!");
    }

    /**
     * Menampilkan Halaman Laporan Mutasi (Lengkap dengan Filter)
     */
    public function report(Request $request)
    {
        // Menangkap parameter filter dari URL
        $filter = $request->query('filter', 'all'); 
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        $search = $request->query('search');

        $query = Transaction::with('item');

        // Filter berdasarkan Status (Semua / Masuk / Keluar)
        if ($filter == 'in') {
            $query->where('type', 'in');
        } elseif ($filter == 'out') {
            $query->where('type', 'out');
        }

        // Filter berdasarkan Rentang Tanggal
        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        // Filter berdasarkan Search
        if ($search) {
            $query->whereHas('item', function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $transactions = $query->latest('date')->latest('created_at')->get();
        
        // Pastikan variabel 'filter' dikirim ke view untuk mencegah error Undefined Variable
        return view('report', compact('transactions', 'filter', 'startDate', 'endDate'));
    }

    /**
     * Menangani Ekspor Data ke Excel
     */
    public function exportExcel(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        return Excel::download(new TransactionsExport($startDate, $endDate), 'Laporan_Gudang_CakDer.xlsx');
    }
}