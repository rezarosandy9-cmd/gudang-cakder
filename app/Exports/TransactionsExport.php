<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    protected $startDate;
    protected $endDate;

    // Menangkap data tanggal dari Controller
    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        $query = Transaction::with('item');

        // Jika user memilih tanggal, filter datanya
        if ($this->startDate && $this->endDate) {
            $query->whereBetween('date', [$this->startDate, $this->endDate]);
        }

        return $query->orderBy('date', 'desc')->get();
    }

    public function headings(): array
    {
        $periode = ($this->startDate && $this->endDate) 
                   ? date('d/m/Y', strtotime($this->startDate)) . ' s/d ' . date('d/m/Y', strtotime($this->endDate)) 
                   : 'Semua Periode';

        return [
            ['LAPORAN INVENTARIS GUDANG - LALAPAN CAK DER'],
            ['Periode: ' . $periode],
            [],
            ['NO', 'TANGGAL', 'KATEGORI', 'NAMA BARANG', 'STATUS', 'JUMLAH', 'SATUAN']
        ];
    }

    public function map($trx): array
    {
        static $no = 1;
        return [
            $no++,
            date('d/m/Y', strtotime($trx->date)),
            strtoupper($trx->item->category),
            strtoupper($trx->item->name),
            $trx->type == 'in' ? 'MASUK' : 'KELUAR',
            $trx->quantity,
            strtoupper($trx->item->unit),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 16, 'color' => ['rgb' => 'EA580C']]],
            4 => ['font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']], 'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '111827']]],
        ];
    }
}