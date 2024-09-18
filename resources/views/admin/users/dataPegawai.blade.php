@extends('layouts.app')

@section('content')
    <div class="row g-4" style="min-height: 100vh;">
        <div class="col-12">
            <div class="p-4">
                <div class="p-6 rounded-2" style="background-color: #ECECEC;">
                    <!-- Header Section -->
                    <div class="p-4 text-center text-md-start">
                        <h3 class="dash-head" style="font-size: 24px; font-weight: bold;">Data Pegawai ({{ $pegawaiCount }})</h3>
                    </div>
                    
                    <!-- Filter Section -->
                    <div class="p-4 col-12 col-md-6 col-lg-3">
                        <form method="GET" action="{{ route('admin.users.dataPegawai') }}">
                            <div class="form-group mb-3">
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
                    
                    <!-- Table Section -->
                    <div class="table-responsive p-4">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Bidang</th>
                                    <th scope="col">Program</th>
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
