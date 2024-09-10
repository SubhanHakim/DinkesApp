@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Data Bidang</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Tambah Data Bidang</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bidang</th>
                    <th>Seksi</th>
                    <th>Program</th>
                    <th>Target Kinerja</th>
                    <th>Target Capaian</th>
                    <th>target Capaian Percent (%)</th>
                    <th>Capaian Kinerja Tahunan</th>
                    <th>Capaian Kinerja Tahunan (%)</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bidangs as $bidang)
                    <tr>
                        <td>{{ $bidang->id }}</td>
                        <td>{{ $bidang->bidang }}</td>
                        <td>{{ $bidang->seksi }}</td>
                        <td>{{ $bidang->program }}</td>
                        <td>{{ $bidang->target_kinerja }}</td>
                        <td>{{ $bidang->target_capaian }}</td>
                        <td>{{ $bidang->target_capaian_percent }}%</td>
                        <td>{{ $bidang->capaian_kinerja_tahunan }}</td>
                        <td>{{ $bidang->capaian_kinerja_tahunan_percent }}%</td>
                        <td>{{ $bidang->keterangan }}</td>
                        {{-- <td>
                            <a href="{{ route('bidang.edit', $bidang) }}" class="btn btn-primary">Edit</a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
