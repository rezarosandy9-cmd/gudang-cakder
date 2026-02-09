<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles; // Untuk Styling
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // Untuk kolom otomatis lebar
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionsExport implements FromQuery, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function query() {
        $query = Transaction::query()->with('item');
        if ($this->startDate && $this->endDate) {
            $query->whereBetween('date', [$this->startDate, $this->endDate]);
        }
        return $query;
    }

    public function headings(): array {
        return [
            ["LAPORAN MUTASI GUDANG LALAPAN CAK DER"], // Judul Besar
            ["Dicetak pada: " . date('d/m/Y H:i')],
            [], // Baris Kosong
            ["TANGGAL", "NAMA BAHAN BAKU", "KATEGORI", "VOLUME", "SATUAN", "STATUS MUTASI"]
        ];
    }

    public function map($trx): array {
        return [
            date('d-m-Y', strtotime($trx->date)),
            strtoupper($trx->item->name),
            $trx->item->category,
            $trx->quantity,
            $trx->item->unit,
            $trx->type == 'in' ? 'BARANG MASUK (+)' : 'BARANG KELUAR (-)',
        ];
    }

    // --- FITUR TEMPLATE / STYLING ---
    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk Judul di Baris 1
            1    => [
                'font' => ['bold' => true, 'size' => 16, 'color' => ['rgb' => 'EE4444']],
            ],
            // Style untuk Header Tabel di Baris 4
            4    => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'CC0000'] // Merah khas Cak Der
                ],
                'alignment' => ['horizontal' => 'center'],
            ],
            // Memberikan border ke seluruh sel yang ada datanya
            'A4:F' . ($sheet->getHighestRow()) => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ],
        ];
    }
}