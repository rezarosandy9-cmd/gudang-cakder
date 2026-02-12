<?php

namespace App\Http\Controllers;

use App\Models\{Item, Transaction};
use Illuminate\Http\Request;
use App\Exports\TransactionsExport;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{
    public function index() {
        return view('dashboard');
    }

    public function manage() {
        return view('manage');
    }

    public function store(Request $request) {
        $item = Item::firstOrCreate(
            ['name' => strtoupper($request->name)],
            ['category' => $request->category, 'unit' => $request->unit, 'location' => $request->location, 'stock' => 0]
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

        return redirect()->route('report')->with('success', "Data Berhasil Disimpan!");
    }

    public function report(Request $request) {
        $filter = $request->query('filter', 'all');
        $search = $request->query('search');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $query = Transaction::with('item');

        if ($filter == 'in') $query->where('type', 'in');
        if ($filter == 'out') $query->where('type', 'out');
        if ($search) {
            $query->whereHas('item', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }
        if ($startDate && $endDate) $query->whereBetween('date', [$startDate, $endDate]);

        // Ambil data dari ID terkecil agar perhitungan saldo benar
        $transactions = $query->orderBy('id', 'asc')->get();
        
        return view('report', compact('transactions', 'filter', 'startDate', 'endDate'));
    }

    // INI SOLUSI UNTUK GAMBAR ERROR NO 3
    public function exportExcel(Request $request) {
        return Excel::download(new TransactionsExport($request->start_date, $request->end_date), 'Laporan_Lalapan_CakDer.xlsx');
    }
}