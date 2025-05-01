<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use App\Imports\ResidentsImport;
use Maatwebsite\Excel\Facades\Excel;

class DemoController extends Controller
{

    // Menampilkan daftar semua penduduk
    public function index(Request $request)
    {
        $query = Resident::query();

        // Filter pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nik', 'like', "%$search%")
                    ->orWhere('name', 'like', "%$search%")
                    ->orWhere('no_kk', 'like', "%$search%");
            });
        }

        // Filter berdasarkan status pernikahan
        if ($request->filled('marital_status')) {
            $query->where('marital_status', strtolower($request->marital_status));
        }

        // Filter berdasarkan jaga (village)
        if ($request->filled('village')) {
            $query->where('village', strtolower($request->village));
        }

        $residents = $query->latest()->paginate(10);

        return view('app.dashboard.demo-dash', compact('residents'));
    }


    // Menyimpan data baru dari form manual
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'no_kk' => 'required|numeric',
            'nik' => 'required|numeric|digits:16|unique:residents,nik',
            'family_status' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'education' => 'required|string|max:255',
            'disability' => 'required|string|max:255',
        ]);

        Resident::create([
            'name' => ucwords(strtolower($request->name)),
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'family_status' => $request->family_status, // jaga kapital sesuai option
            'marital_status' => $request->marital_status,
            'job' => ucwords(strtolower($request->job)),
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'village' => $request->village,
            'gender' => $request->gender,
            'education' => strtolower($request->education),
            'disability' => strtolower($request->disability),

        ]);

        if (
            strtolower($request->family_status) === 'kepala keluarga' &&
            Resident::where('no_kk', $request->no_kk)
            ->whereRaw('LOWER(family_status) = ?', ['kepala keluarga'])
            ->exists()
        ) {
            return back()->withErrors([
                'family_status' => 'Sudah ada Kepala Keluarga untuk No KK ini.',
            ])->withInput();
        }



        return redirect()->route('dash.demo')->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    // Import banyak penduduk dari file excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new ResidentsImport, $request->file('file'));

        return redirect()->route('dash.demo')->with('success', 'Data penduduk berhasil diimport.');
    }

    // Menghapus penduduk berdasarkan ID
    public function delete($id)
    {
        $resident = Resident::findOrFail($id);
        $resident->delete();

        return redirect()->route('dash.demo')->with('success', 'Data penduduk berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'no_kk' => 'required|numeric',
            'nik' => 'required|numeric|digits:16|unique:residents,nik,' . $id,
            'family_status' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',

        ]);

        $resident = Resident::findOrFail($id);

        $resident->update([
            'name' => ucwords(strtolower($request->name)),
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'family_status' => $request->family_status,
            'marital_status' => $request->marital_status,
            'job' => ucwords(strtolower($request->job)),
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'village' => $request->village,
            'gender' => $request->gender,
            'education' => strtolower($request->education),
            'disability' => strtolower($request->disability),

        ]);

        if (
            strtolower($request->family_status) === 'kepala keluarga' &&
            Resident::where('no_kk', $request->no_kk)
            ->whereRaw('LOWER(family_status) = ?', ['kepala keluarga'])
            ->where('id', '!=', $id)
            ->exists()
        ) {
            return back()->withErrors([
                'family_status' => 'No KK ini sudah memiliki Kepala Keluarga.',
            ])->withInput();
        }


        return redirect()->route('dash.demo')->with('success', 'Data penduduk berhasil diperbarui.');
    }
}
