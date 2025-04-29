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
                    <h1 class="text-xl font-semibold text-white">Edit Berita: {{ $news->title }}</h1>
                </div>
                
                <form class="p-6 space-y-6" action="{{ route('dash.news') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Input Judul -->
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
                        <input type="text" id="author" name="author" required 
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-[#06202B] focus:border-[#06202B]"
                            placeholder="Masukkan nama penulis" value="{{ $news->author }}">
                        @error('author')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                        <input type="text" id="title" name="title" required 
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-[#06202B] focus:border-[#06202B]"
                            placeholder="Masukkan judul berita" value="{{ $news->title }}">
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
                                <option 
                                    value="{{ $category->id }}"
                                    class="{{ $category->name == $news->category->name 
                                        ? 'font-semibold bg-[#06202B] text-white' 
                                        : 'text-gray-700' }}"
                                    {{ $category->name == $news->category->name ? 'selected' : '' }}
                                >
                                {{ $category->name  }}
                                </option>
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
                        <div id="editor" class="h-72 overflow-y-auto rounded-md border border-gray-300">
                            {!! $news->content !!}
                        </div>
                        <!-- Ini hidden textarea -->
                        <textarea name="content" id="content" class="hidden"></textarea>


                        @error('content')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Tombol Aksi -->
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('dash.news') }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#06202B]">
                            Batal
                        </a>
                        <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#06202B] hover:bg-[#0a2e3f] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#06202B]">
                            Edit
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </main>
</div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>

    <script>
        const data = @json($news);
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

            
            if(data){
                const previewDiv = document.getElementById('image-preview');
                previewDiv.classList.remove('hidden');
                document.getElementById('preview-image').src = data.image;
            }
        });
    </script>
@endpush
<script src="{{ asset('js/news.js') }}"></script>