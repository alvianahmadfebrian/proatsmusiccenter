@extends('cms.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Layanan Kami</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-concierge-bell me-2" style="color:#10b981; font-size:1.2rem;"></i> Layanan Kami
        </h1>
        <p class="mb-0 mt-1" style="color:#64748b; font-size:0.875rem;">Kelola daftar layanan yang ditawarkan perusahaan</p>
    </div>
    <a href="/cms-admin/services/create" class="btn-cms-primary">
        <i class="fas fa-plus"></i> Tambah Layanan
    </a>
</div>

<div class="cms-card">
    <div class="cms-card-header">
        <h5>
            <span class="card-icon" style="background:rgba(16,185,129,0.1);">
                <i class="fas fa-list" style="color:#10b981;"></i>
            </span>
            Daftar Layanan ({{ $services->count() }} item)
        </h5>
    </div>

    @if($services->isEmpty())
        <div class="text-center py-5">
            <div style="width:60px;height:60px;background:rgba(16,185,129,0.1);border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                <i class="fas fa-concierge-bell" style="color:#10b981;font-size:1.5rem;"></i>
            </div>
            <p class="fw-bold mb-1" style="color:#1e293b;">Belum Ada Data Layanan</p>
            <p class="mb-3" style="color:#94a3b8;font-size:0.875rem;">Tambahkan layanan yang ditawarkan perusahaan</p>
            <a href="/cms-admin/services/create" class="btn-cms-primary">
                <i class="fas fa-plus"></i> Tambah Sekarang
            </a>
        </div>
    @else
        <div style="overflow-x:auto;">
            <table class="cms-table">
                <thead>
                    <tr>
                        <th style="width:60px;">Urutan</th>
                        <th style="width:80px;">Ikon</th>
                        <th>Nama Layanan</th>
                        <th>Deskripsi</th>
                        <th style="width:120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $s)
                    <tr>
                        <td>
                            <span style="background:#f1f5f9;border:1px solid #e2e8f0;border-radius:6px;padding:3px 10px;font-size:0.8rem;font-weight:700;color:#64748b;">
                                {{ $s->order }}
                            </span>
                        </td>
                        <td>
                            <div style="width:36px;height:36px;border-radius:9px;background:rgba(16,185,129,0.1);display:flex;align-items:center;justify-content:center;">
                                <i class="{{ $s->icon }}" style="color:#10b981;"></i>
                            </div>
                        </td>
                        <td><span style="font-weight:600;color:#1e293b;">{{ $s->name }}</span></td>
                        <td><span style="color:#64748b;font-size:0.875rem;">{{ Str::limit($s->description, 80) }}</span></td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="/cms-admin/services/{{ $s->id }}/edit" class="btn-cms-outline" style="padding:6px 12px;font-size:0.75rem;">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="/cms-admin/services/{{ $s->id }}" method="POST" onsubmit="return confirm('Hapus layanan ini?')">
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
