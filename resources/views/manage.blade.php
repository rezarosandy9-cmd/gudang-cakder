@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 pb-12">
    <nav class="bg-orange-500 sticky top-0 z-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 py-3 md:py-4">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
            
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-md transform group-hover:rotate-12 transition-transform">
                        <span class="text-orange-600 font-black text-sm">CD</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-white font-black italic text-base tracking-tighter leading-none uppercase">Lalapan Cak Der</span>
                        <span class="text-orange-100 text-[8px] font-bold uppercase tracking-widest">Inventory System</span>
                    </div>
                </div>
                
                <form action="{{ route('logout') }}" method="POST" class="md:hidden">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-3 py-2 rounded-lg text-[9px] font-black uppercase italic shadow-md">
                        OUT
                    </button>
                </form>
            </div>

            <div class="flex items-center justify-end gap-2 overflow-x-auto pb-2 md:pb-0">
                <a href="{{ route('dashboard') }}" 
                   class="px-4 py-2.5 rounded-xl text-[9px] font-black uppercase italic tracking-widest transition-all whitespace-nowrap {{ request()->routeIs('dashboard') ? 'bg-white text-orange-600 shadow-md' : 'bg-orange-600/50 text-white border border-white/10 hover:bg-orange-400' }}">
                    Dashboard
                </a>
                <a href="{{ route('manage') }}" 
                   class="px-4 py-2.5 rounded-xl text-[9px] font-black uppercase italic tracking-widest transition-all whitespace-nowrap {{ request()->routeIs('manage') ? 'bg-white text-orange-600 shadow-md' : 'bg-orange-600/50 text-white border border-white/10 hover:bg-orange-400' }}">
                    Kelola Barang
                </a>
                <a href="{{ route('report') }}" 
                   class="px-4 py-2.5 rounded-xl text-[9px] font-black uppercase italic tracking-widest transition-all whitespace-nowrap {{ request()->routeIs('report') ? 'bg-white text-orange-600 shadow-md' : 'bg-orange-600/50 text-white border border-white/10 hover:bg-orange-400' }}">
                    Laporan Barang
                </a>
                
                <form action="{{ route('logout') }}" method="POST" class="hidden md:block">
                    @csrf
                    <button type="submit" class="ml-2 px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl text-[9px] font-black uppercase italic tracking-widest transition-all shadow-lg shadow-red-900/20">
                        Log Out
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>

    <div class="max-w-2xl mx-auto px-4 py-8">
        <div class="flex gap-2 mb-6">
            <a href="{{ route('manage') }}?type=in" class="flex-1 py-3 text-center rounded-xl font-black text-[10px] uppercase italic {{ request('type', 'in') == 'in' ? 'bg-orange-500 text-white shadow-lg' : 'bg-white text-gray-400 border' }}">Pemasukan (+)</a>
            <a href="{{ route('manage') }}?type=out" class="flex-1 py-3 text-center rounded-xl font-black text-[10px] uppercase italic {{ request('type') == 'out' ? 'bg-orange-500 text-white shadow-lg' : 'bg-white text-gray-400 border' }}">Sisa Akhir (-)</a>
        </div>

        <div class="bg-white rounded-[2rem] shadow-2xl border border-gray-50 overflow-hidden">
            <div class="bg-gray-50 border-b p-6 text-center font-black">
                <h2 class="text-xl md:text-2xl uppercase italic tracking-tighter">{{ request('type', 'in') == 'in' ? 'Pencatatan Barang Masuk' : 'Update Sisa Akhir Barang' }}</h2>
            </div>
            <form action="{{ route('manage.store') }}" method="POST" class="p-6 md:p-8 space-y-6">
                @csrf
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase italic mb-2">Nama Barang :</label>
                    <input type="text" name="name" required class="w-full px-5 py-4 bg-gray-50 border rounded-2xl outline-none focus:border-orange-500 font-bold uppercase">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase italic mb-2">Kategori :</label>
                        <select name="category" required class="w-full px-5 py-4 bg-gray-50 border rounded-2xl font-bold uppercase outline-none">
                            <option value="SEAFOOD">SEAFOOD</option>
                            <option value="SAYUR">SAYUR</option>
                            <option value="IKAN">IKAN</option>
                            <option value="AYAM">AYAM</option>
                            <option value="BUMBU">BUMBU</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase italic mb-2">Satuan :</label>
                        <select name="unit" id="unit-select" required class="w-full px-5 py-4 bg-gray-50 border rounded-2xl font-bold uppercase outline-none">
                            <option value="KG">KG</option><option value="EKOR">EKOR</option><option value="PORSI">PORSI</option><option value="LITER">LITER</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase italic mb-2">Lokasi :</label>
                    <select name="location" required class="w-full px-5 py-4 bg-gray-50 border rounded-2xl font-bold uppercase outline-none">
                        <option value="GUDANG UTAMA">GUDANG UTAMA</option><option value="FREEZER">FREEZER</option><option value="DAPUR">DAPUR</option>
                    </select>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase italic mb-2">Jumlah :</label>
                        <input type="number" name="quantity" required step="any" class="w-full px-5 py-4 bg-orange-50 border rounded-2xl font-black text-orange-600 text-center text-2xl">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase italic mb-2">Tanggal :</label>
                        <input type="date" name="date" value="{{ date('Y-m-d') }}" class="w-full px-5 py-4 bg-gray-50 border rounded-2xl font-bold outline-none">
                    </div>
                </div>
                <input type="hidden" name="type" value="{{ request('type', 'in') }}">
                <button type="submit" class="w-full bg-orange-500 text-white py-5 rounded-2xl font-black uppercase italic tracking-widest shadow-xl">Simpan Data</button>
            </form>
        </div>
    </div>
</div>
@endsection