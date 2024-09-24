<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Menampilkan daftar pasien
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien.index', compact('pasiens'));
    }

    // Menampilkan form untuk membuat pasien baru
    public function create()
    {
        return view('pasien.create');
    }

    // Menyimpan pasien baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'address' => 'required',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);
        
        Pasien::create($request->all());

        return redirect('pasien')->with('success', 'Pasien berhasil ditambahkan');
    }

    // Menampilkan form edit untuk pasien
    public function edit($id)
    {   
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    // Mengupdate data pasien
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'address' => 'required',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);
        
        $pasien = Pasien::findOrFail($id);
        
        // Log data yang diterima untuk debugging
       

        $pasien->update($request->all());

        return redirect('pasien')->with('success', 'Pasien berhasil diupdate');
    }

    // Menghapus pasien
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect('pasien')->with('success', 'Pasien berhasil dihapus');
    }
}


