@extends('app.main-dash')

@section('main')
<div class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-[#06202B] mb-4">Ubah Kode Pendaftaran</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-4 text-red-600 font-semibold">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form Ubah Kode -->
        <form method="POST" action="{{ route('super-admin.update') }}" class="space-y-4 mb-10">
            @csrf
            <div>
                <label for="code" class="block text-sm font-medium text-gray-700">Kode Baru</label>
                <input id="code" name="code" type="text" value="{{ old('code', $setting?->code) }}" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06202B]">
            </div>

            <button type="submit"
                class="bg-[#06202B] text-white px-4 py-2 rounded hover:bg-[#04131A] focus:outline-none focus:ring-2 focus:ring-[#06202B]">
                Simpan
            </button>
        </form>

        <!-- Form Hapus Akun User -->
        <h2 class="text-xl font-semibold text-[#06202B] mb-4">Hapus Akun Pengguna</h2>

        <form method="POST" action="{{ route('user.destroy.byAdmin', $users[0]->id ?? 0) }}"
            onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
            @csrf
            @method('DELETE')

            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Pilih Pengguna</label>
                <select id="user_id" name="user" onchange="updateDeleteAction(this.value)"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06202B]">
                    @foreach($users as $user)
                        @if($user->role !== 'super_admin')
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Hapus Akun
            </button>
        </form>
    </div>
</div>

<script>
    function updateDeleteAction(userId) {
        const form = document.querySelector('form[action^="{{ route('user.destroy.byAdmin', 0) }}"]');
        form.action = `/dashboard/hapus-user/${userId}`;
    }
</script>
@endsection
