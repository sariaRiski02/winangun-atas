<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StructureProfile;
use Illuminate\Support\Facades\File;

class GovController extends Controller
{
    public function edit()
    {
        $structure = StructureProfile::first();
        return view('app.dashboard.gov-dash', compact('structure'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'history' => 'nullable|string',
            'structure_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'bpd_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'pkk_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'karangtaruna_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $structure = StructureProfile::first();

        if (!$structure) {
            $structure = new StructureProfile();
        }

        $data = [
            'history' => $request->history ?? '',
        ];

        // Handle Upload Struktur Pemerintahan
        if ($request->hasFile('structure_photo')) {
            if ($structure->structure_photo && File::exists(public_path($structure->structure_photo))) {
                File::delete(public_path($structure->structure_photo));
            }
            $file = $request->file('structure_photo');
            $filename = 'structure_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/structures'), $filename);
            $data['structure_photo'] = 'images/structures/' . $filename;
        } else {
            $data['structure_photo'] = $structure->structure_photo;
        }

        // Handle Upload Struktur BPD
        if ($request->hasFile('bpd_photo')) {
            if ($structure->bpd_photo && File::exists(public_path($structure->bpd_photo))) {
                File::delete(public_path($structure->bpd_photo));
            }
            $file = $request->file('bpd_photo');
            $filename = 'bpd_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/structures'), $filename);
            $data['bpd_photo'] = 'images/structures/' . $filename;
        } else {
            $data['bpd_photo'] = $structure->bpd_photo;
        }

        // Handle Upload Struktur PKK
        if ($request->hasFile('pkk_photo')) {
            if ($structure->pkk_photo && File::exists(public_path($structure->pkk_photo))) {
                File::delete(public_path($structure->pkk_photo));
            }
            $file = $request->file('pkk_photo');
            $filename = 'pkk_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/structures'), $filename);
            $data['pkk_photo'] = 'images/structures/' . $filename;
        } else {
            $data['pkk_photo'] = $structure->pkk_photo;
        }

        // Handle Upload Struktur Karang Taruna
        if ($request->hasFile('karangtaruna_photo')) {
            if ($structure->karangtaruna_photo && File::exists(public_path($structure->karangtaruna_photo))) {
                File::delete(public_path($structure->karangtaruna_photo));
            }
            $file = $request->file('karangtaruna_photo');
            $filename = 'karangtaruna_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/structures'), $filename);
            $data['karangtaruna_photo'] = 'images/structures/' . $filename;
        } else {
            $data['karangtaruna_photo'] = $structure->karangtaruna_photo;
        }

        $structure->fill($data);
        $structure->save();

        return redirect()->route('dash.structure.edit')->with('success', 'Data struktur desa berhasil diperbarui.');
    }
}
