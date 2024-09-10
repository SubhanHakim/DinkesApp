@extends('layouts.kadisApp')

@section('content')
<div class="container">
    <h1>Dashboard Kadis</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Bidang</th>
                <th>Target Kinerja</th>
                <th>Capaian Kinerja Tahunan</th>
                <th>Keterangan</th>
                <th>Komentar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bidangs as $bidang)
            <tr>
                <td>{{ $bidang->nama_bidang }}</td>
                <td>{{ $bidang->target_kinerja }}</td>
                <td>{{ $bidang->capaian_kinerja_tahunan }}</td>
                <td>{{ $bidang->keterangan }}</td>
                {{-- <td>
                    <a href="{{ route('comments.show', $bidang->id) }}" class="btn btn-info">Lihat Komentar</a>
                </td> --}}
                <td>
                    <a href="{{ route('achievements.bidangEdit', $bidang->id) }}" class="btn btn-primary">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
