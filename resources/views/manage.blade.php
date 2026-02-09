@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
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
                    <a href="{{ route('report') }}" class="px-5 py-2.5 bg-white/10 hover:bg-white text-white hover:text-orange-600 rounded-xl text-xs font-black uppercase italic tracking-widest transition-all duration-300 border border-white/20">
                        Laporan Barang
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

    <div class="max-w-2xl mx-auto px-6 py-12">
        <div class="flex gap-4 mb-6">
            <a href="{{ route('manage') }}?type=in" 
               class="flex-1 py-4 text-center rounded-2xl font-black italic uppercase tracking-widest transition-all {{ request('type', 'in') == 'in' ? 'bg-orange-500 text-white shadow-xl shadow-orange-200' : 'bg-white text-gray-500 hover:bg-gray-50 border border-gray-200' }}">
                Pemasukan (+)
            </a>
            <a href="{{ route('manage') }}?type=out" 
               class="flex-1 py-4 text-center rounded-2xl font-black italic uppercase tracking-widest transition-all {{ request('type') == 'out' ? 'bg-orange-500 text-white shadow-xl shadow-orange-200' : 'bg-white text-gray-500 hover:bg-gray-50 border border-gray-200' }}">
                Sisa Akhir (-)
            </a>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-gray-200 overflow-hidden border border-gray-100">
            <div class="bg-gray-50 border-b border-gray-100 px-8 py-8 text-center">
                <h2 class="text-3xl font-black text-gray-900 uppercase italic tracking-tighter">
                    {{ request('type', 'in') == 'in' ? 'Input Stok Masuk' : 'Update Stok Sisa' }}
                </h2>
                <p class="text-gray-400 text-[10px] font-bold uppercase tracking-[0.2em] mt-1">Lalapan & Seafood Cak Der</p>
            </div>
            
            @if(session('error'))
            <div class="mx-8 mt-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl italic font-bold text-sm">
                ⚠️ {{ session('error') }}
            </div>
            @endif

            @if(session('success'))
            <div class="mx-8 mt-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-xl italic font-bold text-sm">
                ✅ {{ session('success') }}
            </div>
            @endif
            
            <form action="{{ route('manage.store') }}" method="POST" class="p-8 space-y-6">
                @csrf
                
                <div>
                    <label class="block text-[10px] font-black text-gray-400 mb-2 uppercase tracking-[0.2em] italic">Nama Bahan Baku / Menu :</label>
                    <input type="text" name="name" required 
                           class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none text-gray-900 font-bold uppercase transition-all"
                           placeholder="CONTOH: KEPITING SAUS TIRAM">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 mb-2 uppercase tracking-[0.2em] italic">Kategori :</label>
                        <select name="category" required class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-gray-900 font-bold outline-none focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 uppercase transition-all cursor-pointer">
                            <option value="">-- PILIH --</option>
                            <option value="SEAFOOD">SEAFOOD</option>
                            <option value="SAYUR">SAYUR</option>
                            <option value="IKAN">IKAN</option>
                            <option value="AYAM">AYAM</option>
                            <option value="BUMBU">BUMBU</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 mb-2 uppercase tracking-[0.2em] italic">Lokasi :</label>
                        <select name="location" required class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-gray-900 font-bold outline-none focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 uppercase transition-all cursor-pointer">
                            <option value="GUDANG UTAMA">GUDANG UTAMA</option>
                            <option value="FREEZER LESEHAN">FREEZER LESEHAN</option>
                            <option value="GUDANG ATAS">GUDANG ATAS</option>
                            <option value="DAPUR BELAKANG">DAPUR BELAKANG</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 mb-2 uppercase tracking-[0.2em] italic">
                            {{ request('type', 'in') == 'in' ? 'Jumlah Masuk :' : 'Jumlah Sisa :' }}
                        </label>
                        <input type="number" name="quantity" required step="any"
                               class="w-full px-6 py-4 bg-orange-50 border border-orange-100 rounded-2xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none text-orange-600 font-black text-center text-2xl"
                               placeholder="0">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 mb-2 uppercase tracking-[0.2em] italic">Tanggal Catat :</label>
                        <input type="date" name="date" value="{{ date('Y-m-d') }}" 
                               class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-gray-900 font-bold outline-none focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 uppercase transition-all">
                    </div>
                </div>

                <input type="hidden" name="unit" value="KG" id="unit-input">
                <input type="hidden" name="type" value="{{ request('type', 'in') }}">

                <div class="pt-6">
                    <button type="submit" class="w-full bg-orange-500 text-white py-5 rounded-2xl font-black uppercase italic tracking-[0.2em] hover:bg-orange-600 transition-all shadow-xl shadow-orange-500/30 hover:-translate-y-1 active:scale-95">
                        {{ request('type', 'in') == 'in' ? 'Simpan ke Sistem' : 'Update Stok Akhir' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.querySelector('select[name="category"]').addEventListener('change', function() {
        const unitInput = document.getElementById('unit-input');
        const categories = {
            'SEAFOOD': 'KG', 'IKAN': 'KG', 'AYAM': 'EKOR', 'SAYUR': 'IKAT', 'BUMBU': 'BUNGKUS'
        };
        unitInput.value = categories[this.value] || 'KG';
    });
</script>
@endpush
@endsection