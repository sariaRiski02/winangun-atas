@extends('app.main-dash')

@section('main')

<div class="min-h-screen">
    <main class="py-5">
        <div class="max-w-5xl mx-auto px-2 sm:px-4 lg:px-4">
            <div class="bg-white rounded-lg shadow overflow-hidden">

                 <!-- Warning -->
                 @if (session('success') || session('error') || ($totalPercentage >= 100))
                 <div id="notifAlert" class="relative bg-{{ session('success') ? 'green' : (session('error') ? 'red' : 'red') }}-100 border-l-4 border-{{ session('success') ? 'green' : (session('error') ? 'red' : 'red') }}-500 text-{{ session('success') ? 'green' : (session('error') ? 'red' : 'red') }}-700 p-4 mb-6" role="alert">
                     <button onclick="closeNotif()" class="absolute top-2 right-2 text-xl text-{{ session('success') ? 'green' : (session('error') ? 'red' : 'red') }}-700 hover:text-black">&times;</button>
                     <p class="font-bold">
                         {{ session('success') ? 'Berhasil!' : (session('error') ? 'Gagal!' : 'Peringatan!') }}
                     </p>
                     <p>
                         {{ session('success') ?? session('error') ?? 'Lahan desa telah penuh (' . number_format($totalPercentage, 1) . '%).' }}
                     </p>
                 </div>
                @endif
                <!-- Header -->
                <div class="bg-[#06202B] py-5 px-6">
                    <h1 class="text-xl font-semibold text-white">Kelola Data Geografi Desa</h1>
                </div>

                <div class="p-6 space-y-10">

                    <!-- Form Kelola Batas Wilayah -->
                    <div class="border rounded-lg p-6 shadow-sm">
                        <h2 class="text-lg font-semibold text-[#06202B] mb-4 border-l-4 border-[#36c7da] pl-3">Kelola Batas Wilayah Desa</h2>

                        <form action="{{ route('dash.geo.border.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="direction" class="block text-sm font-medium text-gray-700">Arah</label>
                                <input type="text" id="direction" name="direction"
                                    class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-[#06202B] focus:border-[#06202B]"
                                    placeholder="Contoh: Utara">
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <input type="text" id="description" name="description"
                                    class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-[#06202B] focus:border-[#06202B]"
                                    placeholder="Contoh: Desa Kema Dua">
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                                    Simpan Batas Wilayah
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Tabel List Batas Wilayah -->
                    <div class="mt-6 bg-white rounded-lg shadow overflow-hidden">
                        <h2 class="text-lg font-bold text-[#06202B] mb-4 border-l-4 border-[#36c7da] pl-3">Daftar Batas Wilayah</h2>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-[#06202B] text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase">Arah</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase">Deskripsi</th>
                                        <th class="px-6 py-3 text-center text-xs font-medium uppercase">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($borders as $border)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 text-sm text-gray-700">{{ $border->direction }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-700">{{ $border->description }}</td>
                                            <td class="px-6 py-4 text-center">
                                                <form action="{{ route('dash.geo.border.delete', $border->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Form Ubah Luas Desa -->
                    <div class="border rounded-lg p-6 shadow-sm">
                        <h2 class="text-lg font-semibold text-[#06202B] mb-4 border-l-4 border-[#36c7da] pl-3">Update Luas Wilayah Desa</h2>

                        <form action="{{ route('dash.geo.village') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="village_area" class="block text-sm font-medium text-gray-700">Luas Wilayah Desa (Ha)</label>
                                <input type="text" id="village_area" name="village_area"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-2 focus:ring-[#06202B] focus:border-[#06202B]"
                                    value="{{ old('village_area', $village->village_area ?? '') }}"
                                    placeholder="Contoh: 90">
                                    <p class="text-sm text-gray-500 mt-1">Gunakan tanda titik (.) untuk angka desimal, bukan koma (,).</p>
                                @error('village_area')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                                    Simpan Luas Wilayah
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Form Tambah Data Kategori -->
                    <div class="border rounded-lg p-6 shadow-sm">
                        <h2 class="text-lg font-semibold text-[#06202B] mb-4 border-l-4 border-[#36c7da] pl-3">Tambah Data Kategori Lahan</h2>

                        <form action="{{ route('dash.geo.category') }}" method="POST" class="space-y-4">
                            @csrf

                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                                <input type="text" id="category" name="category"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-2 focus:ring-[#06202B] focus:border-[#06202B]"
                                    placeholder="Contoh: Pemukiman">
                                @error('category')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="area" class="block text-sm font-medium text-gray-700">Luas (Ha)</label>
                                <input type="text" id="area" name="area"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-2 focus:ring-[#06202B] focus:border-[#06202B]"
                                    placeholder="Contoh: 30">
                                <p class="text-sm text-gray-500 mt-1">Gunakan tanda titik (.) untuk angka desimal, bukan koma (,).</p>
                                @error('area')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                                    Tambah Kategori
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Tabel Data Geografi -->
                    <div class="bg-white rounded-lg shadow-md">
                        <h2 class="text-lg font-bold text-[#06202B] mb-4 border-l-4 border-[#36c7da] pl-3">Daftar Data Geografi</h2>

                        <div class="overflow-x-scroll">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-[#06202B] text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase">Kategori</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase">Luas (Ha)</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase">Persentase (%)</th>
                                        <th class="px-6 py-3 text-center text-xs font-medium uppercase">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($categories as $item)
                                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                                            <td class="px-6 py-4 text-sm text-gray-700">{{ $item->category }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-700">{{ $item->area }} Ha</td>
                                            <td class="px-6 py-4 text-sm text-gray-700">
                                                {{ $village && $village->village_area ? number_format(($item->area / $village->village_area) * 100, 2) : '0' }}%
                                                
                                            </td>
                                            <td class="px-6 py-4 text-center flex justify-center gap-2">
                                                <button 
                                                    class="px-3 py-1 bg-amber-400 text-white rounded hover:bg-amber-500 text-sm"
                                                    onclick="openEditModal({{ $item->id }}, '{{ $item->category }}', '{{ $item->area }}')">
                                                    Edit
                                                </button>
                                                <form action="{{ route('dash.geo.category.delete', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>
</div>

<!-- Modal Edit -->
<div id="editModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
    <div class="bg-white rounded-lg p-6 w-96 relative">
        <h3 class="text-lg font-bold mb-4 text-[#06202B]">Edit Kategori</h3>

        <form action="{{ route('dash.geo.category.update') }}" method="POST" id="editForm" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit-id" name="id">

            <div>
                <label for="edit-category" class="block text-sm font-medium text-gray-700">Kategori</label>
                <input type="text" id="edit-category" name="category"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-2 focus:ring-[#06202B] focus:border-[#06202B]">
            </div>

            <div>
                <label for="edit-area" class="block text-sm font-medium text-gray-700">Luas (Ha)</label>
                <input type="text" id="edit-area" name="area"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-2 focus:ring-[#06202B] focus:border-[#06202B]">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 border border-gray-300 rounded-md">Batal</button>
                <button type="submit" class="px-6 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">Simpan</button>
            </div>
        </form>

    </div>
</div>

@endsection

@push('script')
<script>
    function openEditModal(id, category, area) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-category').value = category;
        document.getElementById('edit-area').value = area;
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function closeNotif() {
        document.getElementById('notifAlert').remove();
    }

    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(() => {
            const notif = document.getElementById('notifAlert');
            if (notif) {
                notif.remove();
            }
        }, 5000); // 5 detik
    });
</script>
@endpush
