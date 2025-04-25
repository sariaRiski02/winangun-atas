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
                <img src="{{ asset('images/hero.png') }}" alt="Foto Desa" class="rounded-lg shadow-lg w-full h-auto">
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Sejarah Singkat</h3>
                <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit...</p>
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
                <a href="#" class="inline-block mt-6 bg-[#06202B] hover:bg-white hover:text-[#06202B] text-white px-6 py-2 rounded-lg font-semibold transition duration-300">Selengkapnya</a>
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Kepala Desa -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/kades.png') }}" alt="Kepala Desa" class="w-full h-64 object-cover object-center">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Bapak Suryono</h3>
                    <p class="text-[#06202B] font-medium">Kepala Desa</p>
                    <p class="text-[#06202B] mt-2">Memimpin penyelenggaraan pemerintahan desa...</p>
                </div>
            </div>
            <!-- Sekretaris Desa -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/kades.png') }}" alt="Sekretaris Desa" class="w-full h-64 object-cover object-center">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Ibu Maharani</h3>
                    <p class="text-[#06202B] font-medium">Sekretaris Desa</p>
                    <p class="text-gray-600 mt-2">Bertanggung jawab dalam administrasi...</p>
                </div>
            </div>
            <!-- BPD -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/kades.png') }}" alt="Ketua BPD" class="w-full h-64 object-cover object-center">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Bapak Riyanto</h3>
                    <p class="text-gray-600 font-medium">Ketua BPD</p>
                    <p class="text-gray-600 mt-2">Memimpin Badan Permusyawaratan Desa...</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-8">
            <a href="" class="inline-block bg-[#06202B] hover:bg-[#a3b9ff] text-white px-6 py-2 rounded-lg font-semibold transition duration-300">Lihat Struktur Lengkap</a>
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Ketua BPD -->
            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/ketua-bpd.png') }}" alt="Ketua BPD" class="w-full h-64 object-cover object-center">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Bapak Riyanto</h3>
                    <p class="text-[#06202B] font-medium">Ketua BPD</p>
                    <p class="text-gray-600 mt-2">Memimpin Badan Permusyawaratan Desa dan mewakili aspirasi masyarakat desa.</p>
                </div>
            </div>
            <!-- Wakil Ketua BPD -->
            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/wakil-bpd.png') }}" alt="Wakil Ketua BPD" class="w-full h-64 object-cover object-center">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Ibu Sulastri</h3>
                    <p class="text-[#06202B] font-medium">Wakil Ketua BPD</p>
                    <p class="text-gray-600 mt-2">Mendukung Ketua BPD dalam menjalankan tugas dan fungsi BPD.</p>
                </div>
            </div>
            <!-- Sekretaris BPD -->
            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/sekretaris-bpd.png') }}" alt="Sekretaris BPD" class="w-full h-64 object-cover object-center">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Bapak Sutrisno</h3>
                    <p class="text-[#06202B] font-medium">Sekretaris BPD</p>
                    <p class="text-gray-600 mt-2">Bertanggung jawab atas administrasi dan dokumentasi kegiatan BPD.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-8">
            <a href="#" class="inline-block bg-[#06202B] hover:bg-[#a3b9ff] text-white px-6 py-2 rounded-lg font-semibold transition duration-300">Lihat Struktur Lengkap</a>
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Ketua PKK -->
            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/ketua-pkk.png') }}" alt="Ketua PKK" class="w-full h-64 object-cover object-center">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Ibu Mariana</h3>
                    <p class="text-[#06202B] font-medium">Ketua PKK</p>
                    <p class="text-gray-600 mt-2">Memimpin kegiatan pemberdayaan keluarga dan kesejahteraan masyarakat di tingkat desa.</p>
                </div>
            </div>
            <!-- Sekretaris PKK -->
            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/sekretaris-pkk.png') }}" alt="Sekretaris PKK" class="w-full h-64 object-cover object-center">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Ibu Lestari</h3>
                    <p class="text-[#06202B] font-medium">Sekretaris PKK</p>
                    <p class="text-gray-600 mt-2">Membantu administrasi dan koordinasi program PKK di desa.</p>
                </div>
            </div>
            <!-- Bendahara PKK -->
            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/bendahara-pkk.png') }}" alt="Bendahara PKK" class="w-full h-64 object-cover object-center">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Ibu Sari</h3>
                    <p class="text-[#06202B] font-medium">Bendahara PKK</p>
                    <p class="text-gray-600 mt-2">Mengelola keuangan PKK dan mendukung kegiatan sosial kemasyarakatan.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-8">
            <a href="#" class="inline-block bg-[#06202B] hover:bg-[#a3b9ff] text-white px-6 py-2 rounded-lg font-semibold transition duration-300">Lihat Struktur Lengkap</a>
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Ketua Karang Taruna -->
            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/ketua-karangtaruna.png') }}" alt="Ketua Karang Taruna" class="w-full h-64 object-cover object-center">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Bapak Adrian</h3>
                    <p class="text-[#06202B] font-medium">Ketua Karang Taruna</p>
                    <p class="text-gray-600 mt-2">Memimpin pemuda desa dalam kegiatan sosial, olahraga, dan pemberdayaan remaja.</p>
                </div>
            </div>
            <!-- Wakil Ketua Karang Taruna -->
            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/wakil-karangtaruna.png') }}" alt="Wakil Ketua Karang Taruna" class="w-full h-64 object-cover object-center">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Bapak Bima</h3>
                    <p class="text-[#06202B] font-medium">Wakil Ketua</p>
                    <p class="text-gray-600 mt-2">Mendukung ketua dalam mengorganisasi kegiatan kepemudaan dan kewirausahaan.</p>
                </div>
            </div>
            <!-- Sekretaris Karang Taruna -->
            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/sekretaris-karangtaruna.png') }}" alt="Sekretaris Karang Taruna" class="w-full h-64 object-cover object-center">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Ibu Ayu</h3>
                    <p class="text-[#06202B] font-medium">Sekretaris</p>
                    <p class="text-gray-600 mt-2">Bertanggung jawab atas administrasi dan dokumentasi Karang Taruna.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-8">
            <a href="#" class="inline-block bg-[#06202B] hover:bg-[#a3b9ff] text-white px-6 py-2 rounded-lg font-semibold transition duration-300">Lihat Struktur Lengkap</a>
        </div>
    </div>
</section>




@endsection
