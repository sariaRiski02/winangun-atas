<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RegistrationSetting;

class SuperAdminController extends Controller
{
    public function edit()
    {
        $setting = RegistrationSetting::first();
        $users = User::where('role', '!=', 'super_admin')->get();

        return view('app.dashboard.registration-code', compact('setting', 'users'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255'
        ]);

        $setting = RegistrationSetting::first();
        if (!$setting) {
            $setting = new RegistrationSetting();
        }

        $setting->code = $request->code;
        $setting->save();

        return redirect()->back()->with('success', 'Kode pendaftaran berhasil diperbarui.');
    }
}
