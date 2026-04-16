<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Transaction;
use App\Exports\TransactionsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB; // <--- Ini kunci utamanya

class InventoryController extends Controller
{
    /**
     * TAMPILAN WEB (BREAD & BUTTER)
     */
    public function index() { return view('dashboard'); }

    public function manage() 
    { 
        $items = Item::orderBy('name', 'asc')->get(); 
        return view('manage', compact('items')); 
    }

    public function store(Request $request) 
    {
        $itemName = strtoupper($request->name);
        $item = Item::firstOrCreate(
            ['name' => $itemName],
            [
                'category' => strtoupper($request->category), 
                'unit' => strtoupper($request->unit), 
                'location' => strtoupper($request->location), 
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

        return redirect()->route('report')->with('success', "Data berhasil diperbarui!");
    }

    public function report(Request $request) 
    {
        $query = Transaction::with('item');
        if ($request->filter == 'in') $query->where('type', 'in');
        if ($request->filter == 'out') $query->where('type', 'out');
        
        if ($request->search) {
            $search = $request->search;
            $query->whereHas('item', function($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', ["%" . strtolower($search) . "%"]);
            });
        }
        
        $transactions = $query->orderBy('id', 'desc')->get();
        return view('report', compact('transactions'));
    }

    public function exportExcel(Request $request) 
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        $fileName = 'Laporan_CakDer_' . date('Y-m-d') . '.xlsx';
        return Excel::download(new TransactionsExport($startDate, $endDate), $fileName);
    }

    // ============================================================
    // 🛡️ API JALUR TIKUS (ANTI-BCRYPT)
    // ============================================================

    public function apiLogin(Request $request)
    {
        /**
         * KUNCI KEBERHASILAN:
         * Kita menggunakan DB::select (SQL Murni). 
         * Laravel tidak akan pernah tahu kalau ini adalah proses login
         * sehingga dia tidak akan menjalankan pengecekan Bcrypt.
         */
        $user = DB::select("SELECT id, username FROM users WHERE username = ? AND password = ? LIMIT 1", [
            $request->u, // kita panggil 'u' dari C#
            $request->p  // kita panggil 'p' dari C#
        ]);

        if (!empty($user)) {
            return response()->json([
                'status' => 'success',
                'message' => 'Login Berhasil Cak!',
                'data' => $user[0]
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Username atau Password salah.'
        ], 401);
    }

    public function apiItems(Request $request)
    {
        $items = Item::orderBy('name', 'asc')->get();
        return response()->json(['status' => 'success', 'data' => $items]);
    }

    public function apiTransactions()
    {
        $transactions = Transaction::with('item')->orderBy('id', 'desc')->get();
        return response()->json(['status' => 'success', 'data' => $transactions]);
    }

    public function apiStoreTransaction(Request $request)
    {
        $item = Item::find($request->item_id);
        if (!$item) return response()->json(['status' => 'error'], 404);

        if ($request->type == 'in') {
            $item->increment('stock', $request->quantity);
        } else {
            $item->decrement('stock', $request->quantity);
        }

        $transaction = Transaction::create([
            'item_id' => $item->id,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'date' => $request->date
        ]);

        return response()->json(['status' => 'success', 'data' => $transaction], 201);
    }

    public function apiItemsWithTransactions()
    {
        $items = Item::with('transactions')->get();
        return response()->json(['status' => 'success', 'data' => $items]);
    }
}