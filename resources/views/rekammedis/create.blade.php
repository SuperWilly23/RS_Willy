@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Rekam Medis</h1>

    <form action="{{ route('rekam_medis.store') }}" method="POST">
        @csrf

        <!-- Dropdown untuk memilih pasien -->
        <div class="form-group mb-3">
            <label for="id_pasien">Pilih Pasien:</label>
            <select name="id_pasien" id="id_pasien" class="form-control">
                <option value="">-- Pilih Pasien --</option>
                @foreach($pasien as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tanggal Kunjungan -->
        <div class="form-group mb-3">
            <label for="tanggal_kunjungan">Tanggal Kunjungan:</label>
            <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control" required>
        </div>

        <!-- Diagnosis -->
        <div class="form-group mb-3">
            <label for="diagnosis">Diagnosis:</label>
            <input type="text" name="diagnosis" id="diagnosis" class="form-control" required>
        </div>

        <!-- Analisis -->
        <div class="form-group mb-3">
            <label for="analisis">Analisis:</label>
            <textarea name="analisis" id="analisis" class="form-control"></textarea>
        </div>

        <!-- Keterangan -->
        <div class="form-group mb-3">
            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
