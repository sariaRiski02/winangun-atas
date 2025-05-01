@extends('app.main-dash')

@section('main')
<div class="flex flex-col items-center justify-center min-h-[60vh] bg-white p-10 rounded-lg shadow">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-[#06202B] mb-4">Konfirmasi Diperlukan</h2>
        <p class="text-gray-700 text-md max-w-xl">
            Halaman ini memerlukan konfirmasi atau persetujuan lebih lanjut sebelum Anda dapat mengakses fiturnya.
            Silakan hubungi <span class="font-semibold text-[#06202B]">Developer dari situs</span> untuk pengembangan fitur ini.
        </p>

        <div class="mt-6">
            <a href="{{ route('home') }}"
                class="inline-block px-4 py-2 bg-[#06202B] text-white rounded hover:bg-[#04131A] transition">
                lihat website sebagai tamu
            </a>
        </div>
    </div>
</div>
@endsection
