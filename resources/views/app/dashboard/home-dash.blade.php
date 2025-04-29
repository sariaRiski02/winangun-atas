@extends('app.main-dash')

@section('main')
@include('app.notification.notif')

<div class="min-h-screen">
    <main class="py-5">
        <div class="max-w-5xl mx-auto px-2 sm:px-4 lg:px-4">
            <div class="bg-white rounded-lg shadow overflow-hidden">

                <!-- Header -->
                <div class="bg-[#06202B] py-5 px-6">
                    <h1 class="text-xl font-semibold text-white">Edit Profil Kades & Hero</h1>
                </div>

                <!-- Form -->
                <form class="p-6 space-y-6" action="{{ route('dash.home.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Upload Foto Kades -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto Kades</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <button type="button" onclick="document.getElementById('kades-photo').click()" class="px-4 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f] transition">
                                    Pilih Foto
                                </button>
                                <input id="kades-photo" name="kades_photo" type="file" accept="image/*" class="hidden">
                                <p class="text-xs text-gray-500 mt-2">Format: PNG, JPG, maksimal 3MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Preview Foto Kades -->
                    <div id="preview-kades" class="hidden mt-4">
                        <label class="block text-sm font-medium text-gray-700">Pratinjau Foto Kades</label>
                        <div class="mt-2">
                            <img id="preview-kades-image" class="h-48 w-full object-cover rounded-md" alt="Preview Foto Kades">
                        </div>
                    </div>


                    <!-- Kata Sambutan Kades -->
                    <div>
                        <label for="greeting" class="block text-sm font-medium text-gray-700">Kata Sambutan Kades</label>
                        <textarea id="greeting" name="greeting" rows="5"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-[#06202B] focus:border-[#06202B]"
                            placeholder="Masukkan kata sambutan...">{{ old('greeting', $profile->greeting ?? '') }}</textarea>
                        @error('greeting')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    
                    <!-- Upload Foto Hero -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto Hero Landing Page</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <button type="button" onclick="document.getElementById('hero-photo').click()" class="px-4 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f] transition">
                                    Pilih Foto
                                </button>
                                <input id="hero-photo" name="hero_photo" type="file" accept="image/*" class="hidden">
                                <p class="text-xs text-gray-500 mt-2">Format: PNG, JPG, maksimal 3MB</p>
                            </div>
                        </div>
                    </div>
                    <!-- Preview Foto Hero -->
                    <div id="preview-hero" class="hidden mt-4">
                        <label class="block text-sm font-medium text-gray-700">Pratinjau Foto Hero</label>
                        <div class="mt-2">
                            <img id="preview-hero-image" class="h-48 w-full object-cover rounded-md" alt="Preview Foto Hero">
                        </div>
                    </div>
                    
                    <!-- Tombol Submit -->
                    <div class="flex justify-end space-x-3">
                        <button type="submit" class="px-4 py-2 bg-[#06202B] text-white rounded-md hover:bg-[#0a2e3f]">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </main>
</div>
@endsection

@push('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Preview Foto Kades
    const kadesInput = document.getElementById('kades-photo');
    const kadesPreviewDiv = document.getElementById('preview-kades');
    const kadesPreviewImg = document.getElementById('preview-kades-image');

    kadesInput.addEventListener('change', function (e) {
        if (e.target.files && e.target.files[0]) {
            let reader = new FileReader();
            reader.onload = function (event) {
                kadesPreviewImg.src = event.target.result;
                kadesPreviewDiv.classList.remove('hidden');
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    // Preview Foto Hero
    const heroInput = document.getElementById('hero-photo');
    const heroPreviewDiv = document.getElementById('preview-hero');
    const heroPreviewImg = document.getElementById('preview-hero-image');

    heroInput.addEventListener('change', function (e) {
        if (e.target.files && e.target.files[0]) {
            let reader = new FileReader();
            reader.onload = function (event) {
                heroPreviewImg.src = event.target.result;
                heroPreviewDiv.classList.remove('hidden');
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });
});
</script>
@endpush

