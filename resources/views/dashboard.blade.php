@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-orange-500">
    <nav class="bg-orange-500 py-4">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-lg">
                        <span class="text-orange-600 font-black text-lg">CD</span>
                    </div>
                    <span class="text-gray-900 font-black italic text-xl tracking-tighter uppercase">Lalapan Seafood Cak Der</span>
                </div>
                
                <div class="flex gap-3">
                    <a href="{{ route('manage') }}" class="px-6 py-2.5 bg-white rounded-xl text-gray-900 text-xs font-black uppercase italic tracking-widest hover:bg-gray-100 transition-all shadow-md">
                        Kelola Barang
                    </a>
                    <a href="{{ route('report') }}" class="px-6 py-2.5 bg-white rounded-xl text-gray-900 text-xs font-black uppercase italic tracking-widest hover:bg-gray-100 transition-all shadow-md">
                        Laporan Barang
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-6 py-2.5 bg-gray-900 text-white rounded-xl text-xs font-black uppercase italic tracking-widest hover:bg-black transition-all shadow-md">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative h-[calc(100vh-80px)] overflow-hidden">
        <img src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1658750312/attached_image/manfaat-kepiting-untuk-kesehatan-ada-banyak-lho.jpg" 
             class="w-full h-full object-cover" 
             alt="Seafood Banner">
        
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/20 to-orange-500/80"></div>
        
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6">
            <div class="mb-6">
                <p class="text-white text-sm font-bold tracking-[0.5em] uppercase opacity-80 mb-4">
                    Management Information System
                </p>
                <div class="h-[2px] w-24 bg-orange-500 mx-auto"></div>
            </div>
            
            <h1 class="text-white text-6xl md:text-9xl font-black uppercase mb-8 tracking-tighter leading-none italic">
                LALAPAN <br> 
                <span class="text-orange-500">&</span> SEAFOOD <br>
                CAK DER
            </h1>
            
            <div class="space-y-2 bg-black/30 backdrop-blur-md p-6 rounded-3xl border border-white/10">
                <p class="text-white text-sm font-medium tracking-widest uppercase">
                    Jl. Raya Wendit Tim. No.Kav. 3, Boro Bugis, Kec. Pakis
                </p>
                <p class="text-orange-200 text-[10px] font-black uppercase tracking-[0.3em]">
                    Kabupaten Malang, Jawa Timur &bull; Indonesia
                </p>
            </div>
        </div>

        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 w-full text-center">
            <div class="inline-block px-8 py-3 bg-white/10 backdrop-blur-xl border border-white/20 rounded-full">
                <p class="text-white text-xs font-black uppercase tracking-[0.6em] italic">
                    Rajanya Kepiting, Surganya Pecinta Pedas
                </p>
            </div>
        </div>
    </div>
</div>
@endsection