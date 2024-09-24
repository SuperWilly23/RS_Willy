@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="pasien/add" class="btn btn-primary mb-3">Tambah Pasien</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Diagnosis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $pasien)
                <tr>
                    <td>{{ $pasien->id }}</td>
                    <td>{{ $pasien->name }}</td>
                    <td>{{ $pasien->age }}</td>
                    <td>{{ $pasien->address }}</td>
                    <td>{{ $pasien->diagnosis }}</td>
                    <td>
                        <a href="{{ url('pasien/edit/' . $pasien->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pasien.destroy', $pasien) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                        <!-- Add Detail Pasien Button -->
                        <a href="{{ route('rekam_medis.show', $pasien->id) }}" class="btn btn-info btn-sm">Detail Pasien</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
