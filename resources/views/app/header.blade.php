<!-- Header -->
<header id="header" class="fixed z-50 left-0 top-0 w-full h-20 flex items-center pt-2 px-3 lg:px-16 md:px-10 sm:px-10">
    <div class="h-full w-full bg-[#06202B] rounded-[1vw] flex justify-between items-center px-10 shadow-lg">
        <div class="md:hidden flex items-center">
            <button id="toggleSidebar" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        <div id="logo" class="text-white font-bold text-lg">Winangun Atas</div>
        <div id="navbar" class="gap-2 text-white hidden md:flex">
            <a href="{{ route('home') }}"
                class="text-white font-semibold text-sm {{ Route::is('home') ? 'bg-[#12414d] rounded-md' : '' }}">
                <div class="p-3 hover:bg-[#0f3e49] rounded-[1vw]">
                    Beranda
                </div>
            </a>
            <a href="{{ route('gov') }}"
                class="text-white font-semibold text-sm {{ Route::is('gov') ? 'bg-[#12414d] rounded-md' : '' }}">
                <div class="p-3 hover:bg-[#0f3e49] rounded-[1vw]">
                    Pemerintahan
                </div>
            </a>
            <a href="{{ route('demo') }}"
                class="text-white font-semibold text-sm {{ Route::is('demo') ? 'bg-[#12414d] rounded-md' : '' }}">
                <div class="p-3 hover:bg-[#0f3e49] rounded-[1vw]">
                    Demografi
                </div>
            </a>
            <a href="{{ route('geo') }}"
                class="text-white font-semibold text-sm {{ Route::is('geo') ? 'bg-[#12414d] rounded-md' : '' }}">
                <div class="p-3 hover:bg-[#0f3e49] rounded-[1vw]">
                    Geografis
                </div>
            </a>
            <a href="{{ route('news') }}"
                class="text-white font-semibold text-sm {{ Route::is('news') ? 'bg-[#12414d] rounded-md' : '' }}">
                <div class="p-3 hover:bg-[#0f3e49] rounded-[1vw]">
                    Berita
                </div>
            </a>
            <a href="{{ route('service') }}"
                class="text-white font-semibold text-sm {{ Route::is('service') ? 'bg-[#12414d] rounded-md' : '' }}">
                <div class="p-3 hover:bg-[#0f3e49] rounded-[1vw]">
                    Layanan
                </div>
            </a>
        </div>
    </div>

    <div id="sidebar"
    class="h-screen w-60 bg-white fixed left-0 top-0 z-50 flex flex-col px-2 shadow-lg transition-all duration-300 -translate-x-full">
    
    <!-- Logo -->
    <div class="h-16 bg-[#06202B] mt-2 flex items-center gap-3 pl-3 rounded mb-3">
        <span class="text-white font-bold text-lg ">Winangun Atas</span>
    </div>

    <!-- Navigasi -->
    <a href="{{ route('home') }}" class="flex items-center p-3 rounded-lg hover:bg-[#f0f4f7] {{ Route::is('home') ? 'bg-[#0f3e49] text-white' : '' }}">
        <svg class="w-6 h-6 mr-2 {{ Route::is('home') ? 'text-white' : 'text-[#06202B]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M4 10v10h5v-6h6v6h5V10"></path>
        </svg>
        <span class="font-semibold text-sm {{ Route::is('home') ? 'text-white' : 'text-[#06202B]' }}">Beranda</span>
    </a>

    <a href="{{ route('gov') }}" class="flex items-center p-3 rounded-lg hover:bg-[#f0f4f7] {{ Route::is('gov') ? 'bg-[#0f3e49] text-white' : '' }}">
        <svg class="w-6 h-6 mr-2 {{ Route::is('gov') ? 'text-white' : 'text-[#06202B]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M5 10V7a7 7 0 0114 0v3M5 10v10h14V10"></path>
        </svg>
        <span class="font-semibold text-sm {{ Route::is('gov') ? 'text-white' : 'text-[#06202B]' }}">Pemerintahan</span>
    </a>

    <a href="{{ route('demo') }}" class="flex items-center p-3 rounded-lg hover:bg-[#f0f4f7] {{ Route::is('demo') ? 'bg-[#0f3e49] text-white' : '' }}">
        <svg class="w-6 h-6 mr-2 {{ Route::is('demo') ? 'text-white' : 'text-[#06202B]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 14c3 0 5 2 5 5v1H3v-1c0-3 2-5 5-5"/>
            <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2" fill="none"/>
        </svg>
        <span class="font-semibold text-sm {{ Route::is('demo') ? 'text-white' : 'text-[#06202B]' }}">Demografi</span>
    </a>

    <a href="{{ route('geo') }}" class="flex items-center p-3 rounded-lg hover:bg-[#f0f4f7] {{ Route::is('geo') ? 'bg-[#0f3e49] text-white' : '' }}">
        <svg class="w-6 h-6 mr-2 {{ Route::is('geo') ? 'text-white' : 'text-[#06202B]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l6-3 6 3 6-3v13l-6 3-6-3-6 3V8z"/>
        </svg>
        <span class="font-semibold text-sm {{ Route::is('geo') ? 'text-white' : 'text-[#06202B]' }}">Geografis</span>
    </a>

    <a href="{{ route('news') }}" class="flex items-center p-3 rounded-lg hover:bg-[#f0f4f7] {{ Route::is('news') ? 'bg-[#0f3e49] text-white' : '' }}">
        <svg class="w-6 h-6 mr-2 {{ Route::is('news') ? 'text-white' : 'text-[#06202B]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5h16v14H4V5z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 8h8M8 12h8M8 16h4"/>
        </svg>
        <span class="font-semibold text-sm {{ Route::is('news') ? 'text-white' : 'text-[#06202B]' }}">Berita</span>
    </a>

    <a href="{{ route('service') }}" class="flex items-center p-3 rounded-lg hover:bg-[#f0f4f7] {{ Route::is('service') ? 'bg-[#0f3e49] text-white' : '' }}">
        <svg class="w-6 h-6 mr-2 {{ Route::is('service') ? 'text-white' : 'text-[#06202B]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 1010 10A10 10 0 0012 2z" />
        </svg>
        <span class="font-semibold text-sm {{ Route::is('service') ? 'text-white' : 'text-[#06202B]' }}">Layanan</span>
    </a>
</div>


    <div id="overlay" class="fixed inset-0 bg-black opacity-50 z-40 hidden"></div>
</header>
