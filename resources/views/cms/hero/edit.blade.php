@extends('cms.layouts.app')

@section('content')

{{-- Page Header --}}
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Hero Section</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-laptop-code me-2" style="color:#6366f1; font-size:1.2rem;"></i> Hero Section
        </h1>
        <p class="mb-0 mt-1" style="color:#64748b; font-size:0.875rem;">Kelola bagian utama (hero) halaman depan website</p>
    </div>
    <a href="/" target="_blank" class="btn-cms-outline">
        <i class="fas fa-eye"></i> Pratinjau
    </a>
</div>

{{-- Form Card --}}
<div class="cms-card">
    <div class="cms-card-header">
        <h5>
            <span class="card-icon"><i class="fas fa-pen"></i></span>
            Edit Konten Hero
        </h5>
    </div>
    <div class="cms-card-body">
        <form action="/cms-admin/hero" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="cms-label">Subtitle <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="subtitle" class="cms-input" value="{{ old('subtitle', $hero->subtitle) }}" placeholder="Contoh: CV. PRO ATS INDONESIA" required>
                        <p class="cms-form-hint">Teks kecil di atas judul utama</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="cms-label">Tagline <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="tagline" class="cms-input" value="{{ old('tagline', $hero->tagline) }}" placeholder="Contoh: Produsen & Distributor Alat Musik" required>
                        <p class="cms-form-hint">Sub-tagline di bawah subtitle</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label class="cms-label">Judul Utama <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="title" class="cms-input" value="{{ old('title', $hero->title) }}" placeholder="Contoh: Suara Presisi, Kualitas Abadi" required>
                        <p class="cms-form-hint">Judul besar di hero. Gunakan <code>&lt;br&gt;</code> untuk baris baru.</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label class="cms-label">Deskripsi</label>
                        <textarea name="description" class="cms-input" rows="4" placeholder="Deskripsi singkat perusahaan...">{{ old('description', $hero->description) }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="cms-label">Label Tombol 1</label>
                        <input type="text" name="button1" class="cms-input" value="{{ old('button1', $hero->button1) }}" placeholder="Jelajahi Produk">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="cms-label">Label Tombol 2</label>
                        <input type="text" name="button2" class="cms-input" value="{{ old('button2', $hero->button2) }}" placeholder="Tentang Kami">
                    </div>
                </div>
                <div class="col-md-4"></div>

                <div class="col-12">
                    <div class="p-3 mb-2" style="background:#f8faff;border:1px solid #e9eef5;border-radius:10px;">
                        <p class="fw-bold mb-3" style="font-size:0.82rem;color:#64748b;text-transform:uppercase;letter-spacing:0.5px;">
                            <i class="fas fa-chart-bar me-2" style="color:#6366f1;"></i> Statistik Angka
                        </p>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="cms-label">Stat 1</label>
                                <input type="text" name="stat1" class="cms-input" value="{{ old('stat1', $hero->stat1) }}" placeholder="50+ Tahun">
                            </div>
                            <div class="col-md-4">
                                <label class="cms-label">Stat 2</label>
                                <input type="text" name="stat2" class="cms-input" value="{{ old('stat2', $hero->stat2) }}" placeholder="10k+ Produk">
                            </div>
                            <div class="col-md-4">
                                <label class="cms-label">Stat 3</label>
                                <input type="text" name="stat3" class="cms-input" value="{{ old('stat3', $hero->stat3) }}" placeholder="100% Indonesia">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4 pt-3" style="border-top:1px solid #f1f5f9;">
                <button type="submit" class="btn-cms-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="/cms-admin/dashboard" class="btn-cms-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
