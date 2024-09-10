@extends('layouts.kadisApp')

@section('content')
    <div class="container p-5">
        <h2>Data Bulanan - {{ $bidang->bidang }}</h2>

        <table class="table table-bordered">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>Bulan</th>
                    <th>Target Capaian Bulanan</th>
                    <th>Capaian Kinerja Bulanan</th>
                    <th>Capaian (%)</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($achievements as $achievement)
                    <tr>
                        <td>{{ $achievement->bulan }}</td>
                        <td>{{ $achievement->target_capaian_bulanan }}</td>
                        <td>{{ $achievement->capaian_kinerja_bulanan }}</td>
                        <td>{{ $achievement->capaian_kinerja_bulanan_percent }}%</td>
                        <td>{{ $achievement->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('kadis.dataBidang') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>

    <div class="comments-section">
        <h3>Comments</h3>
        @foreach ($bidang->comments as $comment)
            <div class="comment">
                <strong>{{ $comment->user->name }}:</strong>
                <p>{{ $comment->comment }}</p>
                <small>{{ $comment->created_at->format('d M Y, H:i') }}</small>
            </div>
        @endforeach

        @if (Auth::check())
            <form action="{{ route('comments.store', $bidang->id) }}" method="POST">
                @csrf
                <textarea name="comment" class="form-control" rows="3" required></textarea>
                <button type="submit" class="btn btn-primary mt-2">Submit Comment</button>
            </form>
        @endif
    </div>
@endsection
