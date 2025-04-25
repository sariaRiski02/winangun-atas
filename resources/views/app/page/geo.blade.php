@extends('app.main')

@section('main')

<!-- Hero Section -->
<section class="bg-[#06202B] rounded-xl text-white py-12 text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold mb-4">Geografi Desa Winangun atas</h2>
        <p class="text-xl mb-2">Informasi Lokasi dan Kondisi Geografis</p>
        <div class="w-24 h-1 bg-white mx-auto"></div>
    </div>
</section>

<!-- Map Section with Google Maps Iframe -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Peta Lokasi Desa</h2>
            <div class="w-24 h-1 bg-[#06202B] mx-auto"></div>
            <p class="mt-4 text-gray-600">Lokasi geografis interaktif Desa Winangun atas</p>
        </div>

        <!-- Responsive Map Container with Tailwind -->
        <div class="relative w-full overflow-hidden rounded-xl shadow-lg">
            <div class="aspect-[4/5] sm:aspect-[16/9] lg:aspect-[2/1]">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6574.909402917262!2d124.84063713715673!3d1.432863669740669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287735c9debb7d7%3A0x2fceeb0e8efe4e82!2sWinangun%20Atas%2C%20Kec.%20Pineleng%2C%20Kabupaten%20Minahasa%2C%20Sulawesi%20Utara!5e1!3m2!1sid!2sid!4v1745551495756!5m2!1sid!2sid"
                    class="w-full h-full border-0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>
<!-- Informasi Geografi -->
<section class="py-12 bg-[#06202B] text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold mb-2">Informasi Geografi</h2>
            <div class="w-24 h-1 bg-white mx-auto"></div>
            <p class="mt-4">Tentang letak dan kondisi geografis Desa Kema 3</p>
        </div>
        
        <div class="bg-[#04303F] rounded-lg shadow-lg p-8 mb-10">
            <div class="prose max-w-none">
                <p class="text-lg mb-6">Desa Kema 3 adalah salah satu desa di Kecamatan Makmur, Kabupaten Bahagia yang terletak di bagian utara pesisir pantai Sulawesi dengan luas wilayah 90 Ha.</p>
                
                <h3 class="text-2xl font-bold text-white mb-4">Batas Wilayah</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-[#06202B] p-6 rounded-lg">
                        <h4 class="font-bold mb-2">Sebelah Utara</h4>
                        <p>Desa Kema Dua</p>
                    </div>
                    <div class="bg-[#06202B] p-6 rounded-lg">
                        <h4 class="font-bold mb-2">Sebelah Timur</h4>
                        <p>Laut Maluku</p>
                    </div>
                    <div class="bg-[#06202B] p-6 rounded-lg">
                        <h4 class="font-bold mb-2">Sebelah Selatan</h4>
                        <p>Desa Lansot</p>
                    </div>
                    <div class="bg-[#06202B] p-6 rounded-lg">
                        <h4 class="font-bold mb-2">Sebelah Barat</h4>
                        <p>Desa Kema Dua</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Data Lahan -->
        <div class="bg-[#04303F] rounded-lg shadow-lg p-8">
            <h3 class="text-2xl font-bold mb-6">Data Luas Lahan dan Pemukiman</h3>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-[#06202B] text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kategori</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Luas</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Persentase</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#04303F] divide-y divide-gray-600">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Luas Wilayah</td>
                            <td class="px-6 py-4 whitespace-nowrap">90 Ha</td>
                            <td class="px-6 py-4 whitespace-nowrap">100%</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Pemukiman</td>
                            <td class="px-6 py-4 whitespace-nowrap">30 Ha</td>
                            <td class="px-6 py-4 whitespace-nowrap">33.3%</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Lahan Tidur</td>
                            <td class="px-6 py-4 whitespace-nowrap">20 Ha</td>
                            <td class="px-6 py-4 whitespace-nowrap">22.2%</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Tambak/Rawa</td>
                            <td class="px-6 py-4 whitespace-nowrap">15 Ha</td>
                            <td class="px-6 py-4 whitespace-nowrap">16.7%</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Lahan Kritis</td>
                            <td class="px-6 py-4 whitespace-nowrap">5 Ha</td>
                            <td class="px-6 py-4 whitespace-nowrap">5.6%</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Lahan Hutan</td>
                            <td class="px-6 py-4 whitespace-nowrap">5 Ha</td>
                            <td class="px-6 py-4 whitespace-nowrap">5.6%</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Ladang Palawija</td>
                            <td class="px-6 py-4 whitespace-nowrap">5 Ha</td>
                            <td class="px-6 py-4 whitespace-nowrap">5.6%</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Perkebunan Tanaman Keras</td>
                            <td class="px-6 py-4 whitespace-nowrap">5 Ha</td>
                            <td class="px-6 py-4 whitespace-nowrap">5.6%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Visual Representation -->
            <div class="mt-10">
                <h3 class="text-xl font-bold mb-6">Visualisasi Penggunaan Lahan</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-[#06202B] text-white p-4 rounded-lg text-center">
                        <div class="text-3xl font-bold">33.3%</div>
                        <div>Pemukiman</div>
                    </div>
                    <div class="bg-yellow-600 text-white p-4 rounded-lg text-center">
                        <div class="text-3xl font-bold">22.2%</div>
                        <div>Lahan Tidur</div>
                    </div>
                    <div class="bg-blue-600 text-white p-4 rounded-lg text-center">
                        <div class="text-3xl font-bold">16.7%</div>
                        <div>Tambak/Rawa</div>
                    </div>
                    <div class="bg-gray-600 text-white p-4 rounded-lg text-center">
                        <div class="text-3xl font-bold">27.8%</div>
                        <div>Lainnya</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
