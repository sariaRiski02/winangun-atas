<?php

namespace App\Http\Controllers;

use App\Models\GeoCategory;
use App\Models\VillageInfo;
use Illuminate\Http\Request;
use App\Models\VillageBorder;

class GeoController extends Controller
{

    public function index()
    {
        $village = VillageInfo::first();
        $categories = GeoCategory::all();
        $borders = VillageBorder::all(); // <= ambil data batas

        $totalArea = $village ? (float) $village->village_area : 0;
        $usedArea = $categories->sum(fn($item) => (float) $item->area);
        $totalPercentage = $totalArea > 0 ? ($usedArea / $totalArea) * 100 : 0;

        return view('app.dashboard.geo-dash', compact('village', 'categories', 'totalPercentage', 'borders'));
    }


    public function storeVillageArea(Request $request)
    {
        $request->validate([
            'village_area' => 'required|numeric|min:1',
        ]);

        $village = VillageInfo::first();
        if (!$village) {
            VillageInfo::create([
                'village_area' => $request->village_area,
            ]);
        } else {
            $village->update([
                'village_area' => $request->village_area,
            ]);
        }

        return redirect()->route('dash.geo')->with('success', 'Luas wilayah desa berhasil diperbarui.');
    }


    public function storeCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'area' => 'required|numeric|min:0', // <-- Biar hanya angka
        ]);

        $village = VillageInfo::first();
        $categories = GeoCategory::all();

        $totalArea = $village ? (float) $village->village_area : 0;
        $usedArea = $categories->sum(function ($item) {
            return (float) $item->area;
        });

        $remainingArea = $totalArea - $usedArea;

        if ($request->area > $remainingArea) {
            // Kalau area baru mau ditambahkan melebihi sisa area
            return redirect()->route('dash.geo')->with('error', 'Lahan tidak cukup. Sisa lahan hanya ' . $remainingArea . ' Ha.');
        }

        GeoCategory::create([
            'category' => $request->category,
            'area' => $request->area,
        ]);

        return redirect()->route('dash.geo')->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    public function destroyCategory($id)
    {
        $category = GeoCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('dash.geo')->with('success', 'Kategori berhasil dihapus.');
    }

    public function updateCategory(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:geo_categories,id',
            'category' => 'required|string|max:255',
            'area' => 'required|numeric|min:0.1',
        ]);

        $category = GeoCategory::findOrFail($request->id);

        $category->update([
            'category' => $request->category,
            'area' => $request->area,
        ]);

        return redirect()->route('dash.geo')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function storeBorder(Request $request)
    {
        $request->validate([
            'direction' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        VillageBorder::create($request->only('direction', 'description'));

        return redirect()->route('dash.geo')->with('success', 'Batas wilayah berhasil ditambahkan.');
    }

    public function destroyBorder($id)
    {
        $border = VillageBorder::findOrFail($id);
        $border->delete();

        return redirect()->route('dash.geo')->with('success', 'Batas wilayah berhasil dihapus.');
    }
}
