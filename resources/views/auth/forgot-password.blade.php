<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Desa Winangun Atas</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#F9FAFB] font-sans">

    <section class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md mt-10">
            <h2 class="text-2xl font-bold text-[#06202B] mb-4 text-center">Lupa Password</h2>
            <p class="text-gray-600 mb-6 text-center">
                Masukkan email Anda dan kami akan mengirimkan link untuk mereset password.
            </p>

            <!-- Success message -->
            @if (session('status'))
                <div class="mb-4 text-green-600 font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-[#06202B]">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06202B]">
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-[#06202B] border border-transparent rounded-md font-semibold text-sm text-white hover:bg-[#04131A] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#06202B]">
                        Kirim Link Reset
                    </button>
                </div>
            </form>
        </div>
    </section>

</body>
</html>
