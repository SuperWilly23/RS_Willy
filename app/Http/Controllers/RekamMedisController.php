<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function create()
    {
        $pasien = Pasien::all();
        return view('rekammedis.create', compact('pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required|exists:pasien,id',
            'tanggal_kunjungan' => 'required|date',
            'diagnosis' => 'required|string',
            'analisis' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        RekamMedis::create([
            'id_pasien' => $request->id_pasien,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'diagnosis' => $request->diagnosis,
            'analisis' => $request->analisis,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('rekam_medis.index')->with('success', 'Rekam medis berhasil ditambahkan.');
    }

    public function index()
    {
        $rekamMedis = RekamMedis::with('pasien')->get();
        return view('rekammedis.index', compact('rekamMedis'));
    }

    public function edit($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $pasien = Pasien::all();
        return view('rekammedis.edit', compact('rekamMedis', 'pasien'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pasien' => 'required|exists:pasien,id',
            'tanggal_kunjungan' => 'required|date',
            'diagnosis' => 'required|string',
            'analisis' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $rekamMedis = RekamMedis::findOrFail($id);
        $rekamMedis->update([
            'id_pasien' => $request->id_pasien,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'diagnosis' => $request->diagnosis,
            'analisis' => $request->analisis,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('rekam_medis.index')->with('success', 'Rekam medis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $rekamMedis->delete();

        return redirect()->route('rekam_medis.index')->with('success', 'Rekam medis berhasil dihapus.');
    }

    // Method to show the medical records of a specific patient
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        $rekamMedis = RekamMedis::where('id_pasien', $id)->get();

        return view('rekammedis.show', compact('pasien', 'rekamMedis'));
    }
}
