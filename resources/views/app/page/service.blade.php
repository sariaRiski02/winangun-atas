
@extends('app.main')

@section('main')
     <!-- Layanan -->
    <section id="layanan" class=" pb-10 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Layanan Masyarakat</h2>
                <div class="w-24 h-1 bg-[#06202B] mx-auto"></div>
                <p class="mt-4 text-gray-600">Kami berkomitmen memberikan pelayanan terbaik...</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Layanan 1 -->
                <div class="bg-blue-50 p-6 rounded-lg text-center hover:shadow-lg transition duration-300">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#06202B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6..." />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Administrasi Kependudukan</h3>
                    <p class="text-gray-600">Pembuatan surat pengantar KTP, KK, Akte Kelahiran...</p>
                </div>
                <!-- Layanan 2 -->
                <div class="bg-blue-50 p-6 rounded-lg text-center hover:shadow-lg transition duration-300">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#06202B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M9 21V10m6 11V10" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Pelayanan Perizinan</h3>
                    <p class="text-gray-600">Pengurusan izin usaha, IMB, dan lainnya...</p>
                </div>
                <!-- Layanan 3 -->
                <div class="bg-blue-50 p-6 rounded-lg text-center hover:shadow-lg transition duration-300">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#06202B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2 9 3.343 9 5s1.343 3 3 3zm0 4c-4.418 0-8 1.79-8 4v2h16v-2c0-2.21-3.582-4-8-4z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Layanan Kesehatan</h3>
                    <p class="text-gray-600">Fasilitas kesehatan untuk masyarakat...</p>
                </div>
                <!-- Layanan 4 -->
                <div class="bg-blue-50 p-6 rounded-lg text-center hover:shadow-lg transition duration-300">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#06202B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Layanan Pengaduan</h3>
                    <p class="text-gray-600">Sarana pengaduan untuk masyarakat...</p>
                </div>
            </div>
        </div>
    </section>
@endsection

