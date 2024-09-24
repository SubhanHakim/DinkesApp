@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="p-4 rounded-2" style="background-color: #ECECEC">
            <div>
                <h1>Edit Data</h1>
                <p>Update detail data bidang</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.update', $bidang->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menggunakan method PUT untuk update data -->

                <div style="width: 50%" class="d-flex flex-column gap-3">
                    <div class="form-group mb-3">
                        <label for="bidang">Bidang</label>
                        <input type="text" name="bidang" id="bidang" class="form-control" value="{{ $bidang->bidang }}" required>
                    </div>

                    <div class="form-group">
                        <label for="seksi">Tim:</label>
                        <input type="text" name="seksi" id="seksi" class="form-control" value="{{ $bidang->seksi }}" required>
                    </div>

                    <div class="form-group">
                        <label for="program">Program:</label>
                        <input type="text" name="program" id="program" class="form-control" value="{{ $bidang->program }}" required>
                    </div>

                    <div class="form-group">
                        <label for="target_kinerja">Target Kinerja:</label>
                        <input type="text" name="target_kinerja" id="target_kinerja" class="form-control" value="{{ $bidang->target_kinerja }}" required>
                    </div>

                    <div class="form-group">
                        <label for="target_capaian">Target Capaian:</label>
                        <input type="number" name="target_capaian" id="target_capaian" class="form-control" value="{{ $bidang->target_capaian }}" required>
                    </div>

                    <div class="form-group">
                        <label for="target_capaian_percent">Persen Target:</label>
                        <input type="number" name="target_capaian_percent" id="target_capaian_percent" class="form-control" value="{{ $bidang->target_capaian_percent }}" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ $bidang->keterangan }}">
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection