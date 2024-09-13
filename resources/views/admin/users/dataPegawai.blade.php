@extends('layouts.app')

@section('content')
    <div class="row g-4" style="height: 100vh">
        <div class="col-md-12">
            <div class="p-4">
                <div class="p-6 rounded-2" style="background-color: #ECECEC;">
                    <div class="p-4">
                        <h3 class="dash-head">Data Pegawai ({{ $pegawaiCount }})</h3>
                    </div>
                    <div class="p-4 col-md-3">
                        <form method="GET" action="{{ route('admin.users.dataPegawai') }}">
                            <div class="form-group">
                                <label for="bidang">Filter by Bidang:</label>
                                <select name="bidang" id="bidang" class="form-control" onchange="this.form.submit()">
                                    <option value="">--Select Bidang--</option>
                                    <option value="p2p" {{ request('bidang') == 'p2p' ? 'selected' : '' }}>P2P</option>
                                    <option value="sdk" {{ request('bidang') == 'sdk' ? 'selected' : '' }}>SDK</option>
                                    <option value="kesmas" {{ request('bidang') == 'kesmas' ? 'selected' : '' }}>Kesmas</option>
                                    <option value="yankes" {{ request('bidang') == 'yankes' ? 'selected' : '' }}>Yankes</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="p-4">
                        <table class="table table-bordered" id="pegawaiTable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Nomor Telepon</th>
                                    <th>Bidang</th>
                                    <th>Program</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allPegawai as $p)
                                    <tr>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->nip }}</td>
                                        <td>{{ $p->phone_number }}</td>
                                        <td>{{ $p->bidang }}</td>
                                        <td>{{ $p->program }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
