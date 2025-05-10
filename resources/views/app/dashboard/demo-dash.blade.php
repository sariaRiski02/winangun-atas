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
                                <input value="{{ old('name') }}" type="text" name="name" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                @error('name')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">No KK</label>
                                <input value="{{ old('no_kk') }}" type="text" name="no_kk" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                @error('no_kk')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">No NIK</label>
                                <input value="{{ old('nik') }}" type="text" name="nik" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
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
                                <input value="{{ old('job') }}" type="text" name="job" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                @error('job')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                <input value="{{ old('birth_date') }}" type="date" name="birth_date" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
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
                                    <option value="Jaga I">Jaga I</option>
                                    <option value="Jaga II">Jaga II</option>
                                    <option value="Jaga III">Jaga III</option>
                                    <option value="Jaga IV">Jaga IV</option>
                                </select>
                                @error('village')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <select name="gender" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('gender')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pendidikan Terakhir</label>
                                <select name="education" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    <option value="">Pilih Pendidikan</option>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D3">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status Disabilitas</label>
                                <select name="disability" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    <option value="">Pilih Status</option>
                                    <option value="Tidak">Tidak</option>
                                    <option value="Tunanetra">Tunanetra</option>
                                    <option value="Tunarungu">Tunarungu</option>
                                    <option value="Tunadaksa">Tunadaksa</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
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

                        <!-- Form Filter dan Pencarian -->
                        <form method="GET" action="{{ route('dash.demo') }}" class="mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                
                                <!-- Input Pencarian -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Cari (Nama, NIK, KK, Jaga)</label>
                                    <input type="text" name="search" value="{{ request('search') }}" class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3" placeholder="Cari...">
                                </div>

                                <!-- Filter Status Pernikahan -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Status Pernikahan</label>
                                    <select name="marital_status" class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                        <option value="">Semua</option>
                                        <option value="Belum Menikah" {{ request('marital_status') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                        <option value="Menikah" {{ request('marital_status') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                        <option value="Cerai Hidup" {{ request('marital_status') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                        <option value="Cerai Mati" {{ request('marital_status') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                    </select>
                                </div>

                                <!-- Filter Jaga -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Jaga</label>
                                    <select name="village" class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                        <option value="">Semua</option>
                                        <option value="Jaga I" {{ request('village') == 'Jaga I' ? 'selected' : '' }}>Jaga I</option>
                                        <option value="Jaga II" {{ request('village') == 'Jaga II' ? 'selected' : '' }}>Jaga II</option>
                                        <option value="Jaga III" {{ request('village') == 'Jaga III' ? 'selected' : '' }}>Jaga III</option>
                                        <option value="Jaga IV" {{ request('village') == 'Jaga IV' ? 'selected' : '' }}>Jaga IV</option>
                                    </select>
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="flex items-end gap-2">
                                    <button type="submit" class="px-4 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                                        Cari / Filter
                                    </button>
                                    <a href="{{ route('dash.demo') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">
                                        Reset
                                    </a>
                                </div>
                            </div>
                        </form>



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
                                            <td class="px-6 py-4 text-center flex justify-center gap-2">
                                                <!-- View -->
                                                <button onclick='openViewModal({{ json_encode($resident) }})' class="text-blue-600 hover:text-blue-800" title="Lihat">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 2C6.686 2 4 6 4 10s2.686 8 6 8 6-4 6-8-2.686-8-6-8zM2 10c0-4.418 3.582-8 8-8s8 3.582 8 8-3.582 8-8 8-8-3.582-8-8zm8-4a4 4 0 100 8 4 4 0 000-8z"/>
                                                    </svg>
                                                </button>
                                            
                                                <!-- Edit -->
                                                <button onclick='openEditModal({{ json_encode($resident) }})' class="text-amber-500 hover:text-amber-600" title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M17.414 2.586a2 2 0 010 2.828L7.828 15H5v-2.828l9.586-9.586a2 2 0 012.828 0zM3 17h14a1 1 0 001-1v-6a1 1 0 00-2 0v5H4V5h5a1 1 0 100-2H3a1 1 0 00-1 1v12a1 1 0 001 1z"/>
                                                    </svg>
                                                </button>
                                            
                                                <!-- Delete -->
                                                <form action="{{ route('dash.demo.delete', $resident->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H3a1 1 0 100 2h1v9a2 2 0 002 2h8a2 2 0 002-2V6h1a1 1 0 100-2h-2V3a1 1 0 00-1-1H6zm2 5a1 1 0 012 0v6a1 1 0 11-2 0V7zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V7z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
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

                   <!-- Modal View Penduduk -->
                    <div id="viewModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white w-full max-w-3xl p-6 rounded-lg shadow-lg relative overflow-y-auto max-h-screen">
                            <!-- Tombol Close -->
                            <button onclick="closeViewModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-2xl">&times;</button>

                            <!-- Title -->
                            <h3 class="text-xl font-bold text-[#06202B] mb-4">Detail Penduduk</h3>

                            <!-- Detail Penduduk -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6" id="resident-detail">
                                <!-- Data penduduk diisi dari JavaScript -->
                            </div>

                            <!-- Tombol Salin -->
                            <div class="flex justify-end mb-6">
                                <button onclick="copyToClipboard()" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md">
                                    Salin Semua Data
                                </button>
                            </div>

                            <hr class="mb-6">

                            <!-- Title Anggota Keluarga -->
                            <h3 class="text-lg font-bold text-[#06202B] mb-4">Anggota Keluarga (No KK Sama)</h3>

                            <!-- Tabel Anggota -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-[#06202B] text-white">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Nama</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Status Keluarga</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Jenis Kelamin</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200" id="family-members">
                                        <!-- Anggota keluarga diisi dari JavaScript -->
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Modal Edit Penduduk -->
                    <div id="editModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg relative">
                            <button onclick="closeEditModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-2xl">&times;</button>
                            <h3 class="text-xl font-bold text-[#06202B] mb-4">Edit Data Penduduk</h3>

                            <form id="editForm" method="POST" action="">
                                @csrf
                                @method('PUT')
                            
                                <input type="hidden" name="id" id="edit-id">
                            
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                                        <input type="text" name="name" id="edit-name" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    </div>
                            
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">No KK</label>
                                        <input type="text" name="no_kk" id="edit-kk" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    </div>
                            
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">No NIK</label>
                                        <input type="text" name="nik" id="edit-nik" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    </div>
                            
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Status dalam Keluarga</label>
                                        <select name="family_status" id="edit-family" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                            <option value="">Pilih Status</option>
                                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                                            <option value="Istri">Istri</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Orang Tua">Orang Tua</option>
                                            <option value="Famili Lain">Famili Lain</option>
                                        </select>
                                    </div>
                            
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Status Pernikahan</label>
                                        <select name="marital_status" id="edit-marital" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                            <option value="">Pilih Status</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>
                            
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                                        <input type="text" name="job" id="edit-job" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    </div>
                            
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                        <input type="date" name="birth_date" id="edit-birth" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    </div>
                            
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Agama</label>
                                        <select name="religion" id="edit-religion" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                            <option value="">Pilih Agama</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                        </select>
                                    </div>
                            
                                    <div>
                                        @php
                                            $jagas = ['Jaga I', 'Jaga II', 'Jaga III', 'Jaga IV'];
                                        @endphp
                                        <label class="block text-sm font-medium text-gray-700">Jaga</label>
                                        <select name="village" id="edit-village" required class="form-input w-full">
                                            <option value="">Pilih Jaga</option>
                                            @foreach($jagas as $jaga)
                                                <option value="{{ $jaga }}">{{ $jaga }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                        <select name="gender" id="edit-gender" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Pendidikan Terakhir</label>
                                    <select name="education" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                        <option value="">Pilih Pendidikan</option>
                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Status Disabilitas</label>
                                    <select name="disability" required class="form-input w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                                        <option value="">Pilih Status</option>
                                        <option value="Tidak">Tidak</option>
                                        <option value="Tunanetra">Tunanetra</option>
                                        <option value="Tunarungu">Tunarungu</option>
                                        <option value="Tunadaksa">Tunadaksa</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                
                            
                                <div class="flex justify-end mt-6">
                                    <button type="submit" class="px-6 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </form>
                            

                        </div>
                    </div>




                </div>

            </div>
        </div>
    </main>
</div>

@endsection

@push('script')
<script>
    let residents = @json($residents->pluck(null, 'id'));

    function openViewModal(resident) {
        document.getElementById('viewModal').classList.remove('hidden');

        // Data Penduduk
        const detailHtml = `
            <p><strong>Nama:</strong> ${resident.name}</p>
            <p><strong>No KK:</strong> ${resident.no_kk}</p>
            <p><strong>No NIK:</strong> ${resident.nik}</p>
            <p><strong>Status Keluarga:</strong> ${resident.family_status}</p>
            <p><strong>Status Nikah:</strong> ${resident.marital_status}</p>
            <p><strong>Pekerjaan:</strong> ${resident.job}</p>
            <p><strong>Tanggal Lahir:</strong> ${resident.birth_date}</p>
            <p><strong>Agama:</strong> ${resident.religion}</p>
            <p><strong>Dusun:</strong> ${resident.village}</p>
            <p><strong>Jenis Kelamin:</strong> ${resident.gender}</p>
        `;
        document.getElementById('resident-detail').innerHTML = detailHtml;

        // Anggota Keluarga
        let familyHtml = '';
        for (const [id, r] of Object.entries(residents)) {
            if (r.no_kk == resident.no_kk && r.id != resident.id) {
                familyHtml += `
                    <tr>
                        <td class="px-6 py-4">${r.name}</td>
                        <td class="px-6 py-4">${r.family_status}</td>
                        <td class="px-6 py-4">${r.gender}</td>
                    </tr>
                `;
            }
        }
        document.getElementById('family-members').innerHTML = familyHtml || '<tr><td colspan="3" class="px-6 py-4 text-center text-gray-500">Tidak ada anggota keluarga lain.</td></tr>';
    }

    function closeViewModal() {
        document.getElementById('viewModal').classList.add('hidden');
    }

    function copyToClipboard() {
        const text = document.getElementById('resident-detail').innerText;
        navigator.clipboard.writeText(text).then(() => {
            alert('Data berhasil disalin!');
        }).catch(() => {
            alert('Gagal menyalin data!');
        });
    }


    function openEditModal(resident) {
        document.getElementById('editModal').classList.remove('hidden');

        // Isi input biasa
        document.getElementById('edit-id').value = resident.id;
        document.getElementById('edit-name').value = resident.name;
        document.getElementById('edit-kk').value = resident.no_kk;
        document.getElementById('edit-nik').value = resident.nik;
        document.getElementById('edit-job').value = resident.job;
        document.getElementById('edit-birth').value = resident.birth_date;
        document.getElementById('edit-education').value = toTitleCase(resident.education);
        document.getElementById('edit-disability').value = toTitleCase(resident.disability);


        // Fungsi kapitalisasi awal kata
        const toTitleCase = (str) => {
            return str.toLowerCase().split(' ').map(word => {
                return word.charAt(0).toUpperCase() + word.slice(1);
            }).join(' ');
        };

        // Isi dropdown dengan nilai sesuai data
        document.getElementById('edit-family').value = toTitleCase(resident.family_status);
        document.getElementById('edit-marital').value = toTitleCase(resident.marital_status);
        document.getElementById('edit-religion').value = toTitleCase(resident.religion);
        document.getElementById('edit-gender').value = toTitleCase(resident.gender);

        // Untuk dropdown Jaga (village)
        const villageValue = toTitleCase(resident.village);
        const villageSelect = document.getElementById('edit-village');

        // Reset selected sebelumnya
        Array.from(villageSelect.options).forEach(option => {
            option.selected = option.value === villageValue;
        });

        // Set form action
        document.getElementById('editForm').action = `/dashboard/demo/update/${resident.id}`;
    }





function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

</script>
@endpush

