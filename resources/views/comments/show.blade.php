@if (Auth::user()->role == 'bidang')
    @extends('layouts.bidangApp')
@elseif (Auth::user()->role == 'kadis')
    @extends('layouts.kadisApp')
@endif


@section('content')
    <div class="container p-4">
        <div class="card p-4 rounded-4" style="background-color: #ECECEC">
            <div class="d-flex justify-content-center">
                <h2 class="fs-3">Laporan Bulan {{ $bidang->name }} - {{ $bulan }}</h2>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mb-4">
                <form action="{{ route('comments.store', ['bidang_id' => $bidang->id, 'bulan' => $bulan]) }}" method="POST">
                    @csrf
                    <div class="d-flex align-items-start justify-content-center">
                        <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center"
                            style="width: 50px; height: 50px;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        {{-- Comment Input --}}
                        <div class="form-group w-100">
                            <textarea name="comment" class="form-control" rows="2" placeholder="Tulis komentar..." required></textarea>
                        </div>
                        {{-- Submit Button --}}
                        <div class="ms-3">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Comment List --}}
            <div class="comments-list">
                @foreach ($comments as $comment)
                    <div class="comment mb-3 p-3 bg-white rounded-3 shadow-sm">
                        <div class="d-flex align-items-start">
                            {{-- Avatar Placeholder --}}
                            <div class="me-3">
                                <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center"
                                    style="width: 50px; height: 50px;">
                                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                </div>
                            </div>

                            {{-- Comment Content --}}
                            <div class="w-100">
                                <p class="fw-bold mb-1">{{ $comment->user->name }}</p>
                                <p class="mb-2">{{ $comment->comment }}</p>
                                <span class="text-muted"
                                    style="font-size: 0.9em;">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
