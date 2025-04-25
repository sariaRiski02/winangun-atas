@extends('app.main')

@section('main')
       
<!-- Berita Terbaru --> 
<section class="pb-5 bg-white">

    <div class="container mx-auto px-4">

        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Berita Terbaru</h2>
            <div class="w-24 h-1 bg-[#06202B] mx-auto"></div>
            <p class="mt-4 text-gray-600">Informasi dan kegiatan terbaru di <strong>Desa Winangun Atas</strong></p>
        </div>

        <!-- Search Bar -->
        <div class="mb-8 flex justify-end">
            <form action="" method="GET" class="flex items-center w-full md:w-1/2 max-w-md">
                <input 
                    type="text" 
                    name="query" 
                    placeholder="Cari berita..." 
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-[#06202B] focus:border-transparent"
                >
                <button 
                    type="submit" 
                    class="px-4 py-2 bg-[#06202B] text-white rounded-r-md hover:bg-[#0f2f47] transition duration-300"
                >Cari</button>
            </form>
        </div>

        <!-- Featured News -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-10">
            <div class="md:flex">
                <div class="md:w-1/2">
                    <img src="{{ asset('images/hero.png') }}" alt="Program Vaksinasi" class="w-full h-full object-cover">
                </div>
                <div class="md:w-1/2 p-6">
                    <div class="text-[#06202B] text-sm font-bold mb-2">15 Maret 2025</div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Program Vaksinasi COVID-19 di Desa Kema 3 Mencapai 95% dari Target</h3>
                    <p class="text-gray-600 mb-6">Program vaksinasi COVID-19 di Desa Kema 3 telah berhasil mencapai 95% dari target. Keberhasilan ini merupakan hasil kerja sama yang baik antara pemerintah desa, tenaga kesehatan, dan partisipasi aktif warga desa.</p>
                    <a href="#" class="inline-block bg-[#06202B] text-white px-6 py-2 rounded-md hover:bg-bluez-800 transition duration-300">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- News Item 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img src="{{ asset('images/hero.png') }}" alt="Pembangunan Jalan" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-[#06202B] text-sm font-bold mb-2">10 Maret 2025</div>
                    <h3 class="font-bold text-xl mb-2">Pembangunan Jalan Desa Rampung</h3>
                    <p class="text-gray-600 mb-4">Proyek pembangunan jalan desa sepanjang 2 kilometer telah rampung. Jalan ini akan memudahkan akses warga ke pusat desa dan kecamatan.</p>
                    <a href="#" class="text-[#06202B] font-semibold hover:text-bluez-800">Baca Selengkapnya →</a>
                </div>
            </div>

            <!-- News Item 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img src="{{ asset('images/hero.png') }}" alt="Pelatihan Pertanian" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-[#06202B] text-sm font-bold mb-2">5 Maret 2025</div>
                    <h3 class="font-bold text-xl mb-2">Pelatihan Pertanian Organik untuk Petani Desa</h3>
                    <p class="text-gray-600 mb-4">Sebanyak 30 petani desa mengikuti pelatihan pertanian organik yang diselenggarakan oleh pemerintah desa bekerjasama dengan Dinas Pertanian.</p>
                    <a href="#" class="text-[#06202B] font-semibold hover:text-bluez-800">Baca Selengkapnya →</a>
                </div>
            </div>

            <!-- News Item 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img src="{{ asset('images/hero.png') }}" alt="Pembukaan BUMDES" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-[#06202B] text-sm font-bold mb-2">28 Februari 2025</div>
                    <h3 class="font-bold text-xl mb-2">BUMDES Baru Dibuka untuk Tingkatkan Ekonomi Desa</h3>
                    <p class="text-gray-600 mb-4">Badan Usaha Milik Desa (BUMDES) "Kema 3 Bersama" resmi dibuka. BUMDES ini akan fokus pada pengembangan produk-produk lokal.</p>
                    <a href="#" class="text-[#06202B] font-semibold hover:text-bluez-800">Baca Selengkapnya →</a>
                </div>
            </div>

            <!-- News Item 4 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img src="{{ asset('images/hero.png') }}" alt="Festival Budaya" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-[#06202B] text-sm font-bold mb-2">20 Februari 2025</div>
                    <h3 class="font-bold text-xl mb-2">Festival Budaya Tahunan Desa Kema 3</h3>
                    <p class="text-gray-600 mb-4">Festival budaya tahunan Desa Kema 3 digelar dengan meriah. Acara ini menampilkan berbagai kesenian tradisional dan kuliner khas desa.</p>
                    <a href="#" class="text-[#06202B] font-semibold hover:text-bluez-800">Baca Selengkapnya →</a>
                </div>
            </div>

            <!-- News Item 5 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img src="{{ asset('images/hero.png') }}" alt="Program Beasiswa" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-[#06202B] text-sm font-bold mb-2">15 Februari 2025</div>
                    <h3 class="font-bold text-xl mb-2">Program Beasiswa untuk Siswa Berprestasi</h3>
                    <p class="text-gray-600 mb-4">Pemerintah Desa Kema 3 meluncurkan program beasiswa untuk siswa berprestasi. Program ini akan membantu 10 siswa melanjutkan pendidikan ke jenjang yang lebih tinggi.</p>
                    <a href="#" class="text-[#06202B] font-semibold hover:text-bluez-800">Baca Selengkapnya →</a>
                </div>
            </div>

            <!-- News Item 6 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img src="{{ asset('images/hero.png') }}" alt="Posyandu" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-[#06202B] text-sm font-bold mb-2">10 Februari 2025</div>
                    <h3 class="font-bold text-xl mb-2">Renovasi Posyandu Desa Selesai Dilaksanakan</h3>
                    <p class="text-gray-600 mb-4">Renovasi Posyandu Desa Kema 3 telah selesai dilaksanakan. Fasilitas kesehatan ini dilengkapi dengan peralatan baru untuk meningkatkan kualitas layanan kesehatan.</p>
                    <a href="#" class="text-[#06202B] font-semibold hover:text-bluez-800">Baca Selengkapnya →</a>
                </div>
            </div>
        </div>

        <!-- Pagination dan Kategori Tetap -->
        <!-- (tidak diubah) -->
    </div>
</section>

<!-- Kategori Berita -->
<section class="py-12 bg-gray-100">
<!-- (konten kategori tetap) -->
</section>

@endsection
