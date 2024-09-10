@extends('layouts.kadisApp')

@section('content')
    <div class="container p-5">
        <h2>Pesan Masuk</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>Pengirim</th>
                    <th>Pesan</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chats as $chat)
                    <tr>
                        <td>{{ $chat->fromUser->name }}</td>
                        <td>{{ $chat->message }}</td>
                        <td>{{ $chat->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
