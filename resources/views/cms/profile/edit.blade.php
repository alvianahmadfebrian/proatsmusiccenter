@extends('cms.layouts.app')

@section('content')

{{-- Page Header --}}
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Profil Perusahaan</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-building me-2" style="color:#8b5cf6; font-size:1.2rem;"></i> Profil Perusahaan
        </h1>
        <p class="mb-0 mt-1" style="color:#64748b; font-size:0.875rem;">Kelola informasi profil CV. Proats Indonesia</p>
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
            Edit Profil Perusahaan
        </h5>
    </div>
    <div class="cms-card-body">
        <form action="/cms-admin/profile" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-md-4">
                    <label class="cms-label">Label Tag / Kategori</label>
                    <input type="text" name="tag" class="cms-input" value="{{ old('tag', $profile->tag) }}" placeholder="Profil Perusahaan">
                    <p class="cms-form-hint">Teks kecil di atas judul section</p>
                </div>
                <div class="col-md-8">
                    <label class="cms-label">Judul Section <span style="color:#ef4444;">*</span></label>
                    <input type="text" name="title" class="cms-input" value="{{ old('title', $profile->title) }}" placeholder="Profil Singkat CV. Proats Indonesia" required>
                </div>
                <div class="col-12">
                    <label class="cms-label">Deskripsi Profil <span style="color:#ef4444;">*</span></label>
                    <textarea name="description" class="cms-input" rows="7" placeholder="Tulis deskripsi perusahaan...">{{ old('description', $profile->description) }}</textarea>
                    <p class="cms-form-hint">Gunakan enter/baris baru untuk membuat paragraf terpisah.</p>
                </div>

                <div class="col-12">
                    <div class="p-3" style="background:#f8faff;border:1px solid #e9eef5;border-radius:10px;">
                        <p class="fw-bold mb-3" style="font-size:0.82rem;color:#64748b;text-transform:uppercase;letter-spacing:0.5px;">
                            <i class="fas fa-certificate me-2" style="color:#8b5cf6;"></i> Legalitas Perusahaan
                        </p>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="cms-label">Nomor NIB</label>
                                <input type="text" name="legal_nib" class="cms-input" value="{{ old('legal_nib', $profile->legal_nib) }}" placeholder="0311210016087">
                            </div>
                            <div class="col-md-4">
                                <label class="cms-label">Status Kemenkumham</label>
                                <input type="text" name="legal_kemenkumham" class="cms-input" value="{{ old('legal_kemenkumham', $profile->legal_kemenkumham) }}" placeholder="Kemenkumham RI Approved">
                            </div>
                            <div class="col-md-4">
                                <label class="cms-label">Status BKPM</label>
                                <input type="text" name="legal_bkpm" class="cms-input" value="{{ old('legal_bkpm', $profile->legal_bkpm) }}" placeholder="Standar BKPM">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <label class="cms-label">Foto Gedung / Kantor Representative</label>
                    @if($profile->image)
                        <div class="mb-3 d-flex align-items-center gap-3">
                            <img src="{{ asset('storage/' . $profile->image) }}" alt="Foto Profil" style="height:90px;width:160px;object-fit:cover;border-radius:10px;border:1px solid #e2e8f0;">
                            <div>
                                <p class="mb-1" style="font-size:0.8rem;font-weight:600;color:#1e293b;">Foto Saat Ini</p>
                                <p class="mb-0" style="font-size:0.75rem;color:#94a3b8;">Upload foto baru untuk mengganti gambar di atas.</p>
                            </div>
                        </div>
                    @endif
                    <input type="file" name="image" class="cms-input" accept="image/*" style="padding:8px 14px;">
                    <p class="cms-form-hint">Format: JPG, PNG, WEBP. Maks. 2MB.</p>
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
