@extends('app.main')

@section('main')
<!-- Seksi Demografi Desa -->
<section id="grafik-demografi" class="py-5 bg-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-[#06202B] mb-6">Data Demografi Desa</h2>
        <p class="text-gray-600 mb-10">Visualisasi lengkap kependudukan Desa</p>

        <!-- Cards Jumlah Penduduk dan KK -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            <div class="bg-[#06202B] text-white rounded-xl shadow p-6">
                <h3 class="text-xl font-semibold mb-2">Jumlah Penduduk</h3>
                <p class="text-3xl font-bold">{{ $total_residents }} Jiwa</p>
            </div>
            <div class="bg-[#06202B] text-white rounded-xl shadow p-6">
                <h3 class="text-xl font-semibold mb-2">Jumlah Kepala Keluarga</h3>
                <p class="text-3xl font-bold">{{ $total_heads_of_family }} KK</p>
            </div>
        </div>

        <!-- Grafik -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div id="genderChart" class="h-80"></div>
            <div id="religionChart" class="h-80"></div>
            <div id="educationChart" class="h-80"></div>
            <div id="occupationChart" class="h-80"></div>
            <div id="marriageChart" class="h-80"></div>
            <div id="villageChart" class="h-80"></div>
            <div id="ageGroupChart" class="h-80"></div>
            <div id="elderlyChart" class="h-80"></div>
            <div id="disabilityChart" class="h-80"></div>
        </div>
    </div>
</section>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
    window.onload = function () {
        const renderChart = (id, title, type, data) => {
            let total = data.reduce((sum, d) => sum + d.y, 0);
            new CanvasJS.Chart(id, {
                animationEnabled: true,
                theme: "light2",
                backgroundColor: "transparent",
                title: { text: title, fontColor: "#06202B" },
                data: [{
                    type: type,
                    indexLabel: "{label}: {percentage}%",
                    toolTipContent: "{label}: {y} orang ({percentage}%)",
                    dataPoints: data.map(item => ({
                        ...item,
                        percentage: total > 0 ? ((item.y / total) * 100).toFixed(1) : 0
                    }))
                }]
            }).render();
        };


        renderChart("genderChart", "Jenis Kelamin", "pie", @json($by_gender));
        renderChart("religionChart", "Agama", "pie", @json($by_religion));
        renderChart("educationChart", "Pendidikan", "doughnut", @json($by_education));
        renderChart("occupationChart", "Pekerjaan", "bar", @json($by_occupation));
        renderChart("marriageChart", "Status Pernikahan", "column", @json($by_marital));
        renderChart("villageChart", "Jumlah Penduduk per Jaga", "column", @json($by_village));
        renderChart("ageGroupChart", "Kelompok Usia", "bar", @json($by_age_group));
        renderChart("elderlyChart", "Jumlah Lansia (65+)", "column", @json($elderly_data));
        renderChart("disabilityChart", "Disabilitas", "bar", @json($by_disability));
    };
</script>
@endsection
