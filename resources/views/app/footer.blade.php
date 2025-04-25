<footer class="bg-[#06202B] text-white pt-12 pb-3 rounded-t-2xl mt-3">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center mb-4">
                    <img src="{{ asset('images/kades.png') }}" alt="Logo Desa" class="h-12 w-12 rounded-full mr-3">
                    <div>
                        <h3 class="text-xl font-bold">Desa Winangun Atas</h3>
                        <p class="text-sm text-gray-300">Membangun Desa, Memajukan Bangsa</p>
                    </div>
                </div>
                <p class="text-gray-300 mb-4">Website resmi Pemerintah Desa Winangun Atas, Kecamatan Kema, Kabupaten Minahasa utara.</p>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-4">Tautan Cepat</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition duration-300">Beranda</a></li>
                    <li><a href="{{ route('gov') }}" class="text-gray-300 hover:text-white transition duration-300">Pemerintahan</a></li>
                    <li><a href="{{ route('demo') }}" class="text-gray-300 hover:text-white transition duration-300">Demografi</a></li>
                    <li><a href="{{ route('geo') }}" class="text-gray-300 hover:text-white transition duration-300">Geografi</a></li>
                    <li><a href="{{ route('news') }}" class="text-gray-300 hover:text-white transition duration-300">Berita</a></li>
                    <li><a href="{{ route('service') }}" class="text-gray-300 hover:text-white transition duration-300">Layanan</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-4">Kontak Kami</h3>
                <ul class="space-y-2">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-[#3ab5b0] mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-gray-300">Jl. Raya Desa No. 123, Desa Winangun Atas</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-[#3ab5b0] mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="text-gray-300">(021) 1234-5678</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-[#3ab5b0] mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-gray-300">info@desaWinangunAtas.desa.id</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-[#3ab5b0] mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span class="text-gray-300">@desaKema3</span>
                    </li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-4">Jam Operasional</h3>
                <ul class="space-y-2">
                    <li class="text-gray-300">Senin - Jumat: 08.00 - 16.00</li>
                    <li class="text-gray-300">Sabtu: 08.00 - 12.00</li>
                    <li class="text-gray-300">Minggu: Tutup</li>
                </ul>
                <div class="mt-4">
                    <h4 class="font-semibold mb-2">Ikuti Kami</h4>
                    <div class="flex space-x-3">
                        @php
                            $hoverColor = 'hover:bg-[#0f3e49]';
                        @endphp
                
                        <!-- Facebook -->
                        <a href="#" class="bg-[#3ab5b0] {{ $hoverColor }} h-8 w-8 rounded-full flex items-center justify-center transition duration-300">
                            <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12C22 6.477 17.523 2 12 2S2 6.477 2 12c0 5.016 3.675 9.163 8.438 9.879v-6.987h-2.54v-2.892h2.54V9.845c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.772-1.63 1.562v1.874h2.773l-.443 2.892h-2.33v6.987C18.325 21.163 22 17.016 22 12z"/>
                            </svg>
                        </a>
                
                        <!-- Twitter -->
                        <a href="#" class="bg-[#3ab5b0] {{ $hoverColor }} h-8 w-8 rounded-full flex items-center justify-center transition duration-300">
                            <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0022.43.36a9.14 9.14 0 01-2.88 1.1 4.52 4.52 0 00-7.69 4.12A12.86 12.86 0 013 4.16a4.48 4.48 0 001.39 6 4.52 4.52 0 01-2.05-.57v.06a4.52 4.52 0 003.63 4.44 4.52 4.52 0 01-2.04.08 4.52 4.52 0 004.22 3.13A9.06 9.06 0 012 19.54a12.94 12.94 0 007 2.05c8.4 0 13-7 13-13.07 0-.2 0-.39-.01-.58A9.22 9.22 0 0023 3z"/>
                            </svg>
                        </a>
                
                        <!-- Instagram -->
                        <a href="#" class="bg-[#3ab5b0] {{ $hoverColor }} h-8 w-8 rounded-full flex items-center justify-center transition duration-300">
                            <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.36 3.608 1.336.975.975 1.273 2.242 1.336 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.36 2.633-1.336 3.608-.975.975-2.242 1.273-3.608 1.336-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.36-3.608-1.336-.975-.975-1.273-2.242-1.336-3.608C2.175 15.647 2.163 15.267 2.163 12s.012-3.584.07-4.85c.062-1.366.36-2.633 1.336-3.608C4.544 2.593 5.811 2.295 7.177 2.233 8.443 2.175 8.823 2.163 12 2.163zm0 1.838c-3.18 0-3.555.012-4.805.07-1.174.054-1.808.24-2.229.402a3.39 3.39 0 00-1.228.796 3.39 3.39 0 00-.796 1.228c-.162.421-.348 1.055-.402 2.229-.058 1.25-.07 1.625-.07 4.805s.012 3.555.07 4.805c.054 1.174.24 1.808.402 2.229a3.39 3.39 0 00.796 1.228 3.39 3.39 0 001.228.796c.421.162 1.055.348 2.229.402 1.25.058 1.625.07 4.805.07s3.555-.012 4.805-.07c1.174-.054 1.808-.24 2.229-.402a3.39 3.39 0 001.228-.796 3.39 3.39 0 00.796-1.228c.162-.421.348-1.055.402-2.229.058-1.25.07-1.625.07-4.805s-.012-3.555-.07-4.805c-.054-1.174-.24-1.808-.402-2.229a3.39 3.39 0 00-.796-1.228 3.39 3.39 0 00-1.228-.796c-.421-.162-1.055-.348-2.229-.402-1.25-.058-1.625-.07-4.805-.07zm0 4.838a5 5 0 110 10 5 5 0 010-10zm0 8.162a3.162 3.162 0 100-6.324 3.162 3.162 0 000 6.324zm5.406-8.845a1.2 1.2 0 110-2.4 1.2 1.2 0 010 2.4z"/>
                            </svg>
                        </a>
                
                        <!-- YouTube -->
                        <a href="#" class="bg-[#3ab5b0] {{ $hoverColor }} h-8 w-8 rounded-full flex items-center justify-center transition duration-300">
                            <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a2.949 2.949 0 00-2.078-2.078C19.716 3.5 12 3.5 12 3.5s-7.716 0-9.42.608a2.949 2.949 0 00-2.078 2.078C.5 7.89.5 12 .5 12s0 4.11.608 5.814a2.949 2.949 0 002.078 2.078C4.284 20.5 12 20.5 12 20.5s7.716 0 9.42-.608a2.949 2.949 0 002.078-2.078C23.5 16.11 23.5 12 23.5 12s0-4.11-.002-5.814zM9.75 15.02V8.98l6.5 3.02-6.5 3.02z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="mt-2 pt-2 border-t border-[#1f3f4c] text-center">
            <p class="text-gray-400">
                &copy; created by <a href="https://mrizkysaria.netlify.app/" target="_blank" class="underline hover:text-white">rizky</a> - Hak Cipta Dilindungi.
            </p>
        </div>
    </div>
</footer>
