@extends('layouts.kadisApp')

@section('content')
<div class="container">
    <h1>Komentar untuk Bidang: {{ $bidang->nama_bidang }} - Bulan: {{ $bulan }}</h1>

    <form action="{{ route('comments.store', [$bidang->id, $bulan]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Komentar</label>
            <textarea name="comment" id="comment" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Kirim Komentar</button>
    </form>

    <h3 class="mt-5">Komentar Sebelumnya:</h3>
    @foreach($comments as $comment)
    <div class="alert alert-secondary">
        <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
        <br>
        <small>{{ $comment->created_at->format('d M Y H:i') }}</small>
    </div>
    @endforeach
</div>
@endsection
