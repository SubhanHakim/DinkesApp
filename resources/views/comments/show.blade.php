@extends('layouts.bidangApp')

@section('content')
<div class="container">
    <h2>Komentar untuk {{ $bidang->name }} - {{ $bulan }}</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="comments-list">
        @foreach ($comments as $comment)
            <div class="comment">
                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}</p>
                <span>{{ $comment->created_at->diffForHumans() }}</span>
            </div>
        @endforeach
    </div>

    <form action="{{ route('comments.store', ['bidang_id' => $bidang->id, 'bulan' => $bulan]) }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="comment" class="form-control" placeholder="Tulis komentar..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
    
</div>
@endsection
