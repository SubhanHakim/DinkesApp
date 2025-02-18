@extends('layouts.bidangApp')

@section('content')
    <div class="container p-4">
        <div class="p-4 rounded-2" style="background-color: #ECECEC">
            <div class="center-card">
                <div class="text-center text-md-start mb-4">
                    <h1>Data Bidang</h1>
                    <p>{{ $bidangs->bidang }} - {{ $bidangs->program }} - {{ $bidangs->target_kinerja }} - {{ $achievement->bulan }}</p>
                </div>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Form Responsif -->
                <div class="mx-auto" style="max-width: 600px;">
                    <form action="{{ route('achievements.update', $achievement->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <div class="form-group mb-3">
                                <label for="target_capaian" class="form-label">Target Capaian Bulanan</label>
                                <input type="number" name="target_capaian" id="target_capaian"
                                    value="{{ old('target_capaian', $achievement->target_capaian_bulanan) }}"
                                    class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="capaian_kinerja_bulanan" class="form-label">Capaian Bulan {{ $achievement->bulan }}</label>
                                <input type="number" name="capaian_kinerja_bulanan" id="capaian_kinerja_bulanan"
                                    value="{{ old('capaian_kinerja_bulanan', $achievement->capaian_kinerja_bulanan) }}"
                                    class="form-control">
                            </div>
                        </div>

                        <!-- Tombol Responsif -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Selesai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
