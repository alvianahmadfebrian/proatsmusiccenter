@extends('cms.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Sejarah / Timeline</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-history me-2" style="color:#f59e0b; font-size:1.2rem;"></i> Sejarah / Timeline
        </h1>
        <p class="mb-0 mt-1" style="color:#64748b; font-size:0.875rem;">Kelola perjalanan sejarah perusahaan dari tahun ke tahun</p>
    </div>
    <a href="/cms-admin/timeline/create" class="btn-cms-primary">
        <i class="fas fa-plus"></i> Tambah Timeline
    </a>
</div>

{{-- Table Card --}}
<div class="cms-card">
    <div class="cms-card-header">
        <h5>
            <span class="card-icon" style="background:rgba(245,158,11,0.1);">
                <i class="fas fa-list" style="color:#f59e0b;"></i>
            </span>
            Daftar Sejarah ({{ $timelines->count() }} entri)
        </h5>
    </div>

    @if($timelines->isEmpty())
        <div class="text-center py-5">
            <div style="width:60px;height:60px;background:rgba(245,158,11,0.1);border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                <i class="fas fa-history" style="color:#f59e0b;font-size:1.5rem;"></i>
            </div>
            <p class="fw-bold mb-1" style="color:#1e293b;">Belum Ada Data Timeline</p>
            <p class="mb-3" style="color:#94a3b8;font-size:0.875rem;">Tambahkan sejarah perjalanan perusahaan</p>
            <a href="/cms-admin/timeline/create" class="btn-cms-primary">
                <i class="fas fa-plus"></i> Tambah Sekarang
            </a>
        </div>
    @else
        <div style="overflow-x:auto;">
            <table class="cms-table">
                <thead>
                    <tr>
                        <th style="width:60px;">Urutan</th>
                        <th style="width:90px;">Tahun</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th style="width:120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timelines as $t)
                    <tr>
                        <td>
                            <span style="background:#f1f5f9;border:1px solid #e2e8f0;border-radius:6px;padding:3px 10px;font-size:0.8rem;font-weight:700;color:#64748b;">
                                {{ $t->order }}
                            </span>
                        </td>
                        <td>
                            <span style="background:rgba(245,158,11,0.1);color:#d97706;border-radius:6px;padding:4px 10px;font-size:0.82rem;font-weight:700;">
                                {{ $t->year }}
                            </span>
                        </td>
                        <td>
                            <span style="font-weight:600;color:#1e293b;">{{ $t->title }}</span>
                        </td>
                        <td>
                            <span style="color:#64748b;font-size:0.875rem;">{{ Str::limit($t->description, 80) }}</span>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="/cms-admin/timeline/{{ $t->id }}/edit" class="btn-cms-outline" style="padding:6px 12px;font-size:0.75rem;">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="/cms-admin/timeline/{{ $t->id }}" method="POST" onsubmit="return confirm('Hapus timeline ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-cms-danger" style="padding:6px 12px;font-size:0.75rem;border:none;cursor:pointer;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
