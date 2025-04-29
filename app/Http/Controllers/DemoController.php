<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use App\Imports\ResidentsImport;
use Maatwebsite\Excel\Facades\Excel;

class DemoController extends Controller
{

    // Menampilkan daftar semua penduduk
    public function index()
    {
        $residents = Resident::latest()->paginate(10);

        return view('app.dashboard.demo-dash', compact('residents'));
    }

    // Menyimpan data baru dari form manual
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'no_kk' => 'required|numeric',
            'nik' => 'required|numeric|digits:16',
            'family_status' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',
        ]);

        Resident::create([
            'name' => strtolower($request->name),
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'family_status' => strtolower($request->family_status),
            'marital_status' => strtolower($request->marital_status),
            'job' => strtolower($request->job),
            'birth_date' => $request->birth_date,
            'religion' => strtolower($request->religion),
            'village' => strtolower($request->village),
            'gender' => strtolower($request->gender),
        ]);

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
}
