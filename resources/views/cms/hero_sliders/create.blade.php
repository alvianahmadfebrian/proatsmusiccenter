@extends('cms.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <a href="/cms-admin/hero-sliders" style="color:#94a3b8; text-decoration:none;">Slider Foto Utama</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Tambah Slide</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-plus-circle me-2" style="color:#eab308; font-size:1.2rem;"></i> Tambah Foto Slider
        </h1>
    </div>
    <a href="/cms-admin/hero-sliders" class="btn-cms-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<div class="cms-card" style="max-width:700px;">
    <div class="cms-card-header">
        <h5>Formulir Upload Slide Foto</h5>
    </div>
    <div style="padding:24px;">
        <form action="/cms-admin/hero-sliders" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="cms-label">Judul Slide (Label Card)</label>
                <input type="text" name="title" class="cms-input" value="{{ old('title') }}" placeholder="Contoh: Kualitas Ekspor / Marching Snare">
            </div>

            <div class="mb-3">
                <label class="cms-label">Sub-Judul / Keterangan Singkat</label>
                <input type="text" name="subtitle" class="cms-input" value="{{ old('subtitle') }}" placeholder="Contoh: Marching Band & HTS">
            </div>

            <div class="mb-3">
                <label class="cms-label">Ikon FontAwesome</label>
                <input type="text" name="icon" class="cms-input" value="{{ old('icon', 'fas fa-award') }}" placeholder="fas fa-award, fas fa-drum, fas fa-wind">
                <small style="color:#94a3b8; font-size:0.75rem;">Gunakan kelas FontAwesome (contoh: fas fa-award, fas fa-drum, fas fa-guitar)</small>
            </div>

            <div class="mb-3">
                <label class="cms-label">Urutan Tampil</label>
                <input type="number" name="order" class="cms-input" value="{{ old('order', 1) }}" placeholder="1">
            </div>

            <div class="mb-4">
                <label class="cms-label">Upload Foto Instrumen <span style="color:#ef4444;">*</span></label>
                <input type="file" name="image" class="cms-input" accept="image/*" required>
                <small style="color:#94a3b8; font-size:0.75rem; display:block; margin-top:4px;">Format: PNG, JPG, WEBP. Disarankan menggunakan gambar background transparan / terang berkualitas tinggi.</small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn-cms-primary"><i class="fas fa-save"></i> Simpan Foto Slider</button>
                <a href="/cms-admin/hero-sliders" class="btn-cms-secondary"><i class="fas fa-times"></i> Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
