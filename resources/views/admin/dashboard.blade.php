@extends('layouts.app')

@section('content')
    <div class="row g-4" style="min-height: 100vh;">
        <div class="col-12">
            <div class="p-4">
                <div class="p-6 rounded-4" style="background-color: #ECECEC; min-height: 100vh;">
                    <div class="gap-dashboard">
                        <div class="py-4 text-center text-md-start">
                            <h2 class="heading-dash" style="font-size: 32px; font-weight: bold;">Dashboard</h2>
                        </div>

                        <div class="row">
                            <!-- Card untuk Semua Bidang (Full width - col-12) -->
                            <div class="col-12 mb-4">
                                <div class="bg-dashboard p-4 h-100 d-flex flex-column align-items-center justify-content-center shadow-sm rounded">
                                    <div class="gap-assets text-center">
                                        <i class="bi bi-person-fill" style="font-size: 48px;"></i>
                                        <div class="mt-3">
                                            <h2 style="font-size: 20px; font-weight: 600">Total Akun Pegawai</h2>
                                            <p style="font-size: 14px;">Semua Bidang</p>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="count-text" style="font-size: 36px;">{{ $userCount }}</h2>
                                    </div>
                                </div>
                            </div>

                            <!-- Card untuk Bidang P2P -->
                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                                <div class="bg-dashboard p-4 h-100 d-flex flex-column align-items-center justify-content-center shadow-sm rounded">
                                    <div class="gap-assets text-center">
                                        <i class="bi bi-person-fill" style="font-size: 48px;"></i>
                                        <div class="mt-3">
                                            <h2 style="font-size: 20px; font-weight: 600">Total Akun Pegawai</h2>
                                            <p style="font-size: 14px;">Bidang P2P</p>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="count-text" style="font-size: 36px;">{{ $totalp2p }}</h2>
                                    </div>
                                </div>
                            </div>

                            <!-- Card untuk Bidang SDK -->
                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                                <div class="bg-dashboard p-4 h-100 d-flex flex-column align-items-center justify-content-center shadow-sm rounded">
                                    <div class="gap-assets text-center">
                                        <i class="bi bi-person-fill" style="font-size: 48px;"></i>
                                        <div class="mt-3">
                                            <h2 style="font-size: 20px; font-weight: 600">Total Akun Pegawai</h2>
                                            <p style="font-size: 14px;">Bidang SDK</p>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="count-text" style="font-size: 36px;">{{ $totalsdk }}</h2>
                                    </div>
                                </div>
                            </div>

                            <!-- Card untuk Bidang Yankes -->
                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                                <div class="bg-dashboard p-4 h-100 d-flex flex-column align-items-center justify-content-center shadow-sm rounded">
                                    <div class="gap-assets text-center">
                                        <i class="bi bi-person-fill" style="font-size: 48px;"></i>
                                        <div class="mt-3">
                                            <h2 style="font-size: 20px; font-weight: 600">Total Akun Pegawai</h2>
                                            <p style="font-size: 14px;">Bidang Yankes</p>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="count-text" style="font-size: 36px;">{{ $totalyankes }}</h2>
                                    </div>
                                </div>
                            </div>

                            <!-- Card untuk Bidang Kesmas -->
                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                                <div class="bg-dashboard p-4 h-100 d-flex flex-column align-items-center justify-content-center shadow-sm rounded">
                                    <div class="gap-assets text-center">
                                        <i class="bi bi-person-fill" style="font-size: 48px;"></i>
                                        <div class="mt-3">
                                            <h2 style="font-size: 20px; font-weight: 600">Total Akun Pegawai</h2>
                                            <p style="font-size: 14px;">Bidang Kesmas</p>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="count-text" style="font-size: 36px;">{{ $totalkesmas }}</h2>
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
