@extends('layouts.app')

@section('content')
    <div class="row g-4" style="height: 100vh">
        <div class="col-md-2 position-relative">
            <div class="navbar-sidebar d-flex flex-column justify-content-between align-items-center">
                <div class="">
                    <ul class="guide-gap">
                        <li>
                            <div>
                                <a href="" class="text-black">Dashboard</a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="" class="text-black">Buat Akun</a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="" class="text-black">Data Pegawai</a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="" class="text-black">Data Bidang</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <button>Logout</button>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="p-4">
                <div class="p-6 rounded-4" style="background-color: #ECECEC;">
                    <div class="p-4">
                        <div>
                            <h2>register Akun</h2>
                            <p>Masukan detail informasi akun pengguna</p>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('admin.users.store') }}">
                                @csrf
                                <div class="form-group row">
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

                                <div class="form-group row">
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

                                <div class="form-group row">
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
                                <div class="form-group row">
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

                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                                    <div class="col-md-6">
                                        <select id="role" class="form-control @error('role') is-invalid @enderror"
                                            name="role" required>
                                            <option value="">Select Role</option>
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

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
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
