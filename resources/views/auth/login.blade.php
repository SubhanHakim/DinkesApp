<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Styles Bosstraps -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="">
    <div class="box-login">
        <div class="h-100 row align-content-center">
            <div class="bg-primary-set h-100 col-8 rounded-start-4">
                <div class="h-100 d-flex gap-5 flex-column justify-content-center align-items-center">
                    <div class="text-center">
                        <div>
                            <img src="{{ asset('images/Logo_Kemenkes.png') }}" style="width: 100px" alt="Logo_dinkes">
                            <img src="{{ asset('images/logo_pemkot.png') }}" style="width: 100px" alt="Logo_dinkes">
                        </div>
                        <h1 class="fs-1 text-white fw-bold">Selamat Datang Kembali!</h1>
                        <p class="paragraph-primary">Dimohon untuk memasukan username dan password</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="text-center">
                        @csrf
                        <div class="d-flex flex-column gap-3">
                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control input-primary @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control input-primary @error('password') is-invalid @enderror" name="password" placeholder="Password"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn-primary-custom">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-secondary-set col-4 h-100 rounded-end-4">
                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                    <img src="{{ asset('images/animasi.png') }}" style="width: 400px" alt="">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
