@extends('cms.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Katalog Produk</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-drum me-2" style="color:#0ea5e9; font-size:1.2rem;"></i> Katalog Produk
        </h1>
        <p class="mb-0 mt-1" style="color:#64748b; font-size:0.875rem;">Kelola katalog instrumen dan produk perusahaan</p>
    </div>
    <a href="/cms-admin/products/create" class="btn-cms-primary"><i class="fas fa-plus"></i> Tambah Produk</a>
</div>

<div class="cms-card">
    <div class="cms-card-header">
        <h5>
            <span class="card-icon" style="background:rgba(14,165,233,0.1);"><i class="fas fa-box" style="color:#0ea5e9;"></i></span>
            Daftar Produk ({{ $products->count() }} item)
        </h5>
    </div>

    @if($products->isEmpty())
        <div class="text-center py-5">
            <div style="width:60px;height:60px;background:rgba(14,165,233,0.1);border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                <i class="fas fa-drum" style="color:#0ea5e9;font-size:1.5rem;"></i>
            </div>
            <p class="fw-bold mb-1" style="color:#1e293b;">Belum Ada Data Produk</p>
            <p class="mb-3" style="color:#94a3b8;font-size:0.875rem;">Tambahkan katalog instrumen dan produk</p>
            <a href="/cms-admin/products/create" class="btn-cms-primary"><i class="fas fa-plus"></i> Tambah Sekarang</a>
        </div>
    @else
        <div style="overflow-x:auto;">
            <table class="cms-table">
                <thead>
                    <tr>
                        <th style="width:60px;">Urutan</th>
                        <th style="width:80px;">Foto</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th style="width:120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                    <tr>
                        <td>
                            <span style="background:#f1f5f9;border:1px solid #e2e8f0;border-radius:6px;padding:3px 10px;font-size:0.8rem;font-weight:700;color:#64748b;">{{ $p->order }}</span>
                        </td>
                        <td>
                            @if($p->image)
                                <img src="{{ asset('storage/' . $p->image) }}" style="width:46px;height:38px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0;">
                            @else
                                <div style="width:46px;height:38px;background:#f1f5f9;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                    <i class="fas fa-image" style="color:#cbd5e1;font-size:0.9rem;"></i>
                                </div>
                            @endif
                        </td>
                        <td><span style="font-weight:600;color:#1e293b;">{{ $p->name }}</span></td>
                        <td>
                            @if($p->category)
                                <span style="background:rgba(14,165,233,0.1);color:#0284c7;border-radius:6px;padding:3px 10px;font-size:0.75rem;font-weight:600;">{{ $p->category }}</span>
                            @else
                                <span style="color:#cbd5e1;font-size:0.8rem;">—</span>
                            @endif
                        </td>
                        <td><span style="color:#64748b;font-size:0.875rem;">{{ Str::limit($p->description, 60) }}</span></td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="/cms-admin/products/{{ $p->id }}/edit" class="btn-cms-outline" style="padding:6px 12px;font-size:0.75rem;"><i class="fas fa-pen"></i></a>
                                <form action="/cms-admin/products/{{ $p->id }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-cms-danger" style="padding:6px 12px;font-size:0.75rem;border:none;cursor:pointer;"><i class="fas fa-trash"></i></button>
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
