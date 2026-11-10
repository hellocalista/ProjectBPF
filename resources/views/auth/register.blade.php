<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar · PALLAWA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="auth-page">
    <main class="auth-shell">
        <section class="auth-visual"><a class="auth-brand" href="{{ url('/') }}"><span class="auth-brand-icon"><i
                        class="fa-solid fa-people-group"></i></span><span>PALLAWA</span></a>
            <div class="auth-visual-copy"><span class="auth-kicker">MULAI LANGKAH BARU</span>
                <h1>Kesempatan baik<br>dimulai dari sini.</h1>
                <p>Buat akun PALLAWA untuk mengakses peluang, membangun profil, dan mengelola kebutuhan profesional
                    Anda.</p>
                <div class="auth-feature"><i class="fa-solid fa-shield-halved"></i><span>Daftar dengan aman dan lengkapi
                        profil kapan saja.</span></div>
            </div>
            <div class="auth-visual-footer">© {{ date('Y') }} PALLAWA · Platform Pekerja dan Pengelolaan Keuangan
            </div>
        </section>
        <section class="auth-form-wrap">
            <div class="auth-form auth-form-register">
                <div class="auth-mobile-brand">PALLAWA</div>
                <div class="auth-heading"><span class="auth-kicker">BUAT AKUN BARU</span>
                    <h2>Daftar {{ $role === 'worker' ? 'sebagai pekerja' : 'sebagai perusahaan' }}</h2>
                    <p>Lengkapi informasi berikut untuk memulai.</p>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first() }}<button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Tutup"></button></div>
                @endif
                <form method="POST" action="{{ route('register.post') }}" class="auth-fields">@csrf<input
                        type="hidden" name="role" value="{{ $role }}">
                    <div class="mb-3"><label class="form-label"
                            for="name">{{ $role === 'worker' ? 'Nama lengkap' : 'Nama perusahaan' }}</label><input
                            class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Masukkan nama" autocomplete="name" required></div>
                    <div class="mb-3"><label class="form-label" for="email">Alamat email</label><input
                            class="form-control" id="email" type="email" name="email"
                            value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required>
                    </div>
                    <div class="mb-3"><label class="form-label" for="phone">Nomor HP <span
                                class="text-muted fw-normal">(opsional)</span></label><input class="form-control"
                            id="phone" name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx"
                            autocomplete="tel"></div>
                    <div class="mb-3"><label class="form-label" for="password">Password <span
                                class="text-muted fw-normal">(minimal 8 karakter)</span></label><input
                            class="form-control" id="password" type="password" name="password"
                            autocomplete="new-password" required></div>
                    <div class="mb-3"><label class="form-label" for="password_confirmation">Konfirmasi
                            password</label><input class="form-control" id="password_confirmation" type="password"
                            name="password_confirmation" autocomplete="new-password" required></div>
                    <button class="btn btn-primary auth-submit" type="submit">Buat akun <i
                            class="fa-solid fa-arrow-right ms-2"></i></button>
                </form>
                <div class="auth-register"><span>Sudah memiliki akun?</span>
                    <div><a href="{{ route('login', $role) }}">Masuk ke akun</a></div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
