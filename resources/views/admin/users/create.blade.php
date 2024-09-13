@extends('layouts.app')

@section('content')
    <div class="row g-4" style="height: 100vh">
        <div class="col-md-10">
            <div class="p-4">
                <div class="p-6 rounded-4" style="background-color: #ECECEC;">
                    <div class="p-4">
                        <div>
                            <h2>Register Akun</h2>
                            <p>Masukan detail informasi akun pengguna</p>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('admin.users.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm
                                        Password</label>

                                    <div class="col-md-6">
                                        <input id="password_confirmation" type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" required autocomplete="new-password">

                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                                    <div class="col-md-6">
                                        <select id="role" class="form-control @error('role') is-invalid @enderror"
                                            name="role" onchange="checkRole()" required>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="bidang" {{ old('role') == 'bidang' ? 'selected' : '' }}>Bidang
                                            </option>
                                            <option value="kadis" {{ old('role') == 'kadis' ? 'selected' : '' }}>Kadis
                                            </option>
                                        </select>


                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid row">
                                    <div class="form-group col-md-4">
                                        <label for="nama_depan" class="col-md-4 col-form-label text-md-right">Nama
                                            Depan:</label>
                                        <div class="col">
                                            <input type="text" class="form-control" id="nama_depan" name="nama_depan"
                                                value="{{ old('nama_depan') }}" required>
                                            @error('nama_depan')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nama_belakang" class="col-md-4 col-form-label text-md-right">Nama
                                            Belakang:</label>
                                        <div class="col">
                                            <input type="text" class="form-control" id="nama_belakang"
                                                name="nama_belakang" value="{{ old('nama_belakang') }}" required>
                                            @error('nama_belakang')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nip" class="col-md-4 col-form-label text-md-right">NIP:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="nip" name="nip"
                                            value="{{ old('nip') }}" required>
                                        @error('nip')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone
                                        Number:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ old('phone_number') }}" required>
                                        @error('phone_number')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="bidang">Bidang:</label>
                                    <div class="col-md-6">
                                        <select id="bidang" class="form-control" name="bidang">
                                            <option value="p2p">P2P</option>
                                            <option value="sdk">SDK</option>
                                            <option value="kesmas">Kesmas</option>
                                            <option value="yankes">Yankes</option>
                                        </select>
                                        @error('bidang')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="program">Program:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="program" name="program"
                                            value="{{ old('program') }}" required>
                                        @error('program')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mt-5">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            Add User
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
