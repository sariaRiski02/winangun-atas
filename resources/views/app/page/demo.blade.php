@extends('app.main')

@section('main')

<!-- Seksi Demografi Desa -->
<section id="grafik-demografi" class="py-5 bg-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-[#06202B] mb-6">Data Demografi Desa</h2>
        <p class="text-gray-600 mb-10">Visualisasi lengkap kependudukan Desa Winangun Atas</p>

        <!-- Cards Jumlah Penduduk dan KK -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            <div class="bg-[#06202B] text-white rounded-xl shadow p-6">
                <h3 class="text-xl font-semibold mb-2">Jumlah Penduduk</h3>
                <p class="text-3xl font-bold">2.750 Jiwa</p>
            </div>
            <div class="bg-[#06202B] text-white rounded-xl shadow p-6">
                <h3 class="text-xl font-semibold mb-2">Jumlah Kepala Keluarga</h3>
                <p class="text-3xl font-bold">920 KK</p>
            </div>
        </div>

        <!-- Grid Responsive 2 Kolom di Desktop -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <!-- Jumlah Penduduk per Dusun -->
            <div id="areaChart" class="h-80"></div>

            <!-- Jenis Kelamin -->
            <div id="genderChart" class="h-80"></div>

            <!-- Kelompok Usia -->
            <div id="ageChart" class="h-80"></div>

            <!-- Pendidikan Terakhir -->
            <div id="educationChart" class="h-80"></div>

            <!-- Jenis Pekerjaan -->
            <div id="occupationChart" class="h-80"></div>

            <!-- Agama -->
            <div id="religionChart" class="h-80"></div>

            <!-- Status Perkawinan -->
            <div id="marriageChart" class="h-80"></div>

            <!-- Lansia -->
            <div id="elderlyChart" class="h-80"></div>

            <!-- Disabilitas -->
            <div id="disabilityChart" class="h-80"></div>

        </div>
    </div>
</section>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
window.onload = function () {
    new CanvasJS.Chart("areaChart", {
        animationEnabled: true, theme: "light2", backgroundColor: "transparent",
        title: { text: "Penduduk per Dusun", fontColor: "#06202B" },
        data: [{ type: "column", dataPoints: [
            { label: "Dusun I", y: 700 },
            { label: "Dusun II", y: 850 },
            { label: "Dusun III", y: 650 },
            { label: "Dusun IV", y: 550 }
        ] }]
    }).render();

    new CanvasJS.Chart("genderChart", {
        animationEnabled: true, theme: "light2", backgroundColor: "transparent",
        title: { text: "Jenis Kelamin", fontColor: "#06202B" },
        data: [{ type: "pie", dataPoints: [
            { label: "Laki-laki", y: 1300 },
            { label: "Perempuan", y: 1450 }
        ] }]
    }).render();

    new CanvasJS.Chart("ageChart", {
        animationEnabled: true, theme: "light2", backgroundColor: "transparent",
        title: { text: "Kelompok Usia", fontColor: "#06202B" },
        data: [{ type: "bar", dataPoints: [
            { label: "0-14", y: 700 },
            { label: "15-24", y: 550 },
            { label: "25-54", y: 1100 },
            { label: "55-64", y: 250 },
            { label: "65+", y: 150 }
        ] }]
    }).render();

    new CanvasJS.Chart("educationChart", {
        animationEnabled: true, theme: "light2", backgroundColor: "transparent",
        title: { text: "Pendidikan Terakhir", fontColor: "#06202B" },
        data: [{ type: "doughnut", dataPoints: [
            { label: "Tidak Sekolah", y: 150 },
            { label: "SD", y: 800 },
            { label: "SMP", y: 600 },
            { label: "SMA", y: 700 },
            { label: "Perguruan Tinggi", y: 400 }
        ] }]
    }).render();

    new CanvasJS.Chart("occupationChart", {
        animationEnabled: true, theme: "light2", backgroundColor: "transparent",
        title: { text: "Jenis Pekerjaan", fontColor: "#06202B" },
        data: [{ type: "bar", dataPoints: [
            { label: "Petani", y: 500 },
            { label: "Pedagang", y: 300 },
            { label: "PNS", y: 200 },
            { label: "Swasta", y: 400 },
            { label: "Lainnya", y: 350 }
        ] }]
    }).render();

    new CanvasJS.Chart("religionChart", {
        animationEnabled: true, theme: "light2", backgroundColor: "transparent",
        title: { text: "Agama", fontColor: "#06202B" },
        data: [{ type: "pie", dataPoints: [
            { label: "Islam", y: 1800 },
            { label: "Kristen", y: 700 },
            { label: "Katolik", y: 200 },
            { label: "Hindu", y: 30 },
            { label: "Buddha", y: 20 }
        ] }]
    }).render();

    new CanvasJS.Chart("marriageChart", {
        animationEnabled: true, theme: "light2", backgroundColor: "transparent",
        title: { text: "Status Perkawinan", fontColor: "#06202B" },
        data: [{ type: "column", dataPoints: [
            { label: "Belum Menikah", y: 950 },
            { label: "Menikah", y: 1500 },
            { label: "Cerai Hidup", y: 150 },
            { label: "Cerai Mati", y: 150 }
        ] }]
    }).render();

    new CanvasJS.Chart("elderlyChart", {
        animationEnabled: true, theme: "light2", backgroundColor: "transparent",
        title: { text: "Jumlah Lansia", fontColor: "#06202B" },
        data: [{ type: "column", dataPoints: [
            { label: "Laki-laki", y: 100 },
            { label: "Perempuan", y: 130 }
        ] }]
    }).render();

    new CanvasJS.Chart("disabilityChart", {
        animationEnabled: true, theme: "light2", backgroundColor: "transparent",
        title: { text: "Penyandang Disabilitas", fontColor: "#06202B" },
        data: [{ type: "bar", dataPoints: [
            { label: "Tunanetra", y: 15 },
            { label: "Tunarungu", y: 10 },
            { label: "Tunadaksa", y: 8 },
            { label: "Lainnya", y: 5 }
        ] }]
    }).render();
}
</script>

@endsection