@extends('cms.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Galeri Dokumentasi</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-images me-2" style="color:#14b8a6; font-size:1.2rem;"></i> Galeri Dokumentasi
        </h1>
        <p class="mb-0 mt-1" style="color:#64748b; font-size:0.875rem;">Kelola galeri foto kegiatan & event perusahaan</p>
    </div>
    <a href="/cms-admin/documentations/create" class="btn-cms-primary"><i class="fas fa-plus"></i> Tambah Foto</a>
</div>

<div class="cms-card">
    <div class="cms-card-header">
        <h5>
            <span class="card-icon" style="background:rgba(20,184,166,0.1);"><i class="fas fa-image" style="color:#14b8a6;"></i></span>
            Daftar Dokumentasi ({{ $documentations->count() }} foto)
        </h5>
    </div>

    @if($documentations->isEmpty())
        <div class="text-center py-5">
            <div style="width:60px;height:60px;background:rgba(20,184,166,0.1);border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                <i class="fas fa-images" style="color:#14b8a6;font-size:1.5rem;"></i>
            </div>
            <p class="fw-bold mb-1" style="color:#1e293b;">Belum Ada Foto Dokumentasi</p>
            <p class="mb-3" style="color:#94a3b8;font-size:0.875rem;">Tambahkan foto kegiatan dan event perusahaan</p>
            <a href="/cms-admin/documentations/create" class="btn-cms-primary"><i class="fas fa-plus"></i> Tambah Sekarang</a>
        </div>
    @else
        {{-- Grid view galeri --}}
        <div style="padding:20px 22px;">
            <div class="row g-3">
                @foreach($documentations as $d)
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div style="background:#f8faff;border:1px solid #e9eef5;border-radius:12px;overflow:hidden;transition:all 0.2s;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0,0,0,0.1)';this.style.transform='translateY(-2px)';" onmouseout="this.style.boxShadow='none';this.style.transform='none';">
                        @if($d->image)
                            <img src="{{ asset('storage/' . $d->image) }}" alt="{{ $d->caption }}" style="width:100%;height:160px;object-fit:cover;display:block;">
                        @else
                            <div style="width:100%;height:160px;background:#e9eef5;display:flex;align-items:center;justify-content:center;">
                                <i class="fas fa-image" style="color:#cbd5e1;font-size:2rem;"></i>
                            </div>
                        @endif
                        <div style="padding:12px 14px;">
                            <p style="font-size:0.82rem;font-weight:600;color:#1e293b;margin:0 0 4px;">{{ $d->caption ?? 'Tanpa Keterangan' }}</p>
                            <p style="font-size:0.72rem;color:#94a3b8;margin:0 0 12px;">Urutan: {{ $d->order }}</p>
                            <div class="d-flex gap-1">
                                <a href="/cms-admin/documentations/{{ $d->id }}/edit" class="btn-cms-outline" style="padding:5px 10px;font-size:0.72rem;flex:1;justify-content:center;text-align:center;">
                                    <i class="fas fa-pen"></i> Edit
                                </a>
                                <form action="/cms-admin/documentations/{{ $d->id }}" method="POST" onsubmit="return confirm('Hapus foto ini?')" style="flex:1;">
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
