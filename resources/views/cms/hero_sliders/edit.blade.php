@extends('cms.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <a href="/cms-admin/hero-sliders" style="color:#94a3b8; text-decoration:none;">Slider Foto Utama</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Edit Slide</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-edit me-2" style="color:#eab308; font-size:1.2rem;"></i> Edit Slide Foto
        </h1>
    </div>
    <a href="/cms-admin/hero-sliders" class="btn-cms-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<div class="cms-card" style="max-width:700px;">
    <div class="cms-card-header">
        <h5>Edit Data & Foto Slide</h5>
    </div>
    <div style="padding:24px;">
        <form action="/cms-admin/hero-sliders/{{ $slider->id }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="cms-label">Judul Slide (Label Card)</label>
                <input type="text" name="title" class="cms-input" value="{{ old('title', $slider->title) }}" placeholder="Contoh: Kualitas Ekspor">
            </div>

            <div class="mb-3">
                <label class="cms-label">Sub-Judul / Keterangan Singkat</label>
                <input type="text" name="subtitle" class="cms-input" value="{{ old('subtitle', $slider->subtitle) }}" placeholder="Contoh: Marching Band & HTS">
            </div>

            <div class="mb-3">
                <label class="cms-label">Ikon FontAwesome</label>
                <input type="text" name="icon" class="cms-input" value="{{ old('icon', $slider->icon) }}" placeholder="fas fa-award">
            </div>

            <div class="mb-3">
                <label class="cms-label">Urutan Tampil</label>
                <input type="number" name="order" class="cms-input" value="{{ old('order', $slider->order) }}">
            </div>

            <div class="mb-3">
                <label class="cms-label">Foto Saat Ini</label>
                <div>
                    @php
                        $imgSrc = Str::startsWith($slider->image, 'assets/') ? asset($slider->image) : (Str::startsWith($slider->image, 'storage/') ? asset($slider->image) : asset('storage/' . $slider->image));
                    @endphp
                    <div style="background:#18181b;padding:12px;border-radius:12px;display:inline-block;">
                        <img src="{{ $imgSrc }}" alt="Foto saat ini" style="max-height:180px;object-fit:contain;display:block;">
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="cms-label">Ganti Foto (Opsional)</label>
                <input type="file" name="image" class="cms-input" accept="image/*">
                <small style="color:#94a3b8; font-size:0.75rem; display:block; margin-top:4px;">Kosongkan jika tidak ingin mengubah foto.</small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn-cms-primary"><i class="fas fa-save"></i> Perbarui Slide</button>
                <a href="/cms-admin/hero-sliders" class="btn-cms-secondary"><i class="fas fa-times"></i> Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
