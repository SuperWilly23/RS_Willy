@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pasien</h1>

    <form action="{{ url('pasien/edit/' . $pasien->id . '/store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="name" value="{{ $pasien->name }}" required>
        </div>

        <div class="form-group">
            <label for="age">Umur</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ $pasien->age}}" required>
        </div>

        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $pasien->address }}" required>
        </div>

        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <input type="text" class="form-control" id="diagnosis" name="diagnosis" value="{{ $pasien->diagnosis }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection