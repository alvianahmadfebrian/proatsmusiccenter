@extends('cms.layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <nav style="font-size:0.8rem; color:#94a3b8; margin-bottom:6px;">
            <a href="/cms-admin/dashboard" style="color:#94a3b8; text-decoration:none;">Dashboard</a>
            <span class="mx-1">›</span>
            <span style="color:#6366f1; font-weight:600;">Hubungi Kami</span>
        </nav>
        <h1 class="fw-bold mb-0" style="font-size:1.5rem; color:#0f172a;">
            <i class="fas fa-address-book me-2" style="color:#f97316; font-size:1.2rem;"></i> Hubungi Kami
        </h1>
        <p class="mb-0 mt-1" style="color:#64748b; font-size:0.875rem;">Kelola informasi kontak, nomor WhatsApp, email, dan embed peta</p>
    </div>
    <a href="/" target="_blank" class="btn-cms-outline"><i class="fas fa-eye"></i> Pratinjau</a>
</div>

<div class="cms-card">
    <div class="cms-card-header">
        <h5>
            <span class="card-icon" style="background:rgba(249,115,22,0.1);"><i class="fas fa-pen" style="color:#f97316;"></i></span>
            Edit Informasi Kontak
        </h5>
    </div>
    <div class="cms-card-body">
        <form action="/cms-admin/contacts" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">
                {{-- Alamat --}}
                <div class="col-12">
                    <div class="p-3 mb-1" style="background:#f8faff;border:1px solid #e9eef5;border-radius:10px;">
                        <p class="fw-bold mb-3" style="font-size:0.82rem;color:#64748b;text-transform:uppercase;letter-spacing:0.5px;">
                            <i class="fas fa-map-marker-alt me-2" style="color:#f97316;"></i> Alamat
                        </p>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="cms-label">Alamat Kantor Representative</label>
                                <textarea name="address_representative" class="cms-input" rows="3" placeholder="Jl. Mercedes Benz...">{{ old('address_representative', $contact->address_representative) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="cms-label">Alamat Workshop / Pabrik</label>
                                <textarea name="address_workshop" class="cms-input" rows="3" placeholder="Jl. Jenderal Sudirman...">{{ old('address_workshop', $contact->address_workshop) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kontak Digital --}}
                <div class="col-12">
                    <div class="p-3" style="background:#f8faff;border:1px solid #e9eef5;border-radius:10px;">
                        <p class="fw-bold mb-3" style="font-size:0.82rem;color:#64748b;text-transform:uppercase;letter-spacing:0.5px;">
                            <i class="fas fa-phone me-2" style="color:#10b981;"></i> Kontak Digital
                        </p>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="cms-label">Nomor WhatsApp</label>
                                <div style="position:relative;">
                                    <span style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#25D366;font-size:0.85rem;">
                                        <i class="fab fa-whatsapp"></i>
                                    </span>
                                    <input type="text" name="whatsapp" class="cms-input" style="padding-left:36px;" value="{{ old('whatsapp', $contact->whatsapp) }}" placeholder="6285216160770">
                                </div>
                                <p class="cms-form-hint">Format: 62xxx (tanpa + atau 0)</p>
                            </div>
                            <div class="col-md-4">
                                <label class="cms-label">Alamat Email</label>
                                <div style="position:relative;">
                                    <span style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#6366f1;font-size:0.85rem;">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" name="email" class="cms-input" style="padding-left:36px;" value="{{ old('email', $contact->email) }}" placeholder="info@proatsmusic.com">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="cms-label">Instagram URL</label>
                                <div style="position:relative;">
                                    <span style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#e1306c;font-size:0.85rem;">
                                        <i class="fab fa-instagram"></i>
                                    </span>
                                    <input type="url" name="instagram" class="cms-input" style="padding-left:36px;" value="{{ old('instagram', $contact->instagram) }}" placeholder="https://instagram.com/...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="cms-label">Facebook URL</label>
                                <div style="position:relative;">
                                    <span style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#1877f2;font-size:0.85rem;">
                                        <i class="fab fa-facebook-f"></i>
                                    </span>
                                    <input type="url" name="facebook" class="cms-input" style="padding-left:36px;" value="{{ old('facebook', $contact->facebook) }}" placeholder="https://facebook.com/...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Google Maps --}}
                <div class="col-12">
                    <div class="p-3" style="background:#f8faff;border:1px solid #e9eef5;border-radius:10px;">
                        <p class="fw-bold mb-3" style="font-size:0.82rem;color:#64748b;text-transform:uppercase;letter-spacing:0.5px;">
                            <i class="fas fa-map me-2" style="color:#ea4335;"></i> Google Maps Embed
                        </p>
                        <label class="cms-label">URL Embed Peta</label>
                        <input type="url" name="map_iframe_url" class="cms-input" value="{{ old('map_iframe_url', $contact->map_iframe_url) }}" placeholder="https://maps.google.com/maps?q=...&output=embed">
                        <p class="cms-form-hint">Buka Google Maps → Bagikan → Sematkan peta → Salin hanya bagian URL dari atribut src="..."</p>

                        @if($contact->map_iframe_url)
                            <div class="mt-3" style="border-radius:10px;overflow:hidden;height:200px;border:1px solid #e2e8f0;">
                                <iframe src="{{ $contact->map_iframe_url }}" width="100%" height="200" style="border:0;display:block;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4 pt-3" style="border-top:1px solid #f1f5f9;">
                <button type="submit" class="btn-cms-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                <a href="/cms-admin/dashboard" class="btn-cms-secondary"><i class="fas fa-times"></i> Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
