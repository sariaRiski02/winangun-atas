@extends('app.main-dash')

@section('main')
@include('app.notification.notif')

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold text-[#06202B] mb-6 text-center">Pengaturan Akun</h2>

    {{-- Update Nama & Email --}}
    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4 mb-10">
        @csrf
        @method('PATCH')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required
                class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-[#06202B] focus:border-[#06202B]">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}" required
                class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-[#06202B] focus:border-[#06202B]">
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="px-6 py-2 bg-[#06202B] text-white rounded hover:bg-[#04131A]">
                Simpan Perubahan
            </button>
        </div>
    </form>

    {{-- Ganti Password --}}
    <hr class="my-8">
    <form method="POST" action="{{ route('profile.password.update') }}" class="space-y-4 mb-10">
        @csrf
        @method('PUT')

        <div>
            <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat Ini</label>
            <input id="current_password" name="current_password" type="password" required
                class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-[#06202B] focus:border-[#06202B]">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
            <input id="password" name="password" type="password" required
                class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-[#06202B] focus:border-[#06202B]">
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-[#06202B] focus:border-[#06202B]">
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="px-6 py-2 bg-[#06202B] text-white rounded hover:bg-[#04131A]">
                Perbarui Password
            </button>
        </div>
    </form>

    {{-- Hapus Akun --}}
    <hr class="my-8">
    <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
        @csrf
        @method('DELETE')
        <div class="text-right">
            <button type="submit" class="text-red-600 hover:underline text-sm">Hapus Akun</button>
        </div>
    </form>
</div>
@endsection
