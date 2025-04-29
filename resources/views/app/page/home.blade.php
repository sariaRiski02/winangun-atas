@extends('app.main')

@section('main')

<!-- Hero -->
<section id="welcome" class="gap-5 flex flex-col md:flex-row items-center w-full justify-between">
    <div class="flex flex-col justify-between w-full md:gap-8 gap-4">
        <span class="text-2xl md:text-4xl font-bold text-[#06202B] text-center md:text-left">
            Selamat Datang di situs  
            <br> 
            Desa Winangun Atas
        </span>
        <span class="text-md text-center md:text-left text-[#06202B]">
            Kami dengan bangga menyambut Anda di situs resmi Desa Winangun Atas
        </span>
    </div>
    <div class="w-full">
        <img src="{{ $profile?->hero_photo ? asset($profile?->hero_photo) : asset('images/hero.png') }}" alt="Desa Kema III" class="rounded-lg shadow-lg w-full h-auto">
    </div>
</section>

<!-- lead of village -->
<div class="flex flex-col md:flex-row items-center gap-5 h-auto w-full justify-center">
    <div class="w-full md:w-2/3 order-2 md:order-1">
        <img src="{{ $profile?->kades_photo ? asset($profile?->kades_photo) : asset('images/kades.png') }}" alt="Leader" class="w-full h-auto">
    </div>
    <div class="flex items-center w-full md:w-auto order-1 md:order-2">
        <p class="md:text-md text-sm w-full text-[#06202B] text-center md:text-left">
            @if ($profile?->greeting)
                {{ $profile?->greeting }}
            @else
            "Selamat datang di Desa Winangun Atas, tempat di mana tradisi dan kemajuan berjalan beriringan. Kami bangga menjadi bagian dari komunitas yang menjunjung tinggi nilai-nilai kebersamaan, gotong royong, dan keberlanjutan. Mari bersama-sama membangun desa yang lebih baik untuk generasi mendatang."
            @endif
            <br><br>
            --- Kepala desa Winangun Atas ---
        </p>
    </div>
</div>

<!-- cart berita -->
<section id="news" class="flex flex-col gap-5">
    <h2 class="text-2xl font-bold text-[#06202B] text-center">Berita Terbaru</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        @foreach ($news as $item)
        <div class="bg-white rounded-lg shadow-lg p-5">
            <img src="{{ asset($item->image) }}" alt="News {{ $item->title }}" class="rounded-lg mb-3">
            <h3 class="text-lg font-semibold text-[#06202B]">{{ $item->title }}</h3>
            
            <p class="text-sm text-gray-700">{{ Str::limit(strip_tags($item->content), 200, '...') }}</p>
            <a href="{{ route('content',$item->slug) }}" class="text-[#06202B] font-semibold mt-3 inline-block">Baca Selengkapnya</a>
            <div class="flex items-center justify-between mt-3 text-gray-500 text-xs">
                <span>Diperbarui pada: {{ $item->updated_at->format('d M Y') }}</span>
                <span class="italic">oleh {{ $item->author->name ?? 'Admin' }}</span>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Demografi -->
<section id="demografi" class="flex flex-col gap-5 mt-10">
    <h2 class="text-2xl font-bold text-[#06202B] text-center">Demografi Desa</h2>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
</section>

@push('script')
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Demografi Berdasarkan Usia"
            },
            data: [{
                type: "pie",
                indexLabel: "{label} - {y}%",
                dataPoints: [
                    { label: "Anak-anak (0-14)", y: 25 },
                    { label: "Remaja (15-24)", y: 20 },
                    { label: "Dewasa (25-54)", y: 40 },
                    { label: "Lansia (55+)", y: 15 }
                ]
            }]
        });
        chart.render();
    }
</script>
@endpush

@endsection
