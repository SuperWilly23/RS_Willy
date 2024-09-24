@extends('layouts.app')

@section('content')
    <h1>Daftar Rekam Medis</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('rekam_medis.create') }}" class="btn btn-primary">Tambah Rekam Medis</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Pasien</th> <!-- Updated header -->
                <th>Tanggal Kunjungan</th>
                <th>Diagnosis</th>
                <th>Analisis</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekamMedis as $rm)
                <tr>
                    <td>{{ $rm->id }}</td>
                    <td>{{ $rm->id_pasien }}</td> <!-- Updated to show id_pasien -->
                    <td>{{ $rm->tanggal_kunjungan }}</td>
                    <td>{{ $rm->diagnosis }}</td>
                    <td>{{ $rm->analisis }}</td>
                    <td>{{ $rm->keterangan }}</td>
                    <td>
                        <a href="{{ route('rekam_medis.edit', $rm->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('rekam_medis.destroy', $rm->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
