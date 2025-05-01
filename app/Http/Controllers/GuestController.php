<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Resident;
use App\Models\GeoCategory;
use App\Models\HomeProfile;
use App\Models\VillageInfo;
use Illuminate\Http\Request;
use App\Models\VillageBorder;
use App\Models\StructureProfile;

class GuestController extends Controller
{
    public function home()
    {
        $news = News::with('Category')->orderBy('created_at', 'desc')->take(3)->get();
        $profile = HomeProfile::first();

        return view('app.page.home', compact('news', 'profile'));
    }

    public function gov()
    {
        $structure = StructureProfile::first();
        return view('app.page.gov', compact('structure'));
    }
    public function demo()
    {
        $residents = Resident::all();

        $total_residents = $residents->count();

        // Hitung total kepala keluarga (berdasarkan status 'Kepala Keluarga' per no_kk unik)
        $total_heads_of_family = $residents
            ->where('family_status', 'kepala keluarga')
            ->groupBy('no_kk')
            ->count();

        $by_gender = $residents->groupBy('gender')->map(fn($r) => ['label' => $r[0]->gender, 'y' => count($r)])->values();
        $by_religion = $residents->groupBy('religion')->map(fn($r) => ['label' => $r[0]->religion, 'y' => count($r)])->values();
        $by_education = $residents->groupBy('education')->map(fn($r) => ['label' => $r[0]->education, 'y' => count($r)])->values();
        $by_occupation = $residents->groupBy('job')->map(fn($r) => ['label' => $r[0]->job, 'y' => count($r)])->values();
        $by_marital = $residents->groupBy('marital_status')->map(fn($r) => ['label' => $r[0]->marital_status, 'y' => count($r)])->values();
        $by_village = $residents->groupBy('village')->map(fn($r) => ['label' => $r[0]->village, 'y' => count($r)])->values();
        $by_disability = $residents->groupBy('disability')->map(fn($r) => ['label' => $r[0]->disability, 'y' => count($r)])->values();

        // Lansia usia >= 65 (gunakan array biasa agar bisa ++)
        $elderly = [
            'Laki-laki' => 0,
            'Perempuan' => 0
        ];

        foreach ($residents as $r) {
            $age = \Carbon\Carbon::parse($r->birth_date)->age;
            if ($age >= 65 && isset($elderly[$r->gender])) {
                $elderly[$r->gender]++;
            }
        }

        $elderly_data = collect($elderly)->map(fn($y, $label) => ['label' => $label, 'y' => $y])->values();

        // Kelompok usia
        $by_age_group = [
            '0-14' => 0,
            '15-24' => 0,
            '25-54' => 0,
            '55-64' => 0,
            '65+' => 0,
        ];

        foreach ($residents as $r) {
            $age = \Carbon\Carbon::parse($r->birth_date)->age;
            if ($age <= 14) $by_age_group['0-14']++;
            elseif ($age <= 24) $by_age_group['15-24']++;
            elseif ($age <= 54) $by_age_group['25-54']++;
            elseif ($age <= 64) $by_age_group['55-64']++;
            else $by_age_group['65+']++;
        }

        $by_age_group = collect($by_age_group)->map(fn($y, $label) => ['label' => $label, 'y' => $y])->values();

        return view('app.page.demo', compact(
            'total_residents',
            'total_heads_of_family',
            'by_gender',
            'by_religion',
            'by_education',
            'by_occupation',
            'by_marital',
            'by_village',
            'by_disability',
            'by_age_group',
            'elderly_data'
        ));
    }


    public function geo()
    {
        $village = VillageInfo::first();
        $categories = GeoCategory::all();
        $borders = VillageBorder::all();

        $totalArea = $village ? (float) $village->village_area : 0;

        // Hitung presentase per kategori
        $categories = $categories->map(function ($item) use ($totalArea) {
            $item->percentage = $totalArea > 0 ? ($item->area / $totalArea) * 100 : 0;
            return $item;
        });

        // Ambil 3 terbesar
        $topThree = $categories->sortByDesc('percentage')->take(3);
        $othersPercentage = max(0, 100 - $topThree->sum('percentage'));

        return view('app.page.geo', compact('village', 'categories', 'topThree', 'othersPercentage', 'borders'));
    }

    public function news(Request $request)
    {
        if (!$request['query']) {
            $news = News::with('Category')->orderBy('created_at', 'desc')->paginate(6);
            return view('app.page.news', compact('news'));
        }
        $news = News::with('Category')->where('title', 'like', '%' . $request['query'] . '%')->paginate();
        return view('app.page.news', compact('news'));
    }

    public function content(News $news)
    {
        return view('app.page.content-news', compact('news'));
    }

    public function service()
    {
        return view('app.page.service');
    }
}
