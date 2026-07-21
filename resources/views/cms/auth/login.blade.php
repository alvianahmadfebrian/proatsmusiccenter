<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Login — CV. Proats Indonesia</title>

    <!-- Favicon / Tab Bar Icon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 50% 10%, rgba(212, 175, 55, 0.08) 0%, transparent 60%),
                        radial-gradient(circle at 80% 90%, rgba(212, 175, 55, 0.05) 0%, transparent 50%),
                        #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            overflow-x: hidden;
        }

        /* Subtle background pattern */
        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(212, 175, 55, 0.12) 1px, transparent 1px);
            background-size: 32px 32px;
            pointer-events: none;
            opacity: 0.6;
        }

        .login-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
        }

        /* Centered White Card with Gold Accent Details */
        .login-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.06), 0 10px 25px rgba(212, 175, 55, 0.12);
            border: 1px solid rgba(212, 175, 55, 0.25);
            position: relative;
            overflow: hidden;
            padding: 44px 38px 36px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.08), 0 15px 35px rgba(212, 175, 55, 0.2);
        }

        /* Gold top accent line */
        .card-gold-bar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #b89628 0%, #d4af37 50%, #f5d061 100%);
        }

        /* Header / Logo */
        .login-brand {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand-logo-icon {
            width: 68px;
            height: 68px;
            border-radius: 20px;
            background: linear-gradient(135deg, #d4af37 0%, #b89628 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            box-shadow: 0 12px 30px rgba(212, 175, 55, 0.35);
            color: #000;
            font-size: 1.8rem;
        }

        .login-brand h2 {
            font-size: 1.75rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-bottom: 4px;
        }

        .login-brand h2 span {
            color: #b89628;
            background: linear-gradient(90deg, #b89628, #d4af37);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-brand p {
            color: #64748b;
            font-size: 0.88rem;
            font-weight: 500;
        }

        .badge-pill-gold {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(212, 175, 55, 0.12);
            border: 1px solid rgba(212, 175, 55, 0.3);
            color: #b89628;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 50px;
            margin-bottom: 14px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #334155;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 0.95rem;
            transition: color 0.3s;
        }

        .input-wrap input {
            width: 100%;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 16px 14px 44px;
            color: #0f172a;
            font-size: 0.95rem;
            font-family: inherit;
            font-weight: 500;
            outline: none;
            transition: all 0.3s;
        }

        .input-wrap input::placeholder { color: #cbd5e1; }

        .input-wrap input:focus {
            border-color: #d4af37;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.15);
        }

        .input-wrap input:focus ~ .input-icon,
        .input-wrap:focus-within .input-icon {
            color: #b89628;
        }

        .toggle-pw {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .toggle-pw:hover { color: #b89628; }

        /* Error alert */
        .alert-error {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 12px;
            padding: 12px 16px;
            color: #dc2626;
            font-size: 0.85rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
        }

        /* Submit Button with Warm Gold Gradient */
        .btn-submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #d4af37 0%, #b89628 100%);
            border: none;
            border-radius: 12px;
            color: #000000;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            margin-top: 6px;
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.35);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(212, 175, 55, 0.5);
            background: linear-gradient(135deg, #e5c158 0%, #d4af37 100%);
        }

        .btn-submit:active { transform: translateY(0); }

        .btn-submit .btn-icon {
            margin-left: 8px;
            transition: transform 0.3s;
        }

        .btn-submit:hover .btn-icon { transform: translateX(4px); }

        /* Back Link Footer */
        .login-card-footer {
            margin-top: 26px;
            text-align: center;
            border-top: 1px solid #f1f5f9;
            padding-top: 20px;
        }

        .login-card-footer a {
            color: #64748b;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .login-card-footer a:hover { color: #b89628; }

        .copyright-text {
            text-align: center;
            margin-top: 24px;
            color: #94a3b8;
            font-size: 0.78rem;
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <!-- White Card with Gold Accents -->
        <div class="login-card">
            <div class="card-gold-bar"></div>

            <div class="login-brand">
                <div class="badge-pill-gold">
                    <i class="fas fa-shield-alt"></i> Portal Admin CMS
                </div>
                <div style="margin: 0 auto 20px;">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Proats Music Center Logo" style="height: 96px; max-width: 100%; object-fit: contain; filter: drop-shadow(0 6px 16px rgba(212,175,55,0.3));">
                </div>
                <h2>PROATS <span>CMS</span></h2>
                <p>Silakan masuk untuk mengelola konten website</p>
            </div>

            @if(session('error'))
                <div class="alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="/cms-admin/login">
                @csrf

                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-wrap">
                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Masukkan username admin"
                            required
                            autocomplete="username"
                            value="{{ old('username') }}">
                        <i class="fas fa-user input-icon"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required>
                        <i class="fas fa-lock input-icon"></i>
                        <button type="button" class="toggle-pw" id="togglePw" aria-label="Toggle password visibility">
                            <i class="fas fa-eye-slash" id="pwIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit" id="loginBtn">
                    Masuk ke Dashboard <i class="fas fa-arrow-right btn-icon"></i>
                </button>
            </form>

            <div class="login-card-footer">
                <a href="/"><i class="fas fa-arrow-left"></i> Kembali ke Website Utama</a>
            </div>
        </div>

        <div class="copyright-text">
            &copy; {{ date('Y') }} CV. Proats Indonesia &bull; All Rights Reserved
        </div>
    </div>

<script>
    // Toggle Password Visibility
    const togglePw = document.getElementById('togglePw');
    const pwInput  = document.getElementById('password');
    const pwIcon   = document.getElementById('pwIcon');

    togglePw.addEventListener('click', () => {
        const isHidden = pwInput.type === 'password';
        pwInput.type = isHidden ? 'text' : 'password';
        pwIcon.className = isHidden ? 'fas fa-eye' : 'fas fa-eye-slash';
    });

    // Loading State
    document.querySelector('form').addEventListener('submit', function() {
        const btn = document.getElementById('loginBtn');
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memverifikasi...';
        btn.disabled = true;
    });
</script>
</body>
</html>
