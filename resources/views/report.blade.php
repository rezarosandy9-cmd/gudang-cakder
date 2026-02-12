@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 pb-12">
    <nav class="bg-orange-500 sticky top-0 z-50 shadow-lg border-b border-orange-400">
        <div class="max-w-7xl mx-auto px-4 py-3 md:py-4">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                
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
                    
                    <form action="{{ route('logout') }}" method="POST" class="md:hidden">
                        @csrf 
                        <button class="bg-red-600 px-3 py-2 rounded-lg text-[9px] font-black uppercase text-white shadow-md">OUT</button>
                    </form>
                </div>

                <div class="flex items-center justify-end gap-2 overflow-x-auto pb-2 md:pb-0">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2.5 rounded-xl text-[9px] font-black uppercase italic tracking-widest bg-orange-600/50 text-white border border-white/10 whitespace-nowrap hover:bg-orange-400">Dashboard</a>
                    <a href="{{ route('manage') }}" class="px-4 py-2.5 rounded-xl text-[9px] font-black uppercase italic tracking-widest bg-orange-600/50 text-white border border-white/10 whitespace-nowrap hover:bg-orange-400">Kelola Barang</a>
                    <a href="{{ route('report') }}" class="px-4 py-2.5 rounded-xl text-[9px] font-black uppercase italic tracking-widest bg-white text-orange-600 shadow-md whitespace-nowrap">Laporan Barang</a>
                    
                    <form action="{{ route('logout') }}" method="POST" class="hidden md:block">
                        @csrf 
                        <button type="submit" class="ml-2 px-5 py-2.5 bg-red-600 text-white rounded-xl text-[9px] font-black uppercase italic shadow-lg hover:bg-red-700 transition-all">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-8">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-6 mb-8">
            <div class="space-y-1">
                <h2 class="text-3xl md:text-5xl font-black text-gray-900 uppercase italic tracking-tighter leading-none">REKAPITULASI</h2>
                <p class="text-orange-500 text-[10px] font-black uppercase tracking-[0.3em] italic">Database Arsip & Lokasi Gudang</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                <form action="{{ route('report') }}" method="GET" class="relative group flex-1 sm:w-80">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama barang..." 
                           class="w-full pl-5 pr-12 py-3.5 bg-white border-2 border-orange-100 rounded-2xl focus:border-orange-500 outline-none font-bold text-gray-700 shadow-lg shadow-orange-900/5 transition-all text-xs">
                    <button type="submit" class="absolute right-2 top-2 bg-orange-500 text-white p-2 rounded-xl hover:bg-orange-600">🔎</button>
                </form>
                
                <a href="{{ route('report.export') }}" class="bg-green-600 text-white px-6 py-3.5 rounded-2xl font-black uppercase italic text-[10px] shadow-xl shadow-green-900/20 hover:bg-green-700 flex items-center justify-center gap-2">
                    <span>Export Excel</span>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl border border-orange-50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left min-w-[1000px]">
                    <thead class="bg-gray-900 text-white text-[10px] font-black uppercase italic tracking-widest">
                        <tr>
                            <th class="px-8 py-6">ID Ref</th>
                            <th class="px-8 py-6">Nama Barang</th>
                            <th class="px-8 py-6 text-center">Tempat Simpan</th>
                            <th class="px-8 py-6 text-center">Mutasi</th>
                            <th class="px-8 py-6 text-center">Total Stok (Akumulasi)</th>
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
                            <td class="px-8 py-5 text-gray-400 font-medium italic">#{{ str_pad($trx->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-8 py-5 text-gray-900">{{ $trx->item->name }}</td>
                            <td class="px-8 py-5 text-center">
                                <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-lg text-[9px] border border-orange-200 uppercase">
                                    {{ $trx->item->location }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-center {{ $trx->type == 'in' ? 'text-green-600' : 'text-red-500' }}">
                                {{ $trx->type == 'in' ? '+' : '-' }}{{ $trx->quantity }} {{ $trx->item->unit }}
                            </td>
                            <td class="px-8 py-5 text-center">
                                <span class="bg-gray-900 text-yellow-400 px-4 py-1.5 rounded-full shadow-inner">
                                    {{ $trx->running_balance }} {{ $trx->item->unit }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-right text-gray-400 font-medium">{{ date('d/m/Y', strtotime($trx->date)) }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="py-24 text-center text-gray-300 italic uppercase tracking-[0.3em]">Data Kosong</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection