<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionsExport;

class InventoryController extends Controller
{
    // Menampilkan Halaman Dashboard
    public function index() 
    { 
        return view('dashboard'); 
    }

    // Menampilkan Halaman Kelola Stok
    public function manage() 
    { 
        return view('manage'); 
    }

    // Logika Simpan Data (Masuk/Keluar)
    public function store(Request $request) 
    {
        $item = Item::firstOrCreate(
            ['name' => strtoupper($request->name)],
            [
                'category' => $request->category, 
                'unit' => $request->unit, 
                'location' => $request->location, 
                'stock' => 0
            ]
        );

        if ($request->type == 'in') {
            $item->increment('stock', $request->quantity);
        } else {
            if ($item->stock < $request->quantity) {
                return back()->with('error', "Stok tidak cukup!");
            }
            $item->decrement('stock', $request->quantity);
        }

        Transaction::create([
            'item_id' => $item->id,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'date' => $request->date
        ]);

        return redirect()->route('report')->with('success', "Data stok berhasil diperbarui!");
    }

    // Menampilkan Halaman Laporan dengan Filter
    public function report(Request $request) 
    {
        $query = Transaction::with('item');
        
        if ($request->filter == 'in') $query->where('type', 'in');
        if ($request->filter == 'out') $query->where('type', 'out');
        
        if ($request->search) {
            $query->whereHas('item', function($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            });
        }
        
        $transactions = $query->orderBy('id', 'asc')->get();
        return view('report', compact('transactions'));
    }

    // Fitur Export Excel dengan Filter Tanggal
    public function exportExcel(Request $request) 
    {
        // Mengambil tanggal dari input form
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        // Mengirim tanggal ke file Export
        return Excel::download(new TransactionsExport($startDate, $endDate), 'Laporan_Gudang_CakDer.xlsx');
    }
}