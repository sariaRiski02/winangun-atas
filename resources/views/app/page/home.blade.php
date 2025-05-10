@extends('app.main')

@section('main')

<!-- Hero -->
<section id="welcome" class="gap-5 flex flex-col md:flex-row items-center w-full justify-between">
    <div class="flex flex-col justify-between w-full md:gap-8 gap-4">
        <span class="text-2xl md:text-4xl font-bold text-[#06202B] text-center md:text-left">
            Selamat Datang di situs  
            <br> 
            Desa Winangun Atas
        </span>
        <span class="text-md text-center md:text-left text-[#06202B]">
            Kami dengan bangga menyambut Anda di situs resmi Desa Winangun Atas
        </span>
    </div>
    <div class="w-full">
        <img src="{{ $profile?->hero_photo ? asset($profile?->hero_photo) : asset('images/hero.png') }}" alt="Desa Kema III" class="rounded-lg shadow-lg w-full h-auto">
    </div>
</section>

<!-- lead of village -->
<div class="flex flex-col md:flex-row items-center gap-5 h-auto w-full justify-center">
    <div class="w-full md:w-2/3 order-2 md:order-1">
        <img src="{{ $profile?->kades_photo ? asset($profile?->kades_photo) : asset('images/kades.png') }}" alt="Leader" class="w-full h-auto">
    </div>
    <div class="flex items-center w-full md:w-auto order-1 md:order-2">
        <p class="md:text-md text-md w-full text-[#06202B] text-center md:text-left">
            @if ($profile?->greeting)
                {{ $profile?->greeting }}
            @else
            "Selamat datang di Desa Winangun Atas, tempat di mana tradisi dan kemajuan berjalan beriringan. Kami bangga menjadi bagian dari komunitas yang menjunjung tinggi nilai-nilai kebersamaan, gotong royong, dan keberlanjutan. Mari bersama-sama membangun desa yang lebih baik untuk generasi mendatang."
            @endif
            <br><br>
            --- Kepala desa Winangun Atas ---
        </p>
    </div>
</div>

<!-- cart berita -->
<section id="news" class="flex flex-col gap-5">
    <h2 class="text-2xl font-bold text-[#06202B] text-center">Berita Terbaru</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        @foreach ($news as $item)
        <div class="bg-white rounded-lg shadow-lg p-5">
            <img src="{{ asset($item->image) }}" alt="News {{ $item->title }}" class="rounded-lg mb-3">
            <h3 class="text-lg font-semibold text-[#06202B]">{{ $item->title }}</h3>
            
            <p class="text-sm text-gray-700">{{ Str::limit(strip_tags($item->content), 200, '...') }}</p>
            <a href="{{ route('content',$item->slug) }}" class="text-[#06202B] font-semibold mt-3 inline-block">Baca Selengkapnya</a>
            <div class="flex items-center justify-between mt-3 text-gray-500 text-xs">
                <span>Diperbarui pada: {{ $item->updated_at->format('d M Y') }}</span>
                <span class="italic">oleh {{ $item->author->name ?? 'Admin' }}</span>
            </div>
        </div>
        @endforeach
    </div>
</section>


{{-- DemoGrafi --}}
<section id="demografi" class="flex flex-col gap-5 mt-10">
    <h2 class="text-2xl font-bold text-[#06202B] text-center">Data Demografi Desa</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
        <!-- Total Penduduk -->
        <div class="bg-cyan-200 rounded-xl shadow-lg p-6 text-center hover:shadow-2xl transition duration-300">
            <div class="flex justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#06202B]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-[#06202B] mb-2">Jumlah Penduduk</h3>
            @if ($total_residents)
                <p class="text-5xl font-extrabold text-[#06202B]">{{ $total_residents }}</p>
                <span class="text-gray-700 text-sm">Orang</span>
            @else
                <span class="text-gray-700 text-sm">Data Belum Ditambahkan</span>
            @endif
        </div>
        <!-- Laki-Laki -->
        <div class="bg-blue-500 rounded-xl shadow-lg p-6 text-center hover:shadow-2xl transition duration-300">
            <div class="flex justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#06202B]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="5" r="3"></circle>
                    <line x1="12" y1="8" x2="12" y2="21"></line>
                    <line x1="8" y1="16" x2="16" y2="16"></line>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-[#06202B] mb-2">Laki-Laki</h3>
            @if ($men)
                <p class="text-5xl font-extrabold text-[#06202B]">{{ $men }}</p>
                <span class="text-gray-700 text-sm">Orang</span>
            @else
                <span class="text-gray-700 text-sm">Data Belum Ditambahkan</span>
            @endif
        </div>
        <!-- Perempuan -->
        <div class="bg-pink-400 rounded-xl shadow-lg p-6 text-center hover:shadow-2xl transition duration-300">
            <div class="flex justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#06202B]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="5" r="3"></circle>
                    <line x1="12" y1="8" x2="12" y2="21"></line>
                    <circle cx="12" cy="16" r="4"></circle>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-[#06202B] mb-2">Perempuan</h3>
            @if ($women)
                <p class="text-5xl font-extrabold text-[#06202B]">{{ $women }}</p>
                <span class="text-gray-700 text-sm">Orang</span>
            @else
                <span class="text-gray-700 text-sm">Data Belum Ditambahkan</span>
            @endif
        </div>
    </div>
</section>



@endsection
