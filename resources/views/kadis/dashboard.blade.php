@extends('layouts.kadisApp')

@section('content')
    <div class="container mt-5">
        <h1>Selamat Datang, Kadis!</h1>
        <div class="row">
            @foreach ($data as $bidangData)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Progress Bidang {{ $bidangData['bidang'] }}</h5>
                            <div class="row">
                                <div class="col">
                                    <h3>{{ $bidangData['selesai'] }}</h3>
                                    <p>Selesai</p>
                                </div>
                                <div class="col">
                                    <h3>{{ $bidangData['belumSelesai'] }}</h3>
                                    <p>Belum Selesai</p>
                                </div>
                            </div>
                            {{-- <a href="{{ route('kadis.bidangDetail', $bidangData['bidang']) }}" class="stretched-link"></a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
