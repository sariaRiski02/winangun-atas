<?php

namespace App\Http\Controllers;

use App\Models\HomeProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        return view('app.dashboard.home-dash');
    }


    public function update(Request $request)
    {
        $request->validate([
            'kades_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072', // 3MB
            'greeting' => 'nullable|string',
            'hero_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072', // 3MB
        ]);

        $profile = HomeProfile::first(); // Cari data pertama

        // Siapkan array data yang akan disimpan
        $data = [
            'greeting' => $request->greeting ?? '',
        ];

        // Jika upload foto kades baru
        if ($request->hasFile('kades_photo')) {
            // Kalau ada profile dan ada foto lama bukan default
            if ($profile && $profile->kades_photo && $profile->kades_photo !== 'images/kades.png' && File::exists(public_path($profile->kades_photo))) {
                File::delete(public_path($profile->kades_photo));
            }

            $file = $request->file('kades_photo');
            $filename = 'kades_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['kades_photo'] = 'images/' . $filename;
        } else {
            // Kalau ada profile, ambil gambar lama, kalau tidak ada kosongkan
            $data['kades_photo'] = $profile->kades_photo ?? null;
        }

        // Jika upload foto hero baru
        if ($request->hasFile('hero_photo')) {
            if ($profile && $profile->hero_photo && $profile->hero_photo !== 'images/hero.png' && File::exists(public_path($profile->hero_photo))) {
                File::delete(public_path($profile->hero_photo));
            }

            $file = $request->file('hero_photo');
            $filename = 'hero_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['hero_photo'] = 'images/' . $filename;
        } else {
            $data['hero_photo'] = $profile->hero_photo ?? null;
        }

        // Kalau belum ada data profile di database, buat baru
        if (!$profile) {
            HomeProfile::create($data);
        } else {
            $profile->update($data);
        }

        return redirect()->route('dash.home')->with('success', 'Profil berhasil diperbarui.');
    }
}
