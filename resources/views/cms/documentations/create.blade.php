@extends('cms.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <a href="/cms-admin/documentations" style="color:#94a3b8; text-decoration:none;">Galeri Dokumentasi</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Tambah Baru</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-plus-circle me-2" style="color:#14b8a6;"></i> Tambah Foto
        </h1>
    </div>
    <a href="/cms-admin/documentations" class="btn-cms-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<div class="cms-card">
    <div class="cms-card-header">
        <h5><span class="card-icon" style="background:rgba(20,184,166,0.1);"><i class="fas fa-image" style="color:#14b8a6;"></i></span> Form Tambah Foto Dokumentasi</h5>
    </div>
    <div class="cms-card-body">
        <form action="/cms-admin/documentations" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-md-8">
                    <label class="cms-label">Keterangan / Judul Foto</label>
                    <input type="text" name="title" class="cms-input" value="{{ old('title') }}" placeholder="Contoh: Kegiatan Pameran Alat Musik 2023">
                </div>
                <div class="col-md-4">
                    <label class="cms-label">Urutan Tampil</label>
                    <input type="number" name="order" class="cms-input" value="{{ old('order', 0) }}">
                </div>
                <div class="col-12">
                    <label class="cms-label">Foto <span style="color:#ef4444;">*</span></label>
                    <div style="border:2px dashed #e2e8f0;border-radius:12px;padding:30px;text-align:center;background:#fafbff;cursor:pointer;" onclick="document.getElementById('fotoInput').click()">
                        <div id="previewWrap" style="display:none;margin-bottom:12px;">
                            <img id="previewImg" src="" style="max-height:200px;border-radius:8px;max-width:100%;">
                        </div>
                        <i class="fas fa-cloud-upload-alt" style="font-size:2rem;color:#cbd5e1;margin-bottom:10px;display:block;" id="uploadIcon"></i>
                        <p style="color:#94a3b8;font-size:0.875rem;margin:0;" id="uploadText">Klik untuk memilih foto</p>
                    </div>
                    <input type="file" id="fotoInput" name="image" accept="image/*" style="display:none;" required onchange="previewFoto(this)">
                    <p class="cms-form-hint mt-2">Format: JPG, PNG, WEBP. Maks. 2MB.</p>
                </div>
            </div>
            <div class="d-flex gap-2 mt-4 pt-3" style="border-top:1px solid #f1f5f9;">
                <button type="submit" class="btn-cms-primary"><i class="fas fa-save"></i> Simpan</button>
                <a href="/cms-admin/documentations" class="btn-cms-secondary"><i class="fas fa-times"></i> Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
function previewFoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('previewWrap').style.display = 'block';
            document.getElementById('uploadIcon').style.display = 'none';
            document.getElementById('uploadText').textContent = input.files[0].name;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection
