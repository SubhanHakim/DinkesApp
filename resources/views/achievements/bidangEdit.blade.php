@extends('layouts.bidangApp')

@section('content')
    <div class="container mt-5">
        <h1>Edit Data Bidang</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('achievements.bidangUpdate', $achievement) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="capaian_kinerja_tahunan">Capaian Kinerja Tahunan:</label>
                <input type="number" name="capaian_kinerja_tahunan" id="capaian_kinerja_tahunan" class="form-control"
                    value="{{ $achievement->capaian_kinerja_tahunan }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
