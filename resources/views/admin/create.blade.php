@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="p-4 rounded-2" style="background-color: #ECECEC">
            <div>
                <h1>Tambah Data</h1>
                <p>Masukan detail penambahan data</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                <div style="width: 50%" class="d-flex flex-column gap-3">
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
                        <label for="seksi">Tim:</label>
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
                        <label for="target_capaian_percent">Persen Target:</label>
                        <input type="number" name="target_capaian_percent" id="target_capaian_percent" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control">
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
