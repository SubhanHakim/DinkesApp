@extends('layouts.bidangApp')

@section('content')
    <div class="container">
        <div class="center-card">
            <div>
                <h1>Data Bidang</h1>
                <p>{{ $bidangs->bidang }} - {{$bidangs->program}} - {{$bidangs->target_kinerja}} - {{ $achievement->bulan }}</p>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div style="width: 500px">
                <form action="{{ route('achievements.update', $achievement->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="py-4">
                        <div class="form-group pb-4">
                            <label for="target_capaian">Target Capian Bulanan</label>
                            <input type="number" name="target_capaian" id="target_capaian"
                                value="{{ old('target_capaian', $achievement->target_capaian_bulanan) }}"
                                class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="capaian_kinerja_bulanan">Capaian Bulan {{ $achievement->bulan }}</label>
                            <input type="number" name="capaian_kinerja_bulanan" id="capaian_kinerja_bulanan"
                                value="{{ old('capaian_kinerja_bulanan', $achievement->capaian_kinerja_bulanan) }}"
                                class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </form>
            </div>
        </div>
    </div>
@endsection
