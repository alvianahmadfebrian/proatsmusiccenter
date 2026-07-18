@extends('cms.layouts.app')

@section('content')

{{-- Page Header --}}
<div class="d-flex align-items-start justify-content-between mb-4">
    <div>
        <h1 class="fw-bold mb-1" style="font-size:1.6rem; color:#0f172a;">Dashboard</h1>
        <p class="mb-0" style="color:#64748b; font-size:0.9rem;">Selamat datang kembali, <strong>{{ session('admin_username') }}</strong> 👋</p>
    </div>
    <div>
        <span style="background:#f1f5f9; border:1px solid #e2e8f0; border-radius:8px; padding:7px 14px; font-size:0.8rem; font-weight:600; color:#64748b;">
            <i class="far fa-calendar me-1"></i> {{ date('d F Y') }}
        </span>
    </div>
</div>

{{-- Info Banner --}}
<div class="mb-4 p-3 d-flex align-items-center gap-3"
     style="background:rgba(99,102,241,0.06); border:1px solid rgba(99,102,241,0.18); border-left: 4px solid #6366f1; border-radius:12px;">
    <div style="width:36px;height:36px;border-radius:9px;background:rgba(99,102,241,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <i class="fas fa-info-circle" style="color:#6366f1;"></i>
    </div>
    <p class="mb-0" style="font-size:0.875rem; color:#4338ca;">
        Gunakan menu di sidebar untuk mengelola seluruh konten website <strong>CV. Proats Indonesia</strong>. Setiap perubahan akan langsung tampil di halaman utama.
    </p>
</div>

{{-- Stats Cards --}}
<div class="row g-3 mb-4">
    @php
    $statCards = [
        ['icon'=>'fas fa-drum',        'label'=>'Katalog Produk',     'value'=>$stats['products'],       'color'=>'#6366f1', 'bg'=>'rgba(99,102,241,0.1)',  'link'=>'/cms-admin/products'],
        ['icon'=>'fas fa-tools',        'label'=>'Layanan Kami',       'value'=>$stats['services'],       'color'=>'#10b981', 'bg'=>'rgba(16,185,129,0.1)',   'link'=>'/cms-admin/services'],
        ['icon'=>'fas fa-history',      'label'=>'Sejarah Timeline',   'value'=>$stats['timelines'],      'color'=>'#f59e0b', 'bg'=>'rgba(245,158,11,0.1)',   'link'=>'/cms-admin/timeline'],
        ['icon'=>'fas fa-images',       'label'=>'Galeri Dokumentasi', 'value'=>$stats['documentations'], 'color'=>'#0ea5e9', 'bg'=>'rgba(14,165,233,0.1)',   'link'=>'/cms-admin/documentations'],
    ];
    @endphp

    @foreach($statCards as $s)
    <div class="col-sm-6 col-xl-3">
        <div style="background:#fff; border:1px solid #e9eef5; border-radius:14px; padding:22px 22px 16px; box-shadow:0 2px 12px rgba(0,0,0,0.04);">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div style="width:44px;height:44px;border-radius:12px;background:{{ $s['bg'] }};display:flex;align-items:center;justify-content:center;">
                    <i class="{{ $s['icon'] }}" style="color:{{ $s['color'] }};font-size:1.1rem;"></i>
                </div>
                <span style="font-size:2rem;font-weight:800;color:#0f172a;">{{ $s['value'] }}</span>
            </div>
            <p class="mb-2" style="font-size:0.8rem;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.5px;">{{ $s['label'] }}</p>
            <a href="{{ $s['link'] }}" style="font-size:0.8rem;font-weight:600;color:{{ $s['color'] }};text-decoration:none;">
                Kelola <i class="fas fa-arrow-right ms-1" style="font-size:0.7rem;"></i>
            </a>
        </div>
    </div>
    @endforeach
</div>

