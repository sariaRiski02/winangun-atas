@extends('app.main')

@section('main')
       
<!-- Berita Terbaru --> 
<section class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        
        @if ($news->count() != 0)
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-3">Berita Terbaru</h2>
                <div class="w-16 h-1 bg-gray-800 mx-auto"></div>
                <p class="mt-6 text-xl text-gray-600">Informasi dan kegiatan terbaru di <span class="font-medium">Desa Winangun Atas</span></p>
            </div>

            <!-- Search Bar -->
            <div class="mb-12">
                <form action="" method="GET" class="max-w-xl mx-auto">
                <div class="relative">
                    <input 
                    type="text" 
                    name="query" 
                    placeholder="Cari berita..." 
                    class="w-full py-3 pl-5 pr-12 text-gray-700 bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-800 transition duration-300"
                    >
                    <button 
                    type="submit" 
                    class="absolute top-1/2 right-4 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 transition duration-300"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    </button>
                </div>
                </form>
            </div>

            <!-- Featured News -->
            <div class="mb-20 p-5 rounded-md shadow-lg">
                <div class="lg:flex items-center ">
                    <div class="lg:w-7/12 mb-8 lg:mb-0 lg:pr-12">
                        <img src="{{ asset('images/hero.png') }}" alt="Program Vaksinasi" class="w-full h-auto rounded-lg shadow-md">
                    </div>
                    <div class="lg:w-5/12">
                        <div class="text-sm text-gray-500 mb-3">
                            {{ $news->first()->created_at->diffForHumans() }}
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-5 leading-tight">
                            {{ $news->first()->title }}
                        </h3>
                        <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                            {{ Str::limit(strip_tags($news->first()->content), 200, '...')  }}
                        </p>
                        <a href="{{ route('content',$news->first()->slug) }}" class="inline-block px-0 py-1 text-gray-900 font-medium border-b-2 border-gray-900 hover:text-gray-700 hover:border-gray-700 transition duration-300">Baca selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach ($news->skip(1) as $item)
                    <article class="group p-5 rounded-md shadow-lg">
                        <div class="mb-5 overflow-hidden rounded-lg">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-56 object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="text-sm text-gray-500 mb-2">{{ $item->created_at->diffForHumans() }}</div>
                        <h3 class="font-bold text-xl mb-3 text-gray-900 group-hover:text-gray-700 transition duration-300">{{ $item->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit(strip_tags($item->content), 150) }}</p>
                        <a href="{{ route('content', $item->slug) }}" class="text-gray-900 font-medium border-b border-gray-900 hover:text-gray-700 hover:border-gray-700 transition duration-300">Baca selengkapnya</a>
                    </article>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-16">
                {{ $news->links('pagination::tailwind') }}
            </div>
        @else
            <div class="text-center py-20">
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum ada berita yang ditambahkan</h3>
                <p class="text-gray-600">Silakan cek kembali nanti untuk mendapatkan informasi terbaru dari Desa Winangun Atas.</p>
            </div>
        @endif
        
        
    </div>
</section>

<!-- Kategori Berita -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Kategori Berita</h2>
            <div class="w-16 h-1 bg-gray-800 mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Kategori Item -->
            <a href="#" class="bg-white rounded-lg p-8 text-center shadow-sm hover:shadow-md transition duration-300">
                <div class="text-4xl text-gray-800 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Pembangunan</h3>
                <p class="text-gray-600">Informasi tentang pembangunan infrastruktur desa</p>
            </a>
            
            <a href="#" class="bg-white rounded-lg p-8 text-center shadow-sm hover:shadow-md transition duration-300">
                <div class="text-4xl text-gray-800 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Kegiatan</h3>
                <p class="text-gray-600">Berbagai kegiatan yang diselenggarakan di desa</p>
            </a>
            
            <a href="#" class="bg-white rounded-lg p-8 text-center shadow-sm hover:shadow-md transition duration-300">
                <div class="text-4xl text-gray-800 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Kesehatan</h3>
                <p class="text-gray-600">Informasi kesehatan dan program vaksinasi</p>
            </a>
            
            <a href="#" class="bg-white rounded-lg p-8 text-center shadow-sm hover:shadow-md transition duration-300">
                <div class="text-4xl text-gray-800 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Pengumuman</h3>
                <p class="text-gray-600">Pengumuman dan informasi penting untuk warga</p>
            </a>
        </div>
    </div>
</section>

@endsection