@extends('app.main-dash')
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet"/>
@endpush
@section('main')
@include('app.notification.notif')
<div class="min-h-screen">
    <main class="py-5">
        <div class=" max-w-5xl mx-auto px-2 sm:px-4 lg:px-4">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <!-- Header Form -->
                <div class="bg-[#06202B] py-5 px-6">
                    <h1 class="text-xl font-semibold text-white">Buat Artikel Berita Baru</h1>
                </div>
                
                <form class="p-6 space-y-6" action="{{ route('dash.news') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Input Judul -->
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
                        <input type="text" id="author" name="author" required 
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-[#06202B] focus:border-[#06202B]"
                            placeholder="Masukkan nama penulis">
                        @error('author')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                        <input type="text" id="title" name="title" required 
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-[#06202B] focus:border-[#06202B]"
                            placeholder="Masukkan judul berita">
                        @error('title')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Pilihan Kategori -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select id="category" name="category" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-[#06202B] focus:border-[#06202B]">
                            <option value="" disabled selected>Pilih kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Upload Gambar -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Gambar Utama</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4h-12m4-12v8m0 0v8m0-8h12m-12 0h-4m4 0H8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex flex-col items-center text-sm text-gray-600 gap-2">
                                    <!-- Tombol Upload -->
                                    <button type="button" onclick="document.getElementById('image-upload').click()" 
                                        class="px-4 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f] transition">
                                        Pilih Gambar
                                    </button>
                                    <input id="image-upload" name="image" type="file" accept="image/*" class="hidden">
                                    <p class="text-gray-500">atau tarik dan lepas di sini</p>
                                </div>
                                <p class="text-xs text-gray-500">Format: PNG, JPG, GIF (maks. 10MB)</p>
                            </div>
                        </div>
                        @error('image')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Preview Gambar -->
                    <div id="image-preview" class="hidden">
                        <label class="block text-sm font-medium text-gray-700">Pratinjau Gambar</label>
                        <div class="mt-1">
                            <img id="preview-image" class="h-64 w-full object-cover rounded-md" alt="Pratinjau Gambar">
                        </div>
                    </div>
                    
                    <!-- Konten Artikel -->
                    <div class="main-container">
                        <!-- Create the editor container -->
                        <div id="editor" class="h-72 overflow-y-auto rounded-md border border-gray-300"></div>


                        <!-- Ini hidden textarea -->
                        <textarea name="content" id="content" class="hidden"></textarea>


                        @error('content')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Tombol Aksi -->
                    <div class="flex justify-end space-x-3">
                        
                        <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#06202B] hover:bg-[#0a2e3f] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#06202B]">
                            Publikasi
                        </button>
                    </div>
                </form>
            </div>
            <!-- List Berita dengan Search Bar -->
            <div class="mt-10" id="list-news">
                <h2 class="text-xl font-bold text-[#06202B] border-l-4 border-[#36c7da] pl-3 mb-6">Daftar Berita</h2>
                
                <!-- Search & Filter Bar -->
                <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    
                    
                    <form method="GET" action="{{ route('dash.news') }}" class="flex flex-wrap border w-full items-center gap-3">
                        
                        <div class="relative w-full sm:w-64 lg:w-80 flex-grow">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="search" name="search" value="{{ request('search') }}" 
                                class="block w-full pl-10 p-2.5 bg-gray-50 border border-gray-300 text-sm text-gray-900 rounded-lg focus:ring-[#36c7da] focus:border-[#36c7da]" 
                                placeholder="Cari berita...">
                        </div>


                        <select name="category" class="bg-gray-50 border border-gray-300 text-[#06202B] text-sm rounded-lg focus:ring-[#36c7da] focus:border-[#36c7da] p-2.5">
                            <option value="all">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                            
                        </select>
                        
                        <button type="submit" class="text-white bg-[#06202B] hover:bg-[#0c3c53] focus:ring-4 focus:ring-[#0c3c53]/30 font-medium rounded-lg text-sm px-4 py-2.5 flex items-center">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Filter
                        </button>
                    </form>
                </div>
                
                <div class="mt-4 bg-white rounded-lg shadow-md overflow-scroll">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-[#06202B]">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">
                                    Judul
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">
                                    Penulis
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">
                                    Waktu
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($news as $item)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#06202B]">
                                        {{ $item->title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        {{ $item->author }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-[#0c3c53] text-white">
                                            {{ $item->category->name }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        {{ $item->created_at->format('d M Y, H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3 flex items-center">
                                        <a href="{{ route('content', $item->slug) }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-150" title="Lihat">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('dash.news.edit',$item->id) }}" class="text-amber-500 hover:text-amber-600 transition-colors duration-150" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('dash.news.delete', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 transition-colors duration-150" title="Hapus" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{-- pagination --}}
                    <div class="p-5 border">
                        {{ $news->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>

    <script>
         document.addEventListener('DOMContentLoaded', function () {
            const quill = new Quill("#editor", {
                theme: "snow",
            });

            // Saat form disubmit
            const form = document.querySelector('form');
            form.onsubmit = function() {
                const content = document.querySelector('textarea[name=content]');
                content.value = quill.root.innerHTML; // Taruh isi editor ke textarea
            };

            if (window.location.search.includes('search=') || window.location.search.includes('category=')) {
            const element = document.getElementById('list-news');
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }
        });
    </script>
@endpush

<script src="{{ asset('js/news.js') }}"></script>