{{-- Quick Access Grid --}}
<div class="row g-3">
    <div class="col-lg-8">
        <div style="background:#fff; border:1px solid #e9eef5; border-radius:14px; box-shadow:0 2px 12px rgba(0,0,0,0.04); overflow:hidden;">
            <div style="padding:18px 22px; border-bottom:1px solid #f1f5f9; display:flex; align-items:center; gap:10px;">
                <div style="width:30px;height:30px;border-radius:8px;background:rgba(99,102,241,0.1);display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-th-large" style="color:#6366f1;font-size:0.8rem;"></i>
                </div>
                <h5 class="mb-0 fw-bold" style="font-size:0.95rem;">Akses Cepat Pengelolaan Konten</h5>
            </div>
            <div style="padding:20px 22px;">
                <div class="row g-2">
                    @php
                    $menus = [
                        ['icon'=>'fas fa-laptop-code', 'title'=>'Hero Section',       'desc'=>'Tagline, slogan & gambar utama', 'link'=>'/cms-admin/hero',           'color'=>'#6366f1'],
                        ['icon'=>'fas fa-building',     'title'=>'Profil Perusahaan',  'desc'=>'Deskripsi, NIB & sertifikasi',  'link'=>'/cms-admin/profile',         'color'=>'#8b5cf6'],
                        ['icon'=>'fas fa-history',      'title'=>'Timeline Sejarah',   'desc'=>'Perjalanan dari 1970 hingga kini','link'=>'/cms-admin/timeline',       'color'=>'#f59e0b'],
                        ['icon'=>'fas fa-concierge-bell','title'=>'Layanan Kami',      'desc'=>'Reparasi, tukar tambah & more',  'link'=>'/cms-admin/services',        'color'=>'#10b981'],
                        ['icon'=>'fas fa-drum',         'title'=>'Katalog Produk',     'desc'=>'Instrumen marching, brass, studio','link'=>'/cms-admin/products',      'color'=>'#0ea5e9'],
                        ['icon'=>'fas fa-graduation-cap','title'=>'Program & Edukasi', 'desc'=>'Pelatihan & music organizer',   'link'=>'/cms-admin/programs',        'color'=>'#ec4899'],
                        ['icon'=>'fas fa-images',       'title'=>'Galeri Dokumentasi', 'desc'=>'Foto kegiatan & event',         'link'=>'/cms-admin/documentations',  'color'=>'#14b8a6'],
                        ['icon'=>'fas fa-address-book', 'title'=>'Hubungi Kami',       'desc'=>'WhatsApp, email & maps',        'link'=>'/cms-admin/contacts',        'color'=>'#f97316'],
                    ];
                    @endphp
                    @foreach($menus as $m)
                    <div class="col-sm-6">
                        <a href="{{ $m['link'] }}" style="display:flex;align-items:center;gap:12px;padding:12px 14px;border-radius:10px;text-decoration:none;background:#fafbff;border:1px solid #f1f5f9;transition:all 0.2s;"
                           onmouseover="this.style.borderColor='{{ $m['color'] }}30';this.style.background='{{ $m['color'] }}08';"
                           onmouseout="this.style.borderColor='#f1f5f9';this.style.background='#fafbff';">
                            <div style="width:36px;height:36px;border-radius:9px;background:{{ $m['color'] }}18;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="{{ $m['icon'] }}" style="color:{{ $m['color'] }};font-size:0.9rem;"></i>
                            </div>
                            <div>
                                <div style="font-size:0.82rem;font-weight:700;color:#1e293b;">{{ $m['title'] }}</div>
                                <div style="font-size:0.72rem;color:#94a3b8;">{{ $m['desc'] }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div style="background:#fff; border:1px solid #e9eef5; border-radius:14px; box-shadow:0 2px 12px rgba(0,0,0,0.04); overflow:hidden; height:100%;">
            <div style="padding:18px 22px; border-bottom:1px solid #f1f5f9; display:flex; align-items:center; gap:10px;">
                <div style="width:30px;height:30px;border-radius:8px;background:rgba(16,185,129,0.1);display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-bolt" style="color:#10b981;font-size:0.8rem;"></i>
                </div>
                <h5 class="mb-0 fw-bold" style="font-size:0.95rem;">Status Sistem</h5>
            </div>
            <div style="padding:20px 22px;">
                @php
                $statusItems = [
                    ['label'=>'Hero Section',      'ok'=>true],
                    ['label'=>'Profil Perusahaan', 'ok'=>true],
                    ['label'=>'Katalog Produk',    'ok'=>$stats['products'] > 0],
                    ['label'=>'Layanan Kami',      'ok'=>$stats['services'] > 0],
                    ['label'=>'Timeline Sejarah',  'ok'=>$stats['timelines'] > 0],
                    ['label'=>'Galeri Dokumentasi','ok'=>$stats['documentations'] > 0],
                    ['label'=>'Info Kontak',       'ok'=>true],
                ];
                @endphp
                @foreach($statusItems as $item)
                <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom:1px solid #f8fafc;">
                    <span style="font-size:0.83rem;color:#475569;font-weight:500;">{{ $item['label'] }}</span>
                    @if($item['ok'])
                        <span style="background:rgba(16,185,129,0.1);color:#059669;font-size:0.7rem;font-weight:700;padding:3px 10px;border-radius:99px;">● Aktif</span>
                    @else
                        <span style="background:rgba(245,158,11,0.1);color:#d97706;font-size:0.7rem;font-weight:700;padding:3px 10px;border-radius:99px;">● Kosong</span>
                    @endif
                </div>
                @endforeach

                <a href="/" target="_blank"
                   style="display:flex;align-items:center;justify-content:center;gap:8px;margin-top:16px;padding:10px;border-radius:10px;background:rgba(99,102,241,0.08);border:1px solid rgba(99,102,241,0.15);text-decoration:none;color:#6366f1;font-size:0.82rem;font-weight:700;transition:all 0.2s;"
                   onmouseover="this.style.background='rgba(99,102,241,0.14)';"
                   onmouseout="this.style.background='rgba(99,102,241,0.08)';">
                    <i class="fas fa-eye"></i> Pratinjau Website
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
