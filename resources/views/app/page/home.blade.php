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
        <img src="{{ asset('images/hero.png') }}" alt="Desa Kema III" class="rounded-lg shadow-lg w-full h-auto">
    </div>
</section>

<!-- lead of village -->
<div class="flex flex-col md:flex-row items-center gap-5 h-auto w-full justify-center">
    <div class="w-full md:w-2/3 order-2 md:order-1">
        <img src="{{ asset('images/kades.png') }}" alt="Leader" class="w-full h-auto">
    </div>
    <div class="flex items-center w-full md:w-auto order-1 md:order-2">
        <p class="md:text-md text-sm w-full text-[#06202B] text-center md:text-left">
            "Semangat gotong royong yang kuat di Desa Winangun Atas... Lorem ipsum dolor sit amet consectetur adipisicing elit. A aliquam, nostrum commodi cumque voluptatibus, inventore, iste quam nam harum officiis perspiciatis ratione repellat veniam sapiente sint similique eaque nemo dolor! "
            <br><br>
            --- Kepala desa Winangun Atas ---
        </p>
    </div>
</div>

<!-- cart berita -->
<section id="news" class="flex flex-col gap-5">
    <h2 class="text-2xl font-bold text-[#06202B] text-center">Berita Terbaru</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        @for ($i = 1; $i <= 3; $i++)
        <div class="bg-white rounded-lg shadow-lg p-5">
            <img src="{{ asset('images/hero.png') }}" alt="News {{ $i }}" class="rounded-lg mb-3">
            <h3 class="text-lg font-semibold text-[#06202B]">Judul Berita {{ $i }}</h3>
            <p class="text-sm text-gray-700">Deskripsi singkat berita {{ $i }}...</p>
            <a href="#" class="text-[#06202B] font-semibold mt-3 inline-block">Baca Selengkapnya</a>
        </div>
        @endfor
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
