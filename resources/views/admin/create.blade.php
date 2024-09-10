@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Tambah Data Bidang</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="bidang">Bidang:</label>
                <select name="bidang" id="bidang" class="form-control" required>
                    <option value="">-- Pilih Bidang --</option>
                    @foreach ($listBidang as $bidang)
                        <option value="{{ $bidang }}">{{ strtoupper($bidang) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="seksi">Seksi:</label>
                <input type="text" name="seksi" id="seksi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="program">Program:</label>
                <input type="text" name="program" id="program" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="target_kinerja">Target Kinerja:</label>
                <input type="text" name="target_kinerja" id="target_kinerja" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="target_capaian">Target Capaian:</label>
                <input type="number" name="target_capaian" id="target_capaian" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="target_capaian_percent">Pesern Target:</label>
                <input type="number" name="target_capaian_percent" id="target_capaian_percent" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
