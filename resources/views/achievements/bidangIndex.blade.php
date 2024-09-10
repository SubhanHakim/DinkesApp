@extends('layouts.bidangApp')

@section('content')
    <div class="container p-5">
        <div class="p-4" style="background-color: #ECECEC; border-radius: 16px">
            <h1>Data Bidang ({{$jumlahBidang}})</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Search and Filter Section -->
            <div class="d-flex justify-content-between my-4">
                <div class="">
                    <form action="{{ route('achievements.bidangIndex') }}" method="GET">
                        <div class="input-group">
                            <select name="year" class="form-select">
                                <option value="">Pilih Tahun</option>
                                @for ($year = now()->year; $year >= 2020; $year--)
                                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                        {{ $year }}</option>
                                @endfor
                            </select>
                            <button class="btn btn-primary" type="submit">Filter</button>
                        </div>
                    </form>
                </div>
                <div>
                    <form action="{{ route('achievements.bidangIndex') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Data"
                                value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Data Table -->
            <table class="table table-hover">
                <thead style="background-color: #d3d3d3;">
                    <tr class="text-dark" style="text-align: center;">
                        <th>Bidang</th>
                        <th>Tim</th>
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
                        <tr style="text-align: center">
                            <td>{{ $bidang->bidang }}</td>
                            <td>{{ $bidang->seksi }}</td>
                            <td>{{ $bidang->program }}</td>
                            <td>{{ $bidang->target_kinerja }}</td>
                            <td>{{ $bidang->target_capaian }}</td>
                            <td>{{ $bidang->capaian_kinerja_tahunan }}</td>
                            <td>{{ number_format($bidang->capaian_kinerja_tahunan_percent, 2) }}%</td>
                            <td>{{ $bidang->keterangan }}</td>
                            <td>
                                <a href="{{ route('achievements.editMonthly', $bidang->id) }}" class="btn"><i
                                        class="bi bi-eye fs-4"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
