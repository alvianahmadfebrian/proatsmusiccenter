@extends('cms.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <a href="/cms-admin/documentations" style="color:#94a3b8; text-decoration:none;">Galeri Dokumentasi</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Edit</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-pen me-2" style="color:#14b8a6;"></i> Edit Foto
        </h1>
    </div>
    <a href="/cms-admin/documentations" class="btn-cms-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<div class="cms-card">
    <div class="cms-card-header">
        <h5><span class="card-icon" style="background:rgba(20,184,166,0.1);"><i class="fas fa-image" style="color:#14b8a6;"></i></span> Edit Foto Dokumentasi</h5>
    </div>
    <div class="cms-card-body">
        <form action="/cms-admin/documentations/{{ $documentation->id }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-4">
                <div class="col-md-8">
                    <label class="cms-label">Keterangan / Caption</label>
                    <input type="text" name="caption" class="cms-input" value="{{ old('caption', $documentation->caption) }}" placeholder="Keterangan foto...">
                </div>
                <div class="col-md-4">
                    <label class="cms-label">Urutan Tampil</label>
                    <input type="number" name="order" class="cms-input" value="{{ old('order', $documentation->order) }}">
                </div>
                <div class="col-12">
                    <label class="cms-label">Foto</label>
                    @if($documentation->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $documentation->image) }}" alt="Foto saat ini" style="max-height:200px;border-radius:10px;border:1px solid #e2e8f0;max-width:100%;">
                            <p class="mt-2 mb-0" style="font-size:0.78rem;color:#94a3b8;">Foto saat ini. Upload foto baru untuk mengganti.</p>
                        </div>
                    @endif
                    <input type="file" name="image" class="cms-input" accept="image/*" style="padding:8px 14px;">
                    <p class="cms-form-hint">Biarkan kosong jika tidak ingin mengganti foto. Maks. 2MB.</p>
                </div>
            </div>
            <div class="d-flex gap-2 mt-4 pt-3" style="border-top:1px solid #f1f5f9;">
                <button type="submit" class="btn-cms-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                <a href="/cms-admin/documentations" class="btn-cms-secondary"><i class="fas fa-times"></i> Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
