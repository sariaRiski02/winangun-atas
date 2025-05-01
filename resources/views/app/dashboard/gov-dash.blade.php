@extends('app.main-dash')

@section('main')
@include('app.notification.notif')
<div class="min-h-screen">
    <main class="py-5">
        <div class="max-w-5xl mx-auto px-2 sm:px-4 lg:px-4">
            <div class="bg-white rounded-lg shadow overflow-hidden">

                <!-- Header -->
                <div class="bg-[#06202B] py-5 px-6">
                    <h1 class="text-xl font-semibold text-white">Edit Struktur Desa & Sejarah</h1>
                </div>

                <!-- Form -->
                <form class="p-6 space-y-6" action="{{ route('dash.pemerintahan.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Sejarah Desa -->
                    <div>
                        <label for="history" class="block text-sm font-medium text-gray-700">Sejarah Desa</label>
                        <textarea id="history" name="history" rows="8"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-2 focus:ring-[#06202B] focus:border-[#06202B]"
                            placeholder="Masukkan sejarah desa lengkap...">{{ old('history', $structure->history ?? '') }}</textarea>
                        @error('history')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Upload Struktur Pemerintahan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Struktur Pemerintahan</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="text-center">
                                <button type="button" onclick="document.getElementById('structure-photo').click()" class="px-4 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                                    Pilih Foto Struktur Pemerintahan
                                </button>
                                <input id="structure-photo" name="structure_photo" type="file" accept="image/*" class="hidden" onchange="showFileName(this, 'structure-label')">
                                <p id="structure-label" class="mt-2 text-sm text-gray-600"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Struktur BPD -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Struktur BPD</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="text-center">
                                <button type="button" onclick="document.getElementById('bpd-photo').click()" class="px-4 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                                    Pilih Foto Struktur BPD
                                </button>
                                <input id="bpd-photo" name="bpd_photo" type="file" accept="image/*" class="hidden" onchange="showFileName(this, 'bpd-label')">
                                <p id="bpd-label" class="mt-2 text-sm text-gray-600"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Struktur PKK -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Struktur PKK</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="text-center">
                                <button type="button" onclick="document.getElementById('pkk-photo').click()" class="px-4 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                                    Pilih Foto Struktur PKK
                                </button>
                                <input id="pkk-photo" name="pkk_photo" type="file" accept="image/*" class="hidden" onchange="showFileName(this, 'pkk-label')">
                                <p id="pkk-label" class="mt-2 text-sm text-gray-600"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Struktur Karang Taruna -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Struktur Karang Taruna</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="text-center">
                                <button type="button" onclick="document.getElementById('karangtaruna-photo').click()" class="px-4 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                                    Pilih Foto Struktur Karang Taruna
                                </button>
                                <input id="karangtaruna-photo" name="karangtaruna_photo" type="file" accept="image/*" class="hidden" onchange="showFileName(this, 'karangtaruna-label')">
                                <p id="karangtaruna-label" class="mt-2 text-sm text-gray-600"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('dash.home') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </main>
</div>

<!-- Script untuk menampilkan nama file -->
<script>
    function showFileName(input, labelId) {
        const label = document.getElementById(labelId);
        if (input.files && input.files.length > 0) {
            label.textContent = `File dipilih: ${input.files[0].name}`;
        } else {
            label.textContent = '';
        }
    }
</script>
@endsection
