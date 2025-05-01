<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Desa Winangun Atas</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#F9FAFB] font-sans">

<section class="min-h-screen flex items-center justify-center py-12 px-6">
    <div class="w-full max-w-4xl grid md:grid-cols-2 gap-10 bg-white rounded-lg shadow-lg p-8">

        <!-- Welcome Section -->
        <div class="flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-[#06202B] mb-4">Buat Akun Baru</h2>
            <p class="text-[#06202B] mb-6">Daftar untuk mengakses sistem administrasi Desa Winangun Atas.</p>
            <img src="{{ asset('images/register.svg') }}" alt="Register Illustration" class="rounded-lg w-full md:w-auto">
        </div>

        <!-- Register Form -->
        <div class="flex flex-col justify-center">
            <h3 class="text-xl font-semibold text-[#06202B] mb-6">Form Pendaftaran</h3>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-[#06202B]">Nama Lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06202B]">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-[#06202B]">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06202B]">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-[#06202B]">Password</label>
                    <input id="password" type="password" name="password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06202B]">
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-[#06202B]">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06202B]">
                </div>

                <div>
                    <label for="registration_code" class="block text-sm font-medium text-[#06202B]">Kode Pendaftaran</label>
                    <input id="registration_code" type="text" name="registration_code" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06202B]">
                </div>

                <!-- Submit + Link Login -->
                <div class="flex items-center justify-between pt-2">
                    <a href="{{ route('login') }}" class="text-sm text-[#06202B] hover:underline">Sudah punya akun?</a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-[#06202B] border border-transparent rounded-md font-semibold text-sm text-white hover:bg-[#04131A] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#06202B]">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

</body>
</html>
