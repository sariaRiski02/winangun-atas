@extends('app.main-dash')

@section('main')
@include('app.notification.notif')

<div class="min-h-screen">
    <main class="py-5">
        <div class="max-w-6xl mx-auto px-2 sm:px-4 lg:px-4">
            <div class="bg-white rounded-lg shadow overflow-hidden">

                <!-- Header -->
                <div class="bg-[#06202B] py-5 px-6">
                    <h1 class="text-xl font-semibold text-white">Kelola Data Demografi Desa</h1>
                </div>

                <div class="p-6 space-y-10">

                    <!-- Form Tambah Penduduk -->
                    <div class="border rounded-lg p-6 shadow-sm">
                        <h2 class="text-lg font-semibold text-[#06202B] mb-4 border-l-4 border-[#36c7da] pl-3">Tambah Data Penduduk</h2>

                        <form action="{{ route('dash.demo.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @csrf

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="name" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                @error('name')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">No KK</label>
                                <input type="text" name="no_kk" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                @error('no_kk')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">No NIK</label>
                                <input type="text" name="nik" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                @error('nik')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status dalam Keluarga</label>
                                <select name="family_status" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    <option value="">Pilih Status</option>
                                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Orang Tua">Orang Tua</option>
                                    <option value="Famili Lain">Famili Lain</option>
                                </select>
                                @error('family_status')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status Pernikahan</label>
                                <select name="marital_status" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    <option value="">Pilih Status</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                                @error('marital_status')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                                <input type="text" name="job" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                @error('job')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                <input type="date" name="birth_date" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                @error('birth_date')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Agama</label>
                                <select name="religion" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>
                                @error('religion')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Dusun / Tempat Tinggal</label>
                                <select name="village" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    <option value="">Pilih Dusun</option>
                                    <option value="Dusun A">Dusun A</option>
                                    <option value="Dusun B">Dusun B</option>
                                    <option value="Dusun C">Dusun C</option>
                                    <option value="Dusun D">Dusun D</option>
                                </select>
                                @error('village')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <select name="gender" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('gender')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2 flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                                    Tambah Penduduk
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Form Upload Excel -->
                    <div class="border rounded-lg p-6 shadow-sm">
                        <h2 class="text-lg font-semibold text-[#06202B] mb-4 border-l-4 border-[#36c7da] pl-3">Import Data Excel</h2>

                        <form action="{{ route('dash.demo.import') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upload File Excel (.xlsx)</label>
                                <input type="file" name="file" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3" accept=".xlsx,.csv">
                                @error('file')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                                    Import Data
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Tabel Data Penduduk -->
                    <div class="bg-white rounded-lg shadow-md">
                        <h2 class="text-lg font-bold text-[#06202B] mb-4 border-l-4 border-[#36c7da] pl-3">Daftar Penduduk</h2>

                        <div class="overflow-x-scroll">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-[#06202B] text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase">Nama</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase">No KK</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase">No NIK</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase">Pekerjaan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase">Dusun</th>
                                        <th class="px-6 py-3 text-center text-xs font-medium uppercase">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($residents as $resident)
                                        <tr>
                                            <td class="px-6 py-4">{{ $resident->name }}</td>
                                            <td class="px-6 py-4">{{ $resident->no_kk }}</td>
                                            <td class="px-6 py-4">{{ $resident->nik }}</td>
                                            <td class="px-6 py-4">{{ $resident->family_status }}</td>
                                            <td class="px-6 py-4">{{ $resident->job }}</td>
                                            <td class="px-6 py-4">{{ $resident->village }}</td>
                                            <td class="px-6 py-4 text-center">
                                                <form action="{{ route('dash.demo.delete', $resident->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-600 hover:text-red-800">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="p-5 border-t">
                            {{ $residents->links('pagination::tailwind') }}
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </main>
</div>

@endsection
