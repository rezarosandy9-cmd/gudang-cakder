@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <nav class="bg-orange-500 sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4 group">
                    <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-inner transform group-hover:rotate-12 transition-transform duration-300">
                        <span class="text-orange-600 font-black text-lg">CD</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-white font-black italic text-xl tracking-tighter leading-none">LALAPAN SEAFOOD</span>
                        <span class="text-orange-100 text-[10px] font-bold uppercase tracking-[0.3em]">Cak Der Inventory</span>
                    </div>
                </div>
                
                <div class="hidden md:flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-white/10 hover:bg-white text-white hover:text-orange-600 rounded-xl text-xs font-black uppercase italic tracking-widest transition-all duration-300 border border-white/20">
                        Dashboard
                    </a>
                    <a href="{{ route('manage') }}" class="px-5 py-2.5 bg-white/10 hover:bg-white text-white hover:text-orange-600 rounded-xl text-xs font-black uppercase italic tracking-widest transition-all duration-300 border border-white/20">
                        Kelola Barang
                    </a>
                    <div class="h-6 w-[1px] bg-white/20 mx-2"></div>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl text-xs font-black uppercase italic tracking-widest transition-all duration-300 shadow-lg shadow-red-900/20">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-10">
            <div>
                <h2 class="text-4xl font-black text-gray-900 uppercase italic tracking-tighter leading-none">
                    {{ $filter == 'in' ? 'LOG BARANG MASUK' : ($filter == 'out' ? 'LOG BARANG KELUAR' : 'REKAPITULASI BARANG') }}
                </h2>
                <p class="text-orange-500 text-[10px] font-black uppercase tracking-[0.3em] mt-2">Arsip Data Inventaris Cak Der</p>
            </div>

            <div class="w-full md:w-auto">
                <form action="{{ route('report') }}" method="GET" class="relative group">
                    <input type="hidden" name="filter" value="{{ $filter }}">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Cari nama barang..."
                           class="w-full md:w-80 pl-6 pr-14 py-4 bg-white border-2 border-orange-100 rounded-2xl focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 outline-none transition-all font-bold text-gray-700 placeholder-gray-300 shadow-xl shadow-orange-900/5">
                    <button type="submit" class="absolute right-3 top-3 bg-orange-500 text-white p-2 rounded-xl hover:bg-orange-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-orange-900/5 overflow-hidden border border-orange-50">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-900">
                            <th class="px-8 py-6 text-[10px] font-black text-orange-400 uppercase tracking-[0.2em] italic">ID Ref</th>
                            <th class="px-8 py-6 text-[10px] font-black text-white uppercase tracking-[0.2em] italic">Nama Item</th>
                            <th class="px-8 py-6 text-[10px] font-black text-white uppercase tracking-[0.2em] italic text-center">Kategori</th>
                            <th class="px-8 py-6 text-[10px] font-black text-white uppercase tracking-[0.2em] italic text-center">Mutasi Stok</th>
                            <th class="px-8 py-6 text-[10px] font-black text-white uppercase tracking-[0.2em] italic">Lokasi</th>
                            <th class="px-8 py-6 text-[10px] font-black text-white uppercase tracking-[0.2em] italic">Waktu Catat</th>
                            @if($filter == 'in')
                            <th class="px-8 py-6 text-[10px] font-black text-orange-500 uppercase tracking-[0.2em] italic text-right text-center">Stok Gudang</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($transactions as $trx)
                        <tr class="hover:bg-orange-50 transition-colors group">
                            <td class="px-8 py-5 text-xs font-bold text-gray-400">#{{ str_pad($trx->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-8 py-5">
                                <span class="text-sm font-black text-gray-900 uppercase italic tracking-tight group-hover:text-orange-600 transition-colors">{{ $trx->item->name }}</span>
                            </td>
                            <td class="px-8 py-5 text-center">
                                <span class="px-3 py-1 bg-gray-100 text-gray-500 text-[9px] font-black uppercase rounded-lg tracking-widest">{{ $trx->item->category }}</span>
                            </td>
                            <td class="px-8 py-5 text-center">
                                <span class="text-sm font-black {{ $trx->type == 'in' ? 'text-green-600' : 'text-red-500' }}">
                                    {{ $trx->type == 'in' ? '+' : '-' }}{{ $trx->quantity }} {{ $trx->item->unit }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-xs font-bold text-gray-500 uppercase tracking-tighter">{{ $trx->item->location }}</td>
                            <td class="px-8 py-5 text-xs font-bold text-gray-400">{{ date('d M Y', strtotime($trx->date)) }}</td>
                            @if($filter == 'in')
                            <td class="px-8 py-5 text-right">
                                <span class="text-sm font-black text-gray-900 italic tracking-tighter">{{ $trx->item->stock }} {{ $trx->item->unit }}</span>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ $filter == 'in' ? '7' : '6' }}" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                    <p class="text-gray-400 text-xs font-black uppercase tracking-widest italic">Belum ada data terekam</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-12 flex flex-col md:flex-row justify-center items-center gap-4">
            <div class="bg-white p-2 rounded-2xl shadow-xl shadow-orange-900/5 flex gap-2 border border-gray-100">
                <a href="{{ route('report', ['filter' => 'all', 'start_date' => $startDate, 'end_date' => $endDate]) }}" 
                   class="px-8 py-3 rounded-xl text-[10px] font-black uppercase italic tracking-widest transition-all {{ $filter == 'all' ? 'bg-orange-500 text-white shadow-lg' : 'text-gray-400 hover:bg-gray-50' }}">
                    Semua Data
                </a>
                <a href="{{ route('report', ['filter' => 'in', 'start_date' => $startDate, 'end_date' => $endDate]) }}" 
                   class="px-8 py-3 rounded-xl text-[10px] font-black uppercase italic tracking-widest transition-all {{ $filter == 'in' ? 'bg-orange-500 text-white shadow-lg' : 'text-gray-400 hover:bg-gray-50' }}">
                    Masuk (+)
                </a>
                <a href="{{ route('report', ['filter' => 'out', 'start_date' => $startDate, 'end_date' => $endDate]) }}" 
                   class="px-8 py-3 rounded-xl text-[10px] font-black uppercase italic tracking-widest transition-all {{ $filter == 'out' ? 'bg-orange-500 text-white shadow-lg' : 'text-gray-400 hover:bg-gray-50' }}">
                    Keluar (-)
                </a>
            </div>

            <a href="{{ route('report.export', ['filter' => $filter, 'start_date' => $startDate, 'end_date' => $endDate]) }}" 
               class="px-8 py-4 bg-green-600 text-white rounded-2xl text-[10px] font-black uppercase italic tracking-[0.2em] hover:bg-green-700 transition-all shadow-xl shadow-green-900/20 flex items-center gap-2 group">
                <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Export Excel
            </a>
        </div>
    </div>
</div>
@endsection