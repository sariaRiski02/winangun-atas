<?php

namespace App\Http\Controllers;

use App\Models\News;
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
        return view('app.page.demo');
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
