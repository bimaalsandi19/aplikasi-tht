<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<style>
    .form-control {
        width: 400px;
    }
</style>

<body>
    <div class="container-fluid p-0 overflow-hidden">

        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="content text-center">
                    <h1 class="h5 mb-4"><i class="bi bi-handbag" style="color: #f13b2f"></i> &nbsp;SIMS Web App</h1>
                    <h1 class="h3" style="margin-bottom: 70px">Masuk atau buat akun <br> untuk memulai </h1>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Logout Sukses</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('loginError') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="/auth" method="post">
                        @csrf
                        <div class="input-group mb-4">
                            <span class="input-group-text bg-transparent">
                                <i class="bi bi-at"></i>
                            </span>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror  border-start-0"
                                placeholder="masukkan email Anda">
                            @error('email')
                                <div class="invalid-feedback" style="text-align: left">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text bg-transparent">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" name="password"
                                class="form-control border-start-0 @error('password') is-invalid @enderror"
                                placeholder="masukkan password Anda">
                            @error('password')
                                <div class="invalid-feedback" style="text-align: left">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger form-control"
                                style="background: #f13b2f !important">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <img src="/img/Frame 98699.png" alt="" width="100%" style="height: 100vh">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384h1-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
