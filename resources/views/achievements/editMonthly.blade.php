@extends('layouts.bidangApp')

@section('content')
    <div class="container" style="background-color: #ECECEC; margin-top: 100px; border-radius: 16px">
        <div class="tabel-card">
            <div>
                <h3>Data Bidang ({{ $bidang->name }} - {{ $bidang->program }})</h3>
            </div>
            <form action="{{ route('achievements.updateMonthly', $bidang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <table class="table">
                    <thead>
                        <tr>
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
                            <tr>
                                <td>{{ $achievement->bulan }}</td>
                                <td>{{ $achievement->target_capaian_bulanan }}</td>
                                <td>
                                    @if ($achievement->target_capaian_bulanan != 0)
                                        {{ number_format(($achievement->capaian_kinerja_bulanan / $achievement->target_capaian_bulanan) * 100, 2) }}%
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
                                <td>
                                    {{ $achievement->percent_capaian_kinerja_bulanan }} %
                                </td>
                                <td>{{ $achievement->keterangan }}</td>
                                <td>
                                    <a href="{{ route('achievements.edit', ['id' => $achievement->id, 'bidangId' => $bidang->id, 'bulan' => $achievement->bulan]) }}"
                                        class="btn"><i class="bi bi-pencil"></i></a>
                                    <a href="{{ route('comments.show', ['bidang_id' => $bidang->id, 'bulan' => 'Januari']) }}"
                                        class="btn">
                                        <i class="bi bi-chat-dots"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>



                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            {{-- <div class="col-md-4">
                <canvas id="achievementChart"></canvas>
            </div> --}}

            <!-- Contoh di editMonthly.blade.php -->
            {{-- <div class="comments-section">
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
            </div> --}}
        </div>
    </div>
@endsection
