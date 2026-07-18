@extends('cms.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <a href="/cms-admin/timeline" style="color:#94a3b8; text-decoration:none;">Sejarah / Timeline</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Tambah Baru</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-plus-circle me-2" style="color:#f59e0b; font-size:1.2rem;"></i> Tambah Timeline
        </h1>
    </div>
    <a href="/cms-admin/timeline" class="btn-cms-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="cms-card">
    <div class="cms-card-header">
        <h5>
            <span class="card-icon" style="background:rgba(245,158,11,0.1);">
                <i class="fas fa-pen" style="color:#f59e0b;"></i>
            </span>
            Form Tambah Sejarah
        </h5>
    </div>
    <div class="cms-card-body">
        <form action="/cms-admin/timeline" method="POST">
            @csrf
            <div class="row g-4">
                <div class="col-md-4">
                    <label class="cms-label">Tahun <span style="color:#ef4444;">*</span></label>
                    <input type="text" name="year" class="cms-input" value="{{ old('year') }}" placeholder="1970" required>
                </div>
                <div class="col-md-4">
                    <label class="cms-label">Urutan Tampil</label>
                    <input type="number" name="order" class="cms-input" value="{{ old('order', 0) }}" placeholder="0">
                    <p class="cms-form-hint">Angka kecil ditampilkan lebih awal.</p>
                </div>
                <div class="col-12">
                    <label class="cms-label">Judul <span style="color:#ef4444;">*</span></label>
                    <input type="text" name="title" class="cms-input" value="{{ old('title') }}" placeholder="Perusahaan Berdiri" required>
                </div>
                <div class="col-12">
                    <label class="cms-label">Deskripsi</label>
                    <textarea name="description" class="cms-input" rows="4" placeholder="Ceritakan peristiwa pada tahun tersebut...">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="d-flex gap-2 mt-4 pt-3" style="border-top:1px solid #f1f5f9;">
                <button type="submit" class="btn-cms-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="/cms-admin/timeline" class="btn-cms-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
