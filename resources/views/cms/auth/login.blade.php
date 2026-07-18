<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Login — CV. Proats Indonesia</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0a0e1a;
            min-height: 100vh;
            display: flex;
            overflow: hidden;
        }

        /* ───── LEFT PANEL ───── */
        .left-panel {
            width: 55%;
            position: relative;
            background: linear-gradient(135deg, #0d1b3e 0%, #1a1040 50%, #0d1b3e 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 70px;
            overflow: hidden;
        }

        /* Animated grid lines */
        .left-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(99,102,241,0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99,102,241,0.06) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            0%   { background-position: 0 0; }
            100% { background-position: 50px 50px; }
        }

        /* Glowing orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }
        .orb-1 { width: 400px; height: 400px; background: rgba(99,102,241,0.25); top: -120px; left: -100px; animation: float1 8s ease-in-out infinite; }
        .orb-2 { width: 350px; height: 350px; background: rgba(168,85,247,0.18); bottom: -80px; right: -60px; animation: float2 10s ease-in-out infinite; }
        .orb-3 { width: 200px; height: 200px; background: rgba(59,130,246,0.2); bottom: 30%; left: 10%; animation: float3 12s ease-in-out infinite; }

        @keyframes float1 { 0%,100%{transform:translate(0,0);} 50%{transform:translate(30px,20px);} }
        @keyframes float2 { 0%,100%{transform:translate(0,0);} 50%{transform:translate(-25px,-15px);} }
        @keyframes float3 { 0%,100%{transform:translate(0,0);} 50%{transform:translate(15px,25px);} }

        /* Floating music notes */
        .notes-container {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }
        .note {
            position: absolute;
            color: rgba(139,92,246,0.3);
            animation: noteFloat linear infinite;
        }

        @keyframes noteFloat {
            0%   { transform: translateY(110%) rotate(0deg); opacity: 0; }
            10%  { opacity: 1; }
            90%  { opacity: 0.6; }
            100% { transform: translateY(-10%) rotate(360deg); opacity: 0; }
        }

        /* Left panel content */
        .left-content {
            position: relative;
            z-index: 10;
            text-align: center;
        }

        .brand-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 28px;
            box-shadow: 0 20px 60px rgba(99,102,241,0.4), 0 0 0 1px rgba(255,255,255,0.1);
        }

        .brand-logo i {
            font-size: 2.2rem;
            color: #fff;
        }

        .brand-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.5px;
            line-height: 1.1;
            margin-bottom: 10px;
        }

        .brand-title span {
            background: linear-gradient(90deg, #818cf8, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-subtitle {
            color: rgba(255,255,255,0.5);
            font-size: 0.95rem;
            font-weight: 400;
            margin-bottom: 50px;
            letter-spacing: 0.5px;
        }

        /* Feature pills */
        .features {
            display: flex;
            flex-direction: column;
            gap: 14px;
            text-align: left;
            max-width: 380px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 14px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            padding: 14px 18px;
            backdrop-filter: blur(10px);
            transition: all 0.3s;
        }

        .feature-item:hover {
            background: rgba(99,102,241,0.12);
            border-color: rgba(99,102,241,0.3);
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(99,102,241,0.3), rgba(168,85,247,0.3));
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #a78bfa;
            font-size: 1rem;
        }

        .feature-text h5 {
            color: #f1f5f9;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .feature-text p {
            color: rgba(255,255,255,0.4);
            font-size: 0.78rem;
        }

        /* Copyright at bottom */
        .left-footer {
            position: absolute;
            bottom: 30px;
            left: 0; right: 0;
            text-align: center;
            color: rgba(255,255,255,0.2);
            font-size: 0.78rem;
            z-index: 10;
        }

        /* ───── RIGHT PANEL ───── */
        .right-panel {
            width: 45%;
            background: #0f1629;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 60px;
            position: relative;
        }

        .right-panel::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(to bottom, transparent, rgba(99,102,241,0.4), transparent);
        }

        .login-box {
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            margin-bottom: 36px;
        }

        .login-header .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(99,102,241,0.12);
            border: 1px solid rgba(99,102,241,0.3);
            color: #818cf8;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 5px 14px;
            border-radius: 100px;
            margin-bottom: 16px;
            letter-spacing: 0.5px;
        }

        .login-header h2 {
            color: #f8fafc;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .login-header p {
            color: #64748b;
            font-size: 0.9rem;
        }

        /* Input groups */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            color: #94a3b8;
            font-size: 0.82rem;
            font-weight: 600;
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
            color: #475569;
            font-size: 0.95rem;
            transition: color 0.3s;
        }

        .input-wrap input {
            width: 100%;
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid #1e293b;
            border-radius: 12px;
            padding: 14px 16px 14px 44px;
            color: #f1f5f9;
            font-size: 0.95rem;
            font-family: inherit;
            outline: none;
            transition: all 0.3s;
        }

        .input-wrap input::placeholder { color: #334155; }

        .input-wrap input:focus {
            border-color: #6366f1;
            background: rgba(99,102,241,0.05);
            box-shadow: 0 0 0 4px rgba(99,102,241,0.12);
        }

        .input-wrap input:focus ~ .input-icon,
        .input-wrap:focus-within .input-icon {
            color: #818cf8;
        }

        /* Toggle password visibility */
        .toggle-pw {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #475569;
            cursor: pointer;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .toggle-pw:hover { color: #818cf8; }

        /* Error alert */
        .alert-error {
            background: rgba(239,68,68,0.08);
            border: 1px solid rgba(239,68,68,0.2);
            border-radius: 12px;
            padding: 12px 16px;
            color: #fca5a5;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Submit button */
        .btn-submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            margin-top: 6px;
            box-shadow: 0 10px 30px rgba(99,102,241,0.3);
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 40px rgba(99,102,241,0.5);
        }

        .btn-submit:hover::before { opacity: 1; }

        .btn-submit:active { transform: translateY(0); }

        .btn-submit .btn-icon {
            margin-left: 8px;
            transition: transform 0.3s;
        }

        .btn-submit:hover .btn-icon { transform: translateX(4px); }

        /* Divider / back link */
        .login-footer {
            margin-top: 30px;
            text-align: center;
        }

        .login-footer a {
            color: #475569;
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .login-footer a:hover { color: #818cf8; }

        /* Responsive */
        @media (max-width: 900px) {
            .left-panel { display: none; }
            .right-panel { width: 100%; padding: 40px 30px; }
        }
    </style>
</head>
<body>

    <!-- ── LEFT PANEL ── -->
    <div class="left-panel">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>

        <!-- Floating notes -->
        <div class="notes-container" id="notesContainer"></div>

        <div class="left-content">
            <div class="brand-logo">
                <i class="fas fa-music"></i>
            </div>

            <h1 class="brand-title">PROATS <span>CMS</span></h1>
            <p class="brand-subtitle">Panel Administrasi CV. Proats Indonesia</p>

            <div class="features">
                <div class="feature-item">
                    <div class="feature-icon"><i class="fas fa-sliders-h"></i></div>
                    <div class="feature-text">
                        <h5>Manajemen Konten Lengkap</h5>
                        <p>Kelola Hero, Profil, Produk, Layanan, dan lebih banyak lagi.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fas fa-images"></i></div>
                    <div class="feature-text">
                        <h5>Upload Foto & Galeri</h5>
                        <p>Tambah & perbarui gambar produk dan dokumentasi kegiatan.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fas fa-link"></i></div>
                    <div class="feature-text">
                        <h5>Sinkronisasi Real-Time</h5>
                        <p>Perubahan langsung ditampilkan di halaman utama website.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="left-footer">
            &copy; {{ date('Y') }} CV. Proats Indonesia &mdash; All Rights Reserved
        </div>
    </div>

    <!-- ── RIGHT PANEL ── -->
    <div class="right-panel">
        <div class="login-box">
            <div class="login-header">
                <div class="badge-pill">
                    <i class="fas fa-lock"></i> PORTAL ADMIN
                </div>
                <h2>Selamat Datang</h2>
                <p>Masuk untuk mengelola konten website CV. Proats Indonesia.</p>
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

            <div class="login-footer">
                <a href="/"><i class="fas fa-arrow-left"></i> Kembali ke Website Utama</a>
            </div>
        </div>
    </div>

<script>
    // ── Toggle Password Visibility ──
    const togglePw = document.getElementById('togglePw');
    const pwInput  = document.getElementById('password');
    const pwIcon   = document.getElementById('pwIcon');

    togglePw.addEventListener('click', () => {
        const isHidden = pwInput.type === 'password';
        pwInput.type = isHidden ? 'text' : 'password';
        pwIcon.className = isHidden ? 'fas fa-eye' : 'fas fa-eye-slash';
    });

    // ── Spawn floating music notes on left panel ──
    const icons = ['fa-music', 'fa-drum', 'fa-guitar', 'fa-headphones', 'fa-compact-disc', 'fa-record-vinyl'];
    const container = document.getElementById('notesContainer');

    if (container) {
        function spawnNote() {
            const note = document.createElement('i');
            note.className = `fas ${icons[Math.floor(Math.random() * icons.length)]} note`;
            note.style.left  = Math.random() * 100 + '%';
            note.style.bottom = '-50px';
            note.style.fontSize = (Math.random() * 1.2 + 0.5) + 'rem';
            note.style.animationDuration = (Math.random() * 10 + 8) + 's';
            note.style.animationDelay = '0s';
            container.appendChild(note);
            setTimeout(() => note.remove(), 18000);
        }
        setInterval(spawnNote, 900);
        spawnNote();
    }

    // ── Add loading state to button on form submit ──
    document.querySelector('form').addEventListener('submit', function() {
        const btn = document.getElementById('loginBtn');
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memverifikasi...';
        btn.disabled = true;
    });
</script>
</body>
</html>
