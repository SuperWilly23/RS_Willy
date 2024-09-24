@extends('layouts.app')

@section('content')
    <h1>Edit Rekam Medis</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rekammedis.update', $rekamMedis->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_pasien">Pilih Pasien:</label>
            <select name="id_pasien" id="id_pasien" class="form-control">
                <option value="">-- Pilih Pasien --</option>
                @foreach($pasien as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
            <input type="date" name="tanggal_kunjungan" class="form-control" value="{{ $rekamMedis->tanggal_kunjungan }}" required>
        </div>

        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <input type="text" name="diagnosis" class="form-control" value="{{ $rekamMedis->diagnosis }}" required>
        </div>

        <div class="form-group">
            <label for="analisis">Analisis</label>
            <textarea name="analisis" class="form-control">{{ $rekamMedis->analisis }}</textarea>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $rekamMedis->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
    </form>
@endsection
