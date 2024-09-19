@extends('layouts.kadisApp')

@section('content')
    <div class="container p-4">
        <h2 class="text-center text-md-start">Data Bulanan - {{ $bidang->bidang }}</h2>

        <!-- Tabel Responsif -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="bg-secondary text-white text-center">
                    <tr>
                        <th>Bulan</th>
                        <th>Target Capaian Bulanan</th>
                        <th>Capaian Kinerja Bulanan</th>
                        <th>Capaian (%)</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($achievements as $achievement)
                        <tr class="text-center">
                            <td>{{ $achievement->bulan }}</td>
                            <td>{{ $achievement->target_capaian_bulanan }}</td>
                            <td>{{ $achievement->capaian_kinerja_bulanan }}</td>
                            <td>{{ $achievement->percent_capaian_kinerja_bulanan }} %</td>
                            <td>{{ $achievement->keterangan }}</td>
                            <td>
                                <a href="{{ route('comments.show', ['bidang_id' => $bidang->id, 'bulan' => 'Januari']) }}"
                                    class="btn btn-primary">
                                    <i class="bi bi-chat-dots"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tombol Kembali -->
        <div class="text-center text-md-start mt-4">
            <a href="{{ route('kadis.dataBidang') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
