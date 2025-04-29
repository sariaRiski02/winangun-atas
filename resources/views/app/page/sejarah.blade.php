@extends('app.main')

@section('main')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-[#06202B] mb-6 text-center">Sejarah Desa</h1>
        
        <div class="bg-white p-6 rounded-lg shadow">
            @if ($structure && $structure->history)
                {!! $structure->history !!}
            @else
                <p class="text-gray-600">Belum ada sejarah desa yang tersedia.</p>
            @endif
        </div>
    </div>
</div>
@endsection
