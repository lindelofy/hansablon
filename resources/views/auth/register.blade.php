@extends('home.layout.master')

@section('content')

<!-- Background Bubble Baju -->
<div class="bubble-background">
    @for ($i = 0; $i < 20; $i++)
        <img src="{{ asset('images/shirt1.png') }}" alt="baju" class="bubble">
        <img src="{{ asset('images/shirt2.png') }}" alt="baju" class="bubble">
        <img src="{{ asset('images/shirt3.png') }}" alt="baju" class="bubble">
        <img src="{{ asset('images/shirt4.png') }}" alt="baju" class="bubble">
        <img src="{{ asset('images/shirt5.png') }}" alt="baju" class="bubble">
    @endfor
</div>

<div class="login-area d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg border-0 rounded-5 animated-card">
                    <div class="card-body p-5">
                        <h3 class="text-center text-primary mb-4 fw-bold animated fadeInUp">Daftar Konsumen</h3>
                        <p class="text-center text-muted mb-4 animated fadeInUp">Buat akun baru untuk mulai berbelanja</p>

                        @if (session('error'))
                            <div class="alert alert-danger text-center animated shake">
                                {{ session('error') }}
                            </div>
                        @endif
                        @error('name')
                            <div class="alert alert-danger text-center animated shake">{{ $message }}</div>
                        @enderror
                        @error('email')
                            <div class="alert alert-danger text-center animated shake">{{ $message }}</div>
                        @enderror
                        @error('password')
                            <div class="alert alert-danger text-center animated shake">{{ $message }}</div>
                        @enderror

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3 animated fadeInUp delay-1s">
                                <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Tulis Nama" required>
                            </div>

                            <div class="mb-3 animated fadeInUp delay-1s">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Tulis Email" required>
                            </div>

                            <div class="mb-3 animated fadeInUp delay-1.5s">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Tulis Password" required>
                            </div>

                            <div class="mb-3 animated fadeInUp delay-1.5s">
                                <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi Password" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 fw-bold mt-3 py-2 animated zoomIn">Buat Akun Baru</button>

                            <div class="text-center mt-3 animated fadeInUp delay-2s">
                                <small>Sudah punya akun? 
                                    <a href="/login" class="text-decoration-none text-primary fw-semibold">Login di sini</a>
                                </small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan animasi dan icon -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<!-- Tambahkan CSS bubble jika belum ada -->
<style>
    .bubble-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
        background: radial-gradient(circle at bottom, rgb(241, 243, 246), rgb(236, 239, 247));
    }

    .bubble {
        position: absolute;
        bottom: -150px;
        width: 140px;
        height: auto;
        opacity: 0.6;
        animation: rise 20s linear infinite;
    }

    @keyframes rise {
        0%   { transform: translateY(0); opacity: 1; }
        100% { transform: translateY(-120vh); opacity: 0; }
    }

    .bubble:nth-child(1)  { left: 5%;  animation-duration: 22s; }
    .bubble:nth-child(2)  { left: 12%; animation-duration: 18s; }
    .bubble:nth-child(3)  { left: 20%; animation-duration: 26s; }
    .bubble:nth-child(4)  { left: 28%; animation-duration: 19s; }
    .bubble:nth-child(5)  { left: 36%; animation-duration: 24s; }
    .bubble:nth-child(6)  { left: 44%; animation-duration: 21s; }
    .bubble:nth-child(7)  { left: 52%; animation-duration: 27s; }
    .bubble:nth-child(8)  { left: 60%; animation-duration: 23s; }
    .bubble:nth-child(9)  { left: 68%; animation-duration: 25s; }
    .bubble:nth-child(10) { left: 76%; animation-duration: 22s; }
    .bubble:nth-child(11) { left: 84%; animation-duration: 20s; }
    .bubble:nth-child(12) { left: 92%; animation-duration: 28s; }

    .animated-card { animation: slideUp 1.5s ease-out; }

    @keyframes slideUp {
        0% { transform: translateY(50px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }
</style>

@endsection
