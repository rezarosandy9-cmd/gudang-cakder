@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 pb-12">
    <nav class="bg-orange-500 sticky top-0 z-50 shadow-lg border-b border-orange-400">
        <div class="max-w-7xl mx-auto px-4 py-3 md:py-4 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
            <div class="flex items-center justify-between w-full md:w-auto">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-md">
                        <span class="text-orange-600 font-black text-sm">CD</span>
                    </div>
                    <div class="flex flex-col text-white font-black italic uppercase text-sm leading-none">
                        <span>LALAPAN <span class="text-yellow-400">CAK DER</span></span>
                        <span class="text-orange-100 text-[8px] font-bold tracking-widest mt-1 uppercase">Inventory System</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 overflow-x-auto">
                <a href="{{ route('dashboard') }}" class="px-4 py-2.5 rounded-xl text-[9px] font-black uppercase italic bg-orange-600/50 text-white border border-white/10 whitespace-nowrap">Dashboard</a>
                <a href="{{ route('manage') }}" class="px-4 py-2.5 rounded-xl text-[9px] font-black uppercase italic bg-orange-600/50 text-white border border-white/10 whitespace-nowrap">Kelola Barang</a>
                <a href="{{ route('report') }}" class="px-4 py-2.5 rounded-xl text-[9px] font-black uppercase italic bg-white text-orange-600 shadow-md whitespace-nowrap">Laporan Barang</a>
                <form action="{{ route('logout') }}" method="POST">@csrf <button type="submit" class="ml-2 px-5 py-2.5 bg-red-600 text-white rounded-xl text-[9px] font-black italic shadow-lg">Log Out</button></form>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-8">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-6 mb-8">
            <div class="space-y-1">
                <h2 class="text-3xl md:text-5xl font-black text-gray-900 uppercase italic tracking-tighter leading-none">REKAPITULASI</h2>
                <p class="text-orange-500 text-[10px] font-black uppercase tracking-[0.3em] italic">Database Operasional Gudang</p>
            </div>

            <form action="{{ route('report.export') }}" method="GET" class="flex flex-wrap items-end gap-3 bg-white p-4 rounded-[2rem] shadow-xl border border-orange-50 w-full lg:w-auto">
                <div class="flex flex-col gap-1.5 flex-1 sm:flex-none">
                    <label class="text-[8px] font-black uppercase text-gray-400 italic px-2">Dari Tanggal</label>
                    <input type="date" name="start_date" class="bg-gray-50 border-2 border-gray-100 rounded-xl text-[10px] font-bold p-2.5 focus:border-orange-500 focus:ring-0 outline-none transition-all">
                </div>
                <div class="flex flex-col gap-1.5 flex-1 sm:flex-none">
                    <label class="text-[8px] font-black uppercase text-gray-400 italic px-2">Sampai Tanggal</label>
                    <input type="date" name="end_date" class="bg-gray-50 border-2 border-gray-100 rounded-xl text-[10px] font-bold p-2.5 focus:border-orange-500 focus:ring-0 outline-none transition-all">
                </div>
                <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-xl font-black uppercase italic text-[10px] shadow-lg hover:bg-green-700 transition-all flex items-center gap-2 flex-1 sm:flex-none justify-center">
                    📊 UNDUH EXCEL
                </button>
            </form>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
            <div class="flex gap-2 p-1.5 bg-gray-200/50 w-fit rounded-2xl border border-gray-200">
                <a href="{{ route('report', ['filter' => 'all']) }}" class="px-6 py-2.5 rounded-xl text-[9px] font-black uppercase italic {{ request('filter', 'all') == 'all' ? 'bg-white text-orange-600 shadow-md' : 'text-gray-400' }}">SEMUA</a>
                <a href="{{ route('report', ['filter' => 'in']) }}" class="px-6 py-2.5 rounded-xl text-[9px] font-black uppercase italic {{ request('filter') == 'in' ? 'bg-orange-500 text-white shadow-md' : 'text-gray-400' }}">MASUK (+)</a>
                <a href="{{ route('report', ['filter' => 'out']) }}" class="px-6 py-2.5 rounded-xl text-[9px] font-black uppercase italic {{ request('filter') == 'out' ? 'bg-orange-500 text-white shadow-md' : 'text-gray-400' }}">SISA (-)</a>
            </div>

            <form action="{{ route('report') }}" method="GET" class="relative group w-full md:w-80">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama barang..." class="w-full pl-5 pr-12 py-3.5 bg-white border-2 border-orange-100 rounded-2xl outline-none font-bold text-gray-700 shadow-lg text-xs">
                <button type="submit" class="absolute right-2 top-2 bg-orange-500 text-white p-2 rounded-xl">🔎</button>
            </form>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl border border-orange-50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left min-w-[1000px]">
                    <thead class="bg-gray-900 text-white text-[10px] font-black uppercase italic tracking-widest">
                        <tr>
                            <th class="px-8 py-6">ID Ref</th>
                            <th class="px-8 py-6">Kategori</th>
                            <th class="px-8 py-6">Nama Barang</th>
                            <th class="px-8 py-6 text-center">Lokasi</th> <th class="px-8 py-6 text-center">Mutasi</th>
                            <th class="px-8 py-6 text-center">Total Stok</th>
                            <th class="px-8 py-6 text-right">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 font-bold uppercase italic text-xs">
                        @php
                            $itemBalances = [];
                            foreach($transactions as $t) {
                                if(!isset($itemBalances[$t->item_id])) $itemBalances[$t->item_id] = 0;
                                $t->type == 'in' ? $itemBalances[$t->item_id] += $t->quantity : $itemBalances[$t->item_id] -= $t->quantity;
                                $t->running_balance = $itemBalances[$t->item_id];
                            }
                            $displayData = $transactions->reverse();
                        @endphp

                        @forelse($displayData as $trx)
                        <tr class="hover:bg-orange-50 transition-colors">
                            <td class="px-8 py-5 text-gray-400 italic">#{{ str_pad($trx->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-8 py-5"><span class="text-[10px] text-gray-500 border-b-2 border-orange-200">{{ $trx->item->category }}</span></td>
                            <td class="px-8 py-5 text-gray-900">{{ $trx->item->name }}</td>
                            
                            <td class="px-8 py-5 text-center text-orange-600 font-black">
                                {{ $trx->item->location ?? 'BELUM DIATUR' }}
                            </td>

                            <td class="px-8 py-5 text-center {{ $trx->type == 'in' ? 'text-green-600' : 'text-red-500' }}">
                                {{ $trx->type == 'in' ? '+' : '-' }}{{ $trx->quantity }} {{ $trx->item->unit }}
                            </td>
                            <td class="px-8 py-5 text-center">
                                <span class="bg-gray-900 text-yellow-400 px-4 py-1.5 rounded-full shadow-inner">
                                    {{ $trx->running_balance }} {{ $trx->item->unit }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-right text-gray-400">{{ date('d/m/Y', strtotime($trx->date)) }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="7" class="py-24 text-center text-gray-300 italic uppercase tracking-[0.3em]">Data Kosong</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection