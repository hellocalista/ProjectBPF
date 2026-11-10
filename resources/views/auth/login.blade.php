<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk · Grosir Kaos Polos Joymaker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="auth-page">
    <main class="auth-shell">
        <section class="auth-visual">
            <a class="auth-brand" href="{{ url('/') }}"><span class="auth-brand-icon"><i
                        class="fa-solid fa-people-group"></i></span><span>Grosir Kaos Polos Joymaker</span></a>
            <div class="auth-visual-copy">
                <span class="auth-kicker">High quality cool tshirts for street fashion</span>
                <h1>Bangun fashion<br>Tampil Keren.</h1>
                <p>Baju</p>
                <div class="auth-feature"><i class="fa-solid fa-shield-halved"></i><span>Baju</span></div>
            </div>
            <div class="auth-visual-footer">© {{ date('Y') }} Grosir Kaos Polos Joymaker · High quality cool tshirts
                for street fashion
            </div>
        </section>
        <section class="auth-form-wrap">
            <div class="auth-form">
                <div class="auth-mobile-brand">Grosir Kaos Polos Joymaker</div>
                <div class="auth-heading"><span class="auth-kicker">SELAMAT DATANG KEMBALI</span>
                    <h2>Masuk ke akun Anda</h2>
                    <p>Masukkan detail akun untuk melanjutkan.</p>
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Tutup"></button></div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Tutup"></button></div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first() }}<button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Tutup"></button></div>
                @endif
                <form method="POST" action="{{ route('login.post') }}" class="auth-fields">
                    @csrf
                    <div class="mb-3"><label class="form-label" for="role">Jenis akun</label><select
                            class="form-select" id="role" name="role" required>
                            <option value="admin" @selected(($role ?? '') === 'admin')>Admin</option>
                            <option value="pelanggan" @selected(($role ?? '') === 'pelanggan')>Pelanggan</option>
                            <option value="pabrik" @selected(($role ?? '') === 'pabrik')>Pabrik</option>
                            <option value="penjual" @selected(($role ?? '') === 'penjual')>Penjual</option>
                        </select></div>
                    <div class="mb-3"><label class="form-label" for="email">Alamat email</label><input
                            class="form-control" id="email" type="email" name="email"
                            value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required>
                    </div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input
                            class="form-control" id="password" type="password" name="password"
                            placeholder="Masukkan password" autocomplete="current-password" required></div>
                    <div class="auth-options"><label class="form-check"><input class="form-check-input" type="checkbox"
                                name="remember" id="remember"><span class="form-check-label">Ingat saya</span></label>
                    </div>
                    <button class="btn btn-primary auth-submit" type="submit">Masuk <i
                            class="fa-solid fa-arrow-right ms-2"></i></button>
                </form>
                <div class="auth-register"><span>Belum memiliki akun?</span>
                    <div><a href="{{ route('register', 'worker') }}">Daftar sebagai pelanggan</a><span
                            class="auth-dot">·</span><a href="{{ route('register', 'company') }}">Daftar sebagai
                            penjual</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
