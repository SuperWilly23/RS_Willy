@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Rekam Medis Pasien: {{ $pasien->name }}</h2>
        <p><strong>Umur:</strong> {{ $pasien->age }}</p>
        <p><strong>Alamat:</strong> {{ $pasien->address }}</p>

        @if($rekamMedis->isEmpty())
            <p>Pasien ini belum memiliki rekam medis.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tanggal Kunjungan</th>
                        <th>Diagnosis</th>
                        <th>Analisis</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekamMedis as $rm)
                    <tr>
                        <td>{{ $rm->tanggal_kunjungan }}</td>
                        <td>{{ $rm->diagnosis }}</td>
                        <td>{{ $rm->analisis }}</td>
                        <td>{{ $rm->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ url('/pasien') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
