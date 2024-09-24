@extends('layouts.bidangApp')

@section('content')
    <div class="container p-4" style="background-color: #ECECEC; margin-top: 100px; border-radius: 16px">
        <div class="tabel-card">
            <div class="mb-4">
                <h3 class="text-center text-md-start">Data Bidang ({{ $bidang->name }} - {{ $bidang->program }})</h3>
            </div>
            <form action="{{ route('achievements.updateMonthly', $bidang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Tabel Responsif -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead style="background-color: #d3d3d3;">
                            <tr class="text-center">
                                <th>Bulan</th>
                                <th>Target Capaian Bulanan</th>
                                <th>Dalam Persen (%)</th>
                                <th>Capaian Kinerja Bulanan</th>
                                <th>Dalam Persen (%)</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($achievements as $achievement)
                                <tr class="text-center">
                                    <td>{{ $achievement->bulan }}</td>
                                    <td>
                                        {{ $achievement->target_capaian_bulanan }}</td>
                                    <td>
                                        @if ($achievement->target_capaian_bulanan != 0)
                                            {{ number_format(($achievement->target_capaian_bulanan / $achievement->target_capaian_bulanan) * 100, ) }}%
                                        @else
                                            0%
                                        @endif
                                    </td>
                                    <td>
                                        <input type="hidden" name="achievements[{{ $achievement->id }}][capaian_kinerja_bulanan]"
                                            id="capaian_kinerja_bulanan_{{ $achievement->id }}"
                                            value="{{ old('achievements.' . $achievement->id . '.capaian_kinerja_bulanan', $achievement->capaian_kinerja_bulanan) }}"
                                            class="form-control" readonly>
                                        {{ $achievement->capaian_kinerja_bulanan }}
                                    </td>
                                    <td>{{ $achievement->percent_capaian_kinerja_bulanan }} %</td>
                                    <td>{{ $achievement->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('achievements.edit', ['id' => $achievement->id, 'bidangId' => $bidang->id, 'bulan' => $achievement->bulan]) }}"
                                            class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                                        <a href="{{ route('comments.show', ['bidang_id' => $bidang->id, 'bulan' => $achievement->bulan]) }}"
                                            class="btn btn-secondary">
                                            <i class="bi bi-chat-dots"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Tombol Simpan -->
                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
