@extends('cms.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Slider Foto Utama</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-sliders-h me-2" style="color:#eab308; font-size:1.2rem;"></i> Slider Foto Utama
        </h1>
        <p class="mb-0 mt-1" style="color:#64748b; font-size:0.875rem;">Kelola foto-foto instrumen yang tampil pada Auto-Slider di bagian atas website</p>
    </div>
    <a href="/cms-admin/hero-sliders/create" class="btn-cms-primary"><i class="fas fa-plus"></i> Tambah Foto Slider</a>
</div>

<div class="cms-card">
    <div class="cms-card-header">
        <h5>
            <span class="card-icon" style="background:rgba(234,179,8,0.1);"><i class="fas fa-images" style="color:#eab308;"></i></span>
            Daftar Slide Foto ({{ $sliders->count() }} foto)
        </h5>
    </div>

    @if($sliders->isEmpty())
        <div class="text-center py-5">
            <div style="width:60px;height:60px;background:rgba(234,179,8,0.1);border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                <i class="fas fa-sliders-h" style="color:#eab308;font-size:1.5rem;"></i>
            </div>
            <p class="fw-bold mb-1" style="color:#1e293b;">Belum Ada Foto Slider</p>
            <p class="mb-3" style="color:#94a3b8;font-size:0.875rem;">Tambahkan foto slider utama untuk ditampilkan di bagian depan</p>
            <a href="/cms-admin/hero-sliders/create" class="btn-cms-primary"><i class="fas fa-plus"></i> Tambah Sekarang</a>
        </div>
    @else
        <div style="padding:20px 22px;">
            <div class="row g-3">
                @foreach($sliders as $s)
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div style="background:#f8faff;border:1px solid #e9eef5;border-radius:12px;overflow:hidden;transition:all 0.2s;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0,0,0,0.1)';this.style.transform='translateY(-2px)';" onmouseout="this.style.boxShadow='none';this.style.transform='none';">
                        @php
                            $imgSrc = Str::startsWith($s->image, 'assets/') ? asset($s->image) : (Str::startsWith($s->image, 'storage/') ? asset($s->image) : asset('storage/' . $s->image));
                        @endphp
                        <div style="width:100%;height:160px;background:#18181b;display:flex;align-items:center;justify-content:center;padding:10px;">
                            <img src="{{ $imgSrc }}" alt="{{ $s->title }}" style="max-width:100%;max-height:100%;object-fit:contain;display:block;">
                        </div>
                        <div style="padding:12px 14px;">
                            <div style="display:flex;align-items:center;gap:6px;margin-bottom:4px;">
                                <i class="{{ $s->icon }}" style="color:#eab308;font-size:0.85rem;"></i>
                                <span style="font-size:0.82rem;font-weight:600;color:#1e293b;">{{ $s->title ?? 'Tanpa Judul' }}</span>
                            </div>
                            <p style="font-size:0.75rem;color:#64748b;margin:0 0 4px;">{{ $s->subtitle }}</p>
                            <p style="font-size:0.72rem;color:#94a3b8;margin:0 0 12px;">Urutan: {{ $s->order }}</p>
                            <div class="d-flex gap-1">
                                <a href="/cms-admin/hero-sliders/{{ $s->id }}/edit" class="btn-cms-outline" style="padding:5px 10px;font-size:0.72rem;flex:1;justify-content:center;text-align:center;">
                                    <i class="fas fa-pen"></i> Edit
                                </a>
                                <form action="/cms-admin/hero-sliders/{{ $s->id }}" method="POST" onsubmit="return confirm('Hapus foto slider ini?')" style="flex:1;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-cms-danger" style="width:100%;padding:5px 10px;font-size:0.72rem;border:none;cursor:pointer;justify-content:center;text-align:center;display:flex;align-items:center;gap:4px;">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

@endsection
