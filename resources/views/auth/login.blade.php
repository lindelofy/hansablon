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
                        <h3 class="text-center text-primary mb-4 fw-bold animated fadeInUp">Login Konsumen</h3>
                        <p class="text-center text-muted mb-4 animated fadeInUp">Masukkan akun Anda untuk melanjutkan</p>

                        @if (session('error'))
                            <div class="alert alert-danger text-center animated shake">
                                {{ session('error') }}
                            </div>
                        @endif
                        @error('email')
                            <div class="alert alert-danger text-center animated shake">{{ $message }}</div>
                        @enderror
                        @error('password')
                            <div class="alert alert-danger text-center animated shake">{{ $message }}</div>
                        @enderror

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-4 animated fadeInUp delay-1s">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       placeholder="Tulis Email"
                                       value="{{ old('email', 'admin@admin.com') }}"
                                       required>
                            </div>

                            <div class="mb-4 animated fadeInUp delay-1.5s">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <div class="input-group">
                                    <input type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           id="password"
                                           name="password"
                                           placeholder="Tulis Password"
                                           value="admin"
                                           required>
                                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()" title="Tampilkan Password">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 fw-bold mt-3 py-2 animated zoomIn">Login</button>

                            <div class="text-center mt-3 animated fadeInUp delay-2s">
                                <small>Belum punya akun? 
                                    <a href="/register" class="text-decoration-none text-primary fw-semibold">Daftar Akun Baru</a>
                                </small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

<style>
    .bubble-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
        background: radial-gradient(circle at bottom, rgb(241, 243, 246), rgb(232, 236, 243));
    }

    .bubble {
        position: absolute;
        bottom: -150px;
        width: 140px;
        height: auto;
        opacity: 1; /* Tidak memudar */
        animation: rise 20s linear infinite;
    }

    @keyframes rise {
        0% {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
        100% {
            transform: translateY(-120vh) scale(1.2);
            opacity: 1; /* Tetap terlihat penuh */
        }
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

    .fadeInUp { animation: fadeInUp 1s ease-in-out; }
    .delay-1s { animation-delay: 1s; }
    .delay-1.5s { animation-delay: 1.5s; }
    .delay-2s { animation-delay: 2s; }
    .zoomIn { animation: zoomIn 1s ease-out; }
    .shake { animation: shake 0.5s ease-in-out; }
    .animated-card { animation: slideUp 1.5s ease-out; }

    @keyframes slideUp {
        0% { transform: translateY(50px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }

    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes zoomIn {
        0% { transform: scale(0.8); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }

    @keyframes shake {
        0% { transform: translateX(-5px); }
        25% { transform: translateX(5px); }
        50% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
        100% { transform: translateX(0); }
    }

    .btn-primary:hover {
        transform: scale(1.05);
        transition: transform 0.2s ease-in-out;
    }
</style>

@endsection
