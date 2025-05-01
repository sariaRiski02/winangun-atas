<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Desa Winangun Atas</title>
    @vite('resources/css/app.css') <!-- pastikan ini untuk load tailwind dari Vite -->
</head>
<body class="bg-[#F9FAFB] font-sans">

    <section class="min-h-screen flex items-center justify-center py-12 px-6">
        <div class="w-full max-w-4xl grid md:grid-cols-2 gap-10 bg-white rounded-lg shadow-lg p-8">
            
            <!-- Welcome Message -->
            <div class="flex flex-col justify-center">
                <h2 class="text-3xl font-bold text-[#06202B] mb-4">Selamat Datang Kembali</h2>
                <p class="text-[#06202B] mb-6">Masuk untuk mengakses sistem administrasi Desa Winangun Atas.</p>
                <img src="{{ asset('images/login.svg') }}" alt="Login Illustration" class="rounded-lg w-full md:w-auto">
            </div>

            <!-- Login Form -->
            <div class="flex flex-col justify-center">
                <h3 class="text-xl font-semibold text-[#06202B] mb-6">Login</h3>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-4 text-green-600 font-medium">
                        {{ session('status') }}
                    </div>
                @endif

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

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-[#06202B]">Email</label>
                        <input id="email" type="email" name="email" required autofocus
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06202B]">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-[#06202B]">Password</label>
                        <input id="password" type="password" name="password" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06202B]">
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="h-4 w-4 text-[#06202B] border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-[#06202B]">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-between">
                        <a class="text-sm text-[#06202B] hover:underline" href="{{ route('password.request') }}">
                            Lupa password?
                        </a>

                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-[#06202B] border border-transparent rounded-md font-semibold text-sm text-white hover:bg-[#04131A] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#06202B]">
                            Login
                        </button>
                    </div>

                    <!-- Register Link -->
                    <div class="mt-6 text-center">
                        <span class="text-sm text-[#06202B]">Belum punya akun?</span>
                        <a href="{{ route('register') }}" class="text-sm text-[#06202B] font-semibold hover:underline ml-1">
                            Daftar di sini
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </section>

</body>
</html>
