@extends('layouts.kadisApp')

@section('content')
    <div class="container p-4">
        <div class="p-4 rounded-2" style="background-color: #ECECEC">
            <h1 class="text-center text-md-start">Data Bidang</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Responsif -->
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="bg-secondary text-white">
                        <tr class="text-center">
                            <th>Bidang</th>
                            <th>Seksi</th>
                            <th>Program</th>
                            <th>Target Kinerja</th>
                            <th>Target Capaian</th>
                            <th>Capaian Kinerja Tahunan</th>
                            <th>Capaian Kinerja Tahunan (%)</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bidangs as $bidang)
                            <tr class="text-center">
                                <td>{{ $bidang->bidang }}</td>
                                <td>{{ $bidang->seksi }}</td>
                                <td>{{ $bidang->program }}</td>
                                <td>{{ $bidang->target_kinerja }}</td>
                                <td>{{ $bidang->target_capaian }}</td>
                                <td>{{ $bidang->capaian_kinerja_tahunan }}</td>
                                <td>{{ $bidang->capaian_kinerja_tahunan_percent }}%</td>
                                <td>{{ $bidang->keterangan }}</td>
                                <td>
                                    <a href="{{ route('kadis.viewMonthly', $bidang->id) }}" class="btn btn-primary">
                                        <i class="bi bi-eye fs-5"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
