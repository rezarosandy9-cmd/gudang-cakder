<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Transaction::with('item')->get();
    }

    public function headings(): array
    {
        return ['ID Ref', 'Nama Barang', 'Tipe', 'Jumlah', 'Satuan', 'Tanggal'];
    }

    public function map($transaction): array
    {
        return [
            $transaction->id,
            $transaction->item->name,
            $transaction->type == 'in' ? 'Masuk' : 'Sisa Akhir',
            $transaction->quantity,
            $transaction->item->unit,
            $transaction->date,
        ];
    }
}