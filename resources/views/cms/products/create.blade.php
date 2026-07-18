@extends('cms.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <a href="/cms-admin/products" style="color:#94a3b8; text-decoration:none;">Katalog Produk</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Tambah Baru</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-plus-circle me-2" style="color:#0ea5e9;"></i> Tambah Produk
        </h1>
    </div>
    <a href="/cms-admin/products" class="btn-cms-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<div class="cms-card">
    <div class="cms-card-header">
        <h5><span class="card-icon" style="background:rgba(14,165,233,0.1);"><i class="fas fa-pen" style="color:#0ea5e9;"></i></span> Form Tambah Produk</h5>
    </div>
    <div class="cms-card-body">
        <form action="/cms-admin/products" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="cms-label">Nama Produk <span style="color:#ef4444;">*</span></label>
                    <input type="text" name="title" class="cms-input" value="{{ old('title') }}" placeholder="Contoh: Marching Snare Drum" required>
                </div>
                <div class="col-md-3">
                    <label class="cms-label">Kategori</label>
                    <input type="text" name="category" class="cms-input" value="{{ old('category') }}" placeholder="Marching / Brass / Studio">
                </div>
                <div class="col-md-3">
                    <label class="cms-label">Urutan Tampil</label>
                    <input type="number" name="order" class="cms-input" value="{{ old('order', 0) }}">
                </div>
                <div class="col-12">
                    <label class="cms-label">Spesifikasi / Fitur (per baris)</label>
                    <textarea name="features" class="cms-input" rows="5" placeholder="Bahan rangka aluminium&#10;Ukuran 14 inch&#10;Finishing powder coat">{{ old('features') }}</textarea>
                    <p class="cms-form-hint">Satu fitur/spesifikasi per baris. Akan ditampilkan sebagai poin-poin di website.</p>
                </div>
                <div class="col-12">
                    <label class="cms-label">Foto Produk</label>
                    <input type="file" name="image" class="cms-input" accept="image/*" style="padding:8px 14px;">
                    <p class="cms-form-hint">Format: JPG, PNG, WEBP. Maks. 2MB. Rasio 4:3 disarankan.</p>
                </div>
            </div>
            <div class="d-flex gap-2 mt-4 pt-3" style="border-top:1px solid #f1f5f9;">
                <button type="submit" class="btn-cms-primary"><i class="fas fa-save"></i> Simpan</button>
                <a href="/cms-admin/products" class="btn-cms-secondary"><i class="fas fa-times"></i> Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
