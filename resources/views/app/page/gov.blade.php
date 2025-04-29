@extends('app.main')

@section('main')

<!-- Hero Section -->
<section id="beranda" class="hero-image text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl md:text-5xl text-[#06202B] font-bold mb-4">Pemerintahan Desa Winangun Atas</h2>
        <p class="text-xl mb-8">"Bersama membangun desa yang mandiri dan berdaya saing."</p>
        <div class="flex justify-center space-x-4">
            <a href="#layanan" class="bg-[#06202B] hover:bg-[#fbfbfb] hover:text-[#06202B] text-white px-6 py-3 rounded-lg font-semibold transition duration-300">Layanan Online</a>
            <a href="#profil" class="bg-white hover:bg-[#06202B] hover:text-white text-[#06202B] border-2 px-6 py-3 rounded-lg font-semibold transition duration-300">Tentang Desa</a>
        </div>
    </div>
</section>

<!-- Profil Desa -->
<section id="profil" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Profil Desa Sejahtera</h2>
            <div class="w-24 h-1 bg-[#06202B] mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                @if ($structure?->structure_photo)
                    <img src="{{ asset($structure->structure_photo) }}" alt="Foto Struktur Desa" class="rounded-lg shadow-lg w-full h-auto">
                @else
                    <img src="{{ asset('images/struktur-default.png') }}" alt="Default Foto Desa" class="rounded-lg shadow-lg w-full h-auto">
                @endif
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Sejarah Singkat</h3>
                <p class="text-gray-600 mb-4">
                    {{ Str::limit(strip_tags($structure?->history ?? 'Belum ada sejarah desa.'), 150) }}
                </p>
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div class="bg-[#edf1ff] p-4 rounded-lg">
                        <h4 class="font-bold text-[#06202B]">Luas Wilayah</h4>
                        <p>650 Hektar</p>
                    </div>
                    <div class="bg-[#edf1ff] p-4 rounded-lg">
                        <h4 class="font-bold text-[#06202B]">Jumlah Penduduk</h4>
                        <p>3.250 Jiwa</p>
                    </div>
                    <div class="bg-[#edf1ff] p-4 rounded-lg">
                        <h4 class="font-bold text-[#06202B]">Jumlah KK</h4>
                        <p>867 KK</p>
                    </div>
                    <div class="bg-[#edf1ff] p-4 rounded-lg">
                        <h4 class="font-bold text-[#06202B]">Potensi Unggulan</h4>
                        <p>Pertanian & Wisata</p>
                    </div>
                </div>
                <a href="{{ route('profil.show') }}" class="inline-block mt-6 bg-[#06202B] hover:bg-white hover:text-[#06202B] text-white px-6 py-2 rounded-lg font-semibold transition duration-300">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>

<!-- Struktur Pemerintahan -->
<section id="pemerintahan" class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Struktur Pemerintahan</h2>
            <div class="w-24 h-1 bg-[#06202B] mx-auto"></div>
            <p class="mt-4 text-gray-600">Struktur organisasi pemerintahan Desa Sejahtera periode 2022-2027</p>
        </div>
        <div class="flex justify-center">
            @if ($structure?->structure_photo)
                <img src="{{ asset($structure->structure_photo) }}" alt="Struktur Pemerintahan" class="rounded-lg shadow-lg w-full md:w-2/3">
            @else
                <img src="{{ asset('images/struktur-default.png') }}" alt="Struktur Pemerintahan Default" class="rounded-lg shadow-lg w-full md:w-2/3">
            @endif
        </div>
        <div class="text-center mt-8">
            <a href="{{ asset($structure->structure_photo ?? 'images/struktur-default.png') }}" class="inline-block bg-[#06202B] hover:bg-[#a3b9ff] text-white px-6 py-2 rounded-lg font-semibold transition duration-300" target="_blank">Lihat Struktur Lengkap</a>
        </div>
    </div>
</section>

<!-- Struktur BPD -->
<section id="struktur-bpd" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Struktur BPD</h2>
            <div class="w-24 h-1 bg-[#06202B] mx-auto"></div>
            <p class="mt-4 text-gray-600">Struktur organisasi Badan Permusyawaratan Desa (BPD) Desa Winangun Atas.</p>
        </div>
        <div class="flex justify-center">
            @if ($structure?->bpd_photo)
                <img src="{{ asset($structure->bpd_photo) }}" alt="Struktur BPD" class="rounded-lg shadow-lg w-full md:w-2/3">
            @else
                <img src="{{ asset('images/struktur-default.png') }}" alt="Struktur BPD Default" class="rounded-lg shadow-lg w-full md:w-2/3">
            @endif
        </div>
        <div class="text-center mt-8">
            <a href="{{ asset($structure->bpd_photo ?? 'images/struktur-default.png') }}" class="inline-block bg-[#06202B] hover:bg-[#a3b9ff] text-white px-6 py-2 rounded-lg font-semibold transition duration-300" target="_blank">Lihat Struktur Lengkap</a>
        </div>
    </div>
</section>

<!-- Struktur PKK -->
<section id="struktur-pkk" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Struktur PKK</h2>
            <div class="w-24 h-1 bg-[#06202B] mx-auto"></div>
            <p class="mt-4 text-gray-600">Struktur organisasi Tim Penggerak PKK Desa Winangun Atas.</p>
        </div>
        <div class="flex justify-center">
            @if ($structure?->pkk_photo)
                <img src="{{ asset($structure->pkk_photo) }}" alt="Struktur PKK" class="rounded-lg shadow-lg w-full md:w-2/3">
            @else
                <img src="{{ asset('images/struktur-default.png') }}" alt="Struktur PKK Default" class="rounded-lg shadow-lg w-full md:w-2/3">
            @endif
        </div>
        <div class="text-center mt-8">
            <a href="{{ asset($structure->pkk_photo ?? 'images/struktur-default.png') }}" class="inline-block bg-[#06202B] hover:bg-[#a3b9ff] text-white px-6 py-2 rounded-lg font-semibold transition duration-300" target="_blank">Lihat Struktur Lengkap</a>
        </div>
    </div>
</section>

<!-- Struktur Karang Taruna -->
<section id="struktur-karangtaruna" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Struktur Karang Taruna</h2>
            <div class="w-24 h-1 bg-[#06202B] mx-auto"></div>
            <p class="mt-4 text-gray-600">Struktur organisasi Karang Taruna Desa Winangun Atas.</p>
        </div>
        <div class="flex justify-center">
            @if ($structure?->karangtaruna_photo)
                <img src="{{ asset($structure->karangtaruna_photo) }}" alt="Struktur Karang Taruna" class="rounded-lg shadow-lg w-full md:w-2/3">
            @else
                <img src="{{ asset('images/struktur-default.png') }}" alt="Struktur Karang Taruna Default" class="rounded-lg shadow-lg w-full md:w-2/3">
            @endif
        </div>
        <div class="text-center mt-8">
            <a href="{{ asset($structure->karangtaruna_photo ?? 'images/struktur-default.png') }}" class="inline-block bg-[#06202B] hover:bg-[#a3b9ff] text-white px-6 py-2 rounded-lg font-semibold transition duration-300" target="_blank">Lihat Struktur Lengkap</a>
        </div>
    </div>
</section>

@endsection
