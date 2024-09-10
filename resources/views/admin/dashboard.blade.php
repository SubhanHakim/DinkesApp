@extends('layouts.app')

@section('content')
    <div class="row g-4" style="height: 100vh">
        <div class="">
            <div class="p-4">
                <div class="p-6 rounded-4" style="background-color: #ECECEC; height: 100vh">
                    <div class="gap-dashboard">
                        <div class="py-4">
                            <h2 class="heading-dash">Dashboard</h2>
                        </div>
                        <div>
                            <div class="bg-dashboard">
                                <div class="d-flex flex-column p-4 align-items-center justify-content-center">
                                    <div class="gap-assets">
                                        <i class="bi bi-person-fill" style="font-size: 32px"></i>
                                        <div class="">
                                            <h2 style="font-size: 24px; font-weight: 600">Total Akun Pegawai</h2>
                                            <p style="font-size: 14px">Semua Bidang</p>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="count-text">{{ $userCount }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-dashboard mt-5">
                                <div class="bg-dashboard p-3">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <div class="gap-assets">
                                            <i class="bi bi-person-fill" style="font-size: 32px"></i>
                                            <div>
                                                <h2 style="font-size: 24px; font-weight: 600">Total Akun Pegawai</h2>
                                                <p style="font-size: 14px">Bidang p2p</p>
                                            </div>
                                        </div>
                                        <div>
                                            <h2>{{ $totalp2p }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-dashboard p-3">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <div class="gap-assets">
                                            <i class="bi bi-person-fill" style="font-size: 32px"></i>
                                            <div>
                                                <h2 style="font-size: 24px; font-weight: 600">Total Akun Pegawai</h2>
                                                <p style="font-size: 14px">Bidang sdk</p>
                                            </div>
                                        </div>
                                        <div>
                                            <h2>{{ $totalsdk }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-dashboard p-3">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <div class="gap-assets">
                                            <i class="bi bi-person-fill" style="font-size: 32px"></i>
                                            <div>
                                                <h2 style="font-size: 24px; font-weight: 600">Total Akun Pegawai</h2>
                                                <p style="font-size: 14px">Bidang Yankes</p>
                                            </div>
                                        </div>
                                        <div>
                                            <h2>{{ $totalyankes }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-dashboard p-3">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <div class="gap-assets">
                                            <img src="{{ asset('images/assets/user.svg') }}" style="color: blue"
                                                alt="">
                                            <div>
                                                <h2 style="font-size: 24px; font-weight: 600">Total Akun Pegawai</h2>
                                                <p style="font-size: 14px">Bidang kesmas</p>
                                            </div>
                                        </div>
                                        <div>
                                            <h2>{{ $totalkesmas }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
