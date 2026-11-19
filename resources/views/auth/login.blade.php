<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - Inventory IconPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .brand-panel {
            position: relative;
            overflow: hidden;
            color: #fff;
            background:
                radial-gradient(circle at 15% 85%, rgba(56, 189, 248, .45) 0%, rgba(56, 189, 248, 0) 45%),
                radial-gradient(circle at 85% 10%, rgba(99, 102, 241, .40) 0%, rgba(99, 102, 241, 0) 50%),
                linear-gradient(135deg, #061a3d 0%, #0a3677 42%, #0d4a8f 70%, #1a78d1 100%);
        }
        /* lingkaran lembut sebagai aksen */
        .brand-panel::before,
        .brand-panel::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }
        .brand-panel::before {
            width: 520px; height: 520px;
            top: -180px; right: -160px;
            background: linear-gradient(160deg, rgba(255, 255, 255, .14), rgba(255, 255, 255, 0));
            border: 1px solid rgba(255, 255, 255, .12);
        }
        .brand-panel::after {
            width: 380px; height: 380px;
            bottom: -140px; left: -100px;
            background: linear-gradient(20deg, rgba(255, 255, 255, .12), rgba(255, 255, 255, 0));
            border: 1px solid rgba(255, 255, 255, .10);
        }
        .brand-panel > div { position: relative; z-index: 1; }
        .brand-panel h2 { font-weight: 600; letter-spacing: .2px; }
        .brand-panel p { color: rgba(255, 255, 255, .82); max-width: 420px; }
        .brand-line {
            width: 56px; height: 3px; border-radius: 2px;
            background: linear-gradient(90deg, #38bdf8, rgba(56, 189, 248, 0));
            margin-bottom: 1.25rem;
        }
        .form-panel { background: #fff; }
        .form-box { width: 100%; max-width: 380px; }
        .form-box h1 { font-size: 1.35rem; font-weight: 600; color: #1b2733; }
        .form-label { font-size: .875rem; font-weight: 500; color: #343f4b; margin-bottom: .25rem; }
        .form-control { border-radius: 4px; border: 2px solid #8a96a8; padding: .5rem .75rem; }
        .form-control:focus { border-color: #0d4a8f; box-shadow: 0 0 0 .2rem rgba(13, 74, 143, .15); }
        .btn-masuk {
            background: #0d4a8f; border-color: #0d4a8f; color: #fff;
            border-radius: 4px; padding: .6rem; font-weight: 500;
        }
        .btn-masuk:hover, .btn-masuk:focus { background: #0a3b73; border-color: #0a3b73; color: #fff; }
        .pw-toggle {
            border: 2px solid #8a96a8; border-left: 0; background: #fff;
            color: #0d4a8f; font-size: .8125rem; padding: 0 .9rem; border-radius: 0 4px 4px 0;
        }
        .pw-toggle:hover { background: #f6f8fa; color: #0a3b73; }
        .input-group > .form-control { border-radius: 4px 0 0 4px; }
        .input-group > .form-control:focus + .pw-toggle { border-color: #0d4a8f; }
        .input-group > .form-control.is-invalid + .pw-toggle { border-color: #dc3545; }
        .form-check-input {
            width: 1.15em; height: 1.15em; margin-top: .2em;
            border: 2px solid #6b7889; border-radius: 3px;
        }
        .form-check-input:focus { border-color: #0d4a8f; box-shadow: 0 0 0 .2rem rgba(13, 74, 143, .15); }
        .form-check-input:checked { background-color: #0d4a8f; border-color: #0d4a8f; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row min-vh-100">

            {{-- Panel kiri --}}
            <div class="col-lg-7 brand-panel d-none d-lg-flex flex-column justify-content-center px-5 px-xl-6">
                <div class="ps-xl-5">
                    <div class="brand-line"></div>
                    <h2 class="display-6 mb-3">Inventory IconPlus</h2>
                    <p class="fs-6 mb-0">Sistem pencatatan dan pengelolaan stok barang.</p>
                </div>
            </div>

            {{-- Panel kanan (form login) --}}
            <div class="col-12 col-lg-5 form-panel d-flex flex-column justify-content-center align-items-center py-5 px-4">
                <div class="form-box">
                    <h1 class="mb-1">Masuk</h1>
                    <p class="text-secondary small mb-4">Gunakan akun Anda untuk melanjutkan.</p>

                    <form method="POST" action="{{ route('login.proses') }}" novalidate>
                        @csrf

                        <div class="mb-9">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror"
                                   autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-9">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group has-validation">
                                <input type="password" id="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       autocomplete="current-password">
                                <button type="button" class="pw-toggle" id="togglePw">Tampilkan</button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-check mb-5">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label small" for="remember">Ingat saya</label>
                        </div>

                        <button type="submit" class="btn btn-masuk w-100">Masuk</button>
                    </form>

                    <p class="text-secondary small mt-4 mb-0">&copy; {{ date('Y') }} Inventory IconPlus</p>
                </div>
            </div>

        </div>
    </div>

    <script>
        const pw = document.getElementById('password');
        const btn = document.getElementById('togglePw');
        btn.addEventListener('click', () => {
            const show = pw.type === 'password';
            pw.type = show ? 'text' : 'password';
            btn.textContent = show ? 'Sembunyikan' : 'Tampilkan';
        });
    </script>
</body>
</html>
