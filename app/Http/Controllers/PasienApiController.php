<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\RekamMedis; // Ensure this is imported
use Illuminate\Http\Request;

class PasienApiController extends Controller
{
    // Menampilkan daftar pasien
    public function index()
    {
        $pasiens = Pasien::all();
        return response()->json([
            'status' => 'success',
            'data' => $pasiens
        ]);
    }

    // Menampilkan form untuk membuat pasien baru (optional for API)
    public function create()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Form ready for patient creation'
        ]);
    }

    // Menyimpan pasien baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'address' => 'required',
        ]);

        $pasien = Pasien::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Pasien berhasil ditambahkan',
            'data' => $pasien
        ]);
    }

    // Menampilkan form edit untuk pasien (optional for API)
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $pasien
        ]);
    }

    // Mengupdate data pasien
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'address' => 'required',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Pasien berhasil diupdate',
            'data' => $pasien
        ]);
    }

    // Menghapus pasien
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Pasien berhasil dihapus'
        ]);
    }

    // Menampilkan detail pasien beserta rekam medis
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        $rekamMedis = RekamMedis::where('id_pasien', $id)->get();

        return response()->json([
            'status' => 'success',
            'data' => [
                'pasien' => $pasien,
                'rekamMedis' => $rekamMedis
            ]
        ]);
    }
}
