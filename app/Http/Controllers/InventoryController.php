<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionsExport;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function index() 
    { 
        return view('dashboard'); 
    }

    // REVISI: Mengirim data semua barang ke halaman manage
    public function manage() 
    { 
        $items = Item::all(); // Mengambil semua daftar barang untuk select option
        return view('manage', compact('items')); 
    }

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

    public function exportExcel(Request $request) 
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        return Excel::download(new TransactionsExport($startDate, $endDate), 'Laporan_Gudang_CakDer.xlsx');
    }

    // TAMBAHAN: Fungsi untuk ditarik ke aplikasi Desktop Visual Studio
    public function apiItems()
{
    $items = Item::all();

    return response()->json([
        'status' => 'success',
        'message' => 'Data barang berhasil diambil',
        'data' => $items
    ], 200);
}

public function apiItemsWithTransactions()
{
    $items = Item::with('transactions')->get();

    return response()->json([
        'status' => 'success',
        'data' => $items
    ], 200);
}

public function apiTransactions()
{
    $transactions = Transaction::with('item')->get();

    return response()->json([
        'status' => 'success',
        'data' => $transactions
    ], 200);
}

public function apiStoreTransaction(Request $request)
{
    $item = Item::find($request->item_id);

    if (!$item) {
        return response()->json([
            'status' => 'error',
            'message' => 'Barang tidak ditemukan'
        ], 404);
    }

    if ($request->type == 'in') {
        $item->increment('stock', $request->quantity);
    } else {
        if ($item->stock < $request->quantity) {
            return response()->json([
                'status' => 'error',
                'message' => 'Stok tidak cukup'
            ], 400);
        }

        $item->decrement('stock', $request->quantity);
    }

    $transaction = Transaction::create([
        'item_id' => $item->id,
        'type' => $request->type,
        'quantity' => $request->quantity,
        'date' => $request->date
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Transaksi berhasil',
        'data' => $transaction
    ], 201);
}

public function apiLogin(Request $request)
{
    $user = DB::table('users')
        ->where('username', $request->username)
        ->where('password', $request->password)
        ->first();

    if ($user) {
        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 200);
    }

    return response()->json([
        'status' => 'error',
        'message' => 'Username atau password salah'
    ], 401);
}

}