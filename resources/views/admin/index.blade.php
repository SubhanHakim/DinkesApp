@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="p-4 rounded-2" style="background-color: #ECECEC">

            <h1>Data Bidang</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Tambah Data Bidang</a>

            <!-- Tambahkan class table-responsive di sini -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Bidang</th>
                            <th>Seksi</th>
                            <th>Program</th>
                            <th>Target Kinerja</th>
                            <th>Target Capaian</th>
                            <th>Target Capaian Percent (%)</th>
                            <th>Capaian Kinerja Tahunan</th>
                            <th>Capaian Kinerja Tahunan (%)</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bidangs as $bidang)
                            <tr>
                                <td>{{ $bidang->bidang }}</td>
                                <td>{{ $bidang->seksi }}</td>
                                <td>{{ $bidang->program }}</td>
                                <td>{{ $bidang->target_kinerja }}</td>
                                <td>{{ $bidang->target_capaian }}</td>
                                <td>{{ $bidang->target_capaian_percent }}%</td>
                                <td>{{ $bidang->capaian_kinerja_tahunan }}</td>
                                <td>{{ $bidang->capaian_kinerja_tahunan_percent }}%</td>
                                <td>{{ $bidang->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
