@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-orange-500">
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
                <a href="{{ route('dashboard') }}" class="px-4 py-2.5 rounded-xl text-[9px] font-black uppercase italic tracking-widest bg-white text-orange-600 shadow-md whitespace-nowrap">Dashboard</a>
                <a href="{{ route('manage') }}" class="px-4 py-2.5 rounded-xl text-[9px] font-black uppercase italic tracking-widest bg-orange-600/50 text-white border border-white/10 whitespace-nowrap hover:bg-orange-400">Kelola Barang</a>
                <a href="{{ route('report') }}" class="px-4 py-2.5 rounded-xl text-[9px] font-black uppercase italic tracking-widest bg-orange-600/50 text-white border border-white/10 whitespace-nowrap hover:bg-orange-400">Laporan Barang</a>
                
                <form action="{{ route('logout') }}" method="POST" class="hidden md:block">
                    @csrf 
                    <button type="submit" class="ml-2 px-5 py-2.5 bg-red-600 text-white rounded-xl text-[9px] font-black uppercase italic shadow-lg hover:bg-red-700 transition-all">Log Out</button>
                </form>
            </div>

        </div>
    </div>
</nav>

    <div class="relative h-[calc(100vh-120px)] md:h-[calc(100vh-80px)] overflow-hidden">
        <img src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1658750312/attached_image/manfaat-kepiting-untuk-kesehatan-ada-banyak-lho.jpg" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/20 to-orange-500/90"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
            <h1 class="text-white text-5xl md:text-9xl font-black uppercase italic leading-[0.9] tracking-tighter mb-8">
                LALAPAN & SEAFOOD <br> <span class="text-yellow-400">CAK DER</span>
            </h1>
            <div class="bg-black/30 backdrop-blur-md p-6 rounded-[2rem] border border-white/10 text-white max-w-lg">
                <p class="text-xs font-bold tracking-widest uppercase mb-2">Selamat Datang di Website Pengelolaan Gudang</p>
                <div class="h-[2px] w-20 bg-yellow-400 mx-auto mb-4"></div>
                <p class="text-[10px] md:text-xs font-light tracking-wide opacity-80 leading-relaxed">
                    Jl. Raya Wendit Tim. No.Kav. 3, Pakis, Malang <br> Rajanya Kepiting, Surganya Pecinta Pedas
                </p>
            </div>
        </div>
    </div>
</div>
@endsection