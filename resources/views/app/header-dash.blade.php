<div class="flex transition-all justify-center z-40 border p-2">

    {{-- sidebar dashboard --}}
    <div id="sidebar" class=" h-screen w-56 z-50 bg-white fixed left-0 top-0 z-100 flex flex-col px-2 shadow-lg transition-all duration-300 -translate-x-full">
        <div class="h-16 bg-[#06202B] mt-2 flex items-center px-3 rounded justify-between mb-2">
            <span class="text-white font-bold text-lg">Winangun Atas</span>
            <button onclick="buttonSidebar()" class="text-white focus:outline-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Sidebar links -->
        <a href="{{ route('dash.home') }}" class="flex items-center p-3 rounded-lg {{ Route::is('dash.home') ? 'bg-[#06202B] text-white' : '' }}">
            <!-- Ikon Rumah untuk Beranda -->
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M4 10v10h5v-6h6v6h5V10"></path>
            </svg>
            <span class="font-semibold text-sm">Beranda</span>
        </a>
        <a href="{{ route('dash.pemerintahan.edit') }}" class="flex items-center p-3 rounded-lg {{ Route::is('dash.pemerintahan.edit') ? 'bg-[#06202B] text-white' : '' }}">
            <!-- Ikon Gedung untuk Pemerintahan -->
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M5 10V7a7 7 0 0114 0v3M5 10v10h14V10"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 21V13h6v8"></path>
            </svg>
            <span class="font-semibold text-sm">Pemerintahan</span>
        </a>
        <a href="{{ route('dash.demo') }}" class="flex items-center p-3 rounded-lg {{ Route::is('dash.demo') ? 'bg-[#06202B] text-white' : '' }}">
            <!-- Ikon Orang untuk Demografi -->
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 14c3 0 5 2 5 5v1H3v-1c0-3 2-5 5-5"></path>
            <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2" fill="none"></circle>
            </svg>
            <span class="font-semibold text-sm">Demografi</span>
        </a>
        <a href="{{ route('dash.geo') }}" class="flex items-center p-3 rounded-lg {{ Route::is('dash.geo') ? 'bg-[#06202B] text-white' : '' }}">
            <!-- Ikon Peta untuk Geografis -->
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l6-3 6 3 6-3v13l-6 3-6-3-6 3V8z"></path>
            </svg>
            <span class="font-semibold text-sm">Geografis</span>
        </a>
        <a href="{{ route('dash.news') }}" class="flex items-center p-3 rounded-lg {{ Route::is('dash.news') ? 'bg-[#06202B] text-white' : '' }}">
            <!-- Ikon Berita/Koran untuk Berita -->
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5h16v14H4V5z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 8h8M8 12h8M8 16h4"></path>
            </svg>
            <span class="font-semibold text-sm">Berita</span>
        </a>
        <a href="" class="flex items-center p-3 rounded-lg {{ Route::is('dash.services') ? 'bg-[#06202B] text-white' : '' }}">
            <!-- Ikon Informasi -->
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 1010 10A10 10 0 0012 2z"></path>
            </svg>
            <span class="font-semibold text-sm">Layanan</span>
        </a>
        <button class="cursor-pointer flex items-center p-3 text-red-500 hover:text-red-600 rounded-lg w-full text-left" onclick="confirm('apakah kamu mau keluar?')">
            <!-- Ikon Keluar -->
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21V3h12v18M9 9h6"></path>
            </svg>
            <span class="font-semibold text-sm">Keluar</span>
        </button>

        
        
    </div>

    <div id="container" class="fixed w-full px-2 z-10">
        <div class="bg-[#06202B] w-full text-white py-4 px-4 text-center rounded flex z-50">
            <div id="iconSidebar" class="flex items-center">
                <button id="toggleSidebar" onclick="buttonSidebar()" class="text-white focus:outline-none cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <h1 class="text-2xl font-bold w-full">Dashboard</h1>
        </div>
    </div>
</div>