<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CV. Proats Indonesia - Produsen & Distributor Alat Musik Sejak 1970</title>

  <!-- SEO Meta Tags -->
  <meta name="description" content="CV. Proats Indonesia (Proats Music Center) - Produsen & Distributor Alat Musik berkualitas tinggi sejak 1970. Melayani Marching Band, Studio Band, Tiup, Tradisional, dan SIPLah.">
  <meta name="keywords" content="proats music center, cv proats indonesia, produsen alat musik, distributor alat musik, marching band bogor, alat musik tradisional, marching band indonesia, siplah alat musik">
  <meta name="author" content="CV. Proats Indonesia">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="CV. Proats Indonesia - Produsen & Distributor Alat Musik">
  <meta property="og:description" content="Produsen & distributor alat musik berkualitas tinggi sejak 1970. Melayani pasar lokal & ekspor, marching band, studio band, alat musik tiup, & tradisional.">
  <meta property="og:image" content="{{ asset('assets/images/hero_bg.png') }}">

  <!-- Fonts & Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <!-- Splash Screen -->
  <div class="splash-screen" id="splashScreen">
    <!-- Floating Music Notes -->
    <div class="splash-notes">
      <i class="fas fa-music splash-note" style="left:5%; animation-delay:0s; font-size:1.2rem;"></i>
      <i class="fas fa-music splash-note" style="left:15%; animation-delay:0.4s; font-size:0.9rem;"></i>
      <i class="fas fa-music splash-note" style="left:25%; animation-delay:1.2s; font-size:1.5rem;"></i>
      <i class="fas fa-music splash-note" style="left:35%; animation-delay:0.7s; font-size:1rem;"></i>
      <i class="fas fa-music splash-note" style="left:45%; animation-delay:1.5s; font-size:1.3rem;"></i>
      <i class="fas fa-music splash-note" style="left:55%; animation-delay:0.2s; font-size:0.8rem;"></i>
      <i class="fas fa-music splash-note" style="left:65%; animation-delay:0.9s; font-size:1.4rem;"></i>
      <i class="fas fa-music splash-note" style="left:75%; animation-delay:1.8s; font-size:1.1rem;"></i>
      <i class="fas fa-music splash-note" style="left:85%; animation-delay:0.5s; font-size:0.7rem;"></i>
      <i class="fas fa-music splash-note" style="left:92%; animation-delay:1.1s; font-size:1.2rem;"></i>
      <i class="fas fa-music splash-note" style="left:10%; animation-delay:1.6s; font-size:1rem;"></i>
      <i class="fas fa-music splash-note" style="left:50%; animation-delay:0.3s; font-size:0.9rem;"></i>
      <i class="fas fa-music splash-note" style="left:70%; animation-delay:1.4s; font-size:1.6rem;"></i>
      <i class="fas fa-music splash-note" style="left:30%; animation-delay:1.9s; font-size:0.8rem;"></i>
      <i class="fas fa-music splash-note" style="left:80%; animation-delay:0.6s; font-size:1.1rem;"></i>
    </div>
    <div class="splash-content">
      <img src="{{ asset('assets/images/logo.png') }}" alt="Proats Music Center" class="splash-logo">
      <div class="splash-loader">
        <div class="splash-loader-bar"></div>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="header" id="header">
    <div class="container">
      <a href="{{ url('/') }}" class="logo-wrapper">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Proats Music Center" class="logo-img">
      </a>

      <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
        <i class="fas fa-bars"></i>
      </button>

      <nav class="nav" id="navMenu">
        <a href="{{ url('/#home') }}" class="nav-link active">Home</a>

        <!-- Dropdown Profil -->
        <div class="nav-item dropdown">
          <a href="{{ url('/#about') }}" class="nav-link dropdown-toggle">
            Profil <i class="fas fa-chevron-down dropdown-arrow"></i>
          </a>
          <div class="dropdown-menu glass">
            <a href="{{ url('/#about') }}" class="dropdown-item">
              <i class="fas fa-building"></i> Profil Perusahaan
            </a>
            <a href="{{ url('/#about') }}" class="dropdown-item">
              <i class="fas fa-history"></i> Sejarah Sejak 1970
            </a>
          </div>
        </div>

        <!-- Dropdown Produk & Katalog -->
        <div class="nav-item dropdown">
          <a href="{{ url('/#products') }}" class="nav-link dropdown-toggle">
            Produk & Katalog <i class="fas fa-chevron-down dropdown-arrow"></i>
          </a>
          <div class="dropdown-menu glass">
            <a href="https://catalog.proatsmusiccenter.com/" target="_blank" rel="noopener noreferrer" class="dropdown-item highlighted">
              <i class="fas fa-external-link-alt"></i> <strong>E-Catalog Online</strong>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ url('/#products') }}" class="dropdown-item">
              <i class="fas fa-layer-group"></i> Semua Produk
            </a>
            <a href="{{ url('/#products') }}" class="dropdown-item">
              <i class="fas fa-drum"></i> Marching Band
            </a>
            <a href="{{ url('/#products') }}" class="dropdown-item">
              <i class="fas fa-wind"></i> Alat Tiup / Brass
            </a>
            <a href="{{ url('/#products') }}" class="dropdown-item">
              <i class="fas fa-guitar"></i> Studio Band
            </a>
            <a href="{{ url('/#products') }}" class="dropdown-item">
              <i class="fas fa-compact-disc"></i> Tradisional
            </a>
          </div>
        </div>

        <!-- Dropdown Layanan & Program -->
        <div class="nav-item dropdown">
          <a href="{{ url('/#services') }}" class="nav-link dropdown-toggle">
            Layanan & Program <i class="fas fa-chevron-down dropdown-arrow"></i>
          </a>
          <div class="dropdown-menu glass">
            <a href="{{ url('/#services') }}" class="dropdown-item">
              <i class="fas fa-concierge-bell"></i> Layanan Kami
            </a>
            <a href="{{ url('/#programs') }}" class="dropdown-item">
              <i class="fas fa-graduation-cap"></i> Program & Edukasi
            </a>
            <a href="https://siplah.kemendikdasmen.go.id/" target="_blank" rel="noopener noreferrer" class="dropdown-item">
              <i class="fas fa-shopping-bag"></i> Pengadaan SIPLah Sekolah <i class="fas fa-external-link-alt" style="font-size:0.7em; margin-left: auto;"></i>
            </a>
          </div>
        </div>

        <a href="#dokumentasi" class="nav-link">Dokumentasi</a>
        <a href="{{ url('/#contact') }}" class="nav-link">Hubungi Kami</a>

        <div class="nav-cta">
          <button id="themeToggleBtn" class="theme-toggle-btn" aria-label="Toggle Theme">
            <i class="fas fa-sun"></i>
          </button>
          <a href="https://wa.me/{{ $contact->whatsapp }}?text=Halo%20Proats%20Music%20Center,%20saya%20ingin%20bertanya%20mengenai%20produk%20alat%20musik." target="_blank" class="btn btn-primary btn-sm">
            <i class="fab fa-whatsapp"></i> Chat Admin
          </a>
        </div>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero" id="home">
    <div class="container">
      <div class="hero-grid">
        <div class="hero-content reveal reveal-left">
          <div class="hero-subtitle">{{ $hero->subtitle }}</div>
          <div class="hero-tagline">{{ $hero->tagline }}</div>
          <h1 class="hero-title text-gradient">{!! $hero->title !!}</h1>
          <p class="hero-desc">
            {{ $hero->description }}
          </p>
          <div class="hero-actions">
            <a href="{{ url('/#products') }}" class="btn btn-primary">
              {{ $hero->button1 }} <i class="fas fa-arrow-right"></i>
            </a>
            <a href="https://catalog.proatsmusiccenter.com/" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
              <i class="fas fa-book-open"></i> E-Catalog <i class="fas fa-external-link-alt" style="font-size: 0.75em;"></i>
            </a>
          </div>
          <div class="hero-stats">
            @php
              $s1 = explode(' ', $hero->stat1, 2);
              $s2 = explode(' ', $hero->stat2, 2);
              $s3 = explode(' ', $hero->stat3, 2);
            @endphp
            <div class="stat-item">
              <span class="stat-number">{{ $s1[0] ?? '' }}</span>
              <span class="stat-label">{{ $s1[1] ?? '' }}</span>
            </div>
            <div class="stat-item">
              <span class="stat-number">{{ $s2[0] ?? '' }}</span>
              <span class="stat-label">{{ $s2[1] ?? '' }}</span>
            </div>
            <div class="stat-item">
              <span class="stat-number">{{ $s3[0] ?? '' }}</span>
              <span class="stat-label">{{ $s3[1] ?? '' }}</span>
            </div>
          </div>
        </div>
        <div class="hero-media reveal reveal-right">
          <div class="hero-slider-container">
            <div class="hero-slider" id="heroSlider">
              @foreach($heroSliders as $index => $hs)
                @php
                  $imgSrc = \Illuminate\Support\Str::startsWith($hs->image, 'assets/') ? asset($hs->image) : (\Illuminate\Support\Str::startsWith($hs->image, 'storage/') ? asset($hs->image) : asset('storage/' . $hs->image));
                @endphp
                <div class="slide {{ $index == 0 ? 'active' : '' }}">
                  <img src="{{ $imgSrc }}" alt="{{ $hs->title }}" class="hero-img">
                  <div class="hero-badge glass">
                    <div class="badge-icon">
                      <i class="{{ $hs->icon ?? 'fas fa-award' }}"></i>
                    </div>
                    <div class="badge-text">
                      <h4>{{ $hs->title }}</h4>
                      <p>{{ $hs->subtitle }}</p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="about section" id="about">
    <div class="container">
      <div class="about-grid">
        <div class="about-media reveal reveal-left">
          <img src="{{ $profile->image ? asset($profile->image) : asset('assets/images/profile_drum.jpg') }}" alt="Proats Marching Drum" style="border-radius: 24px; border: 1px solid var(--border-light); box-shadow: 0 20px 40px rgba(0,0,0,0.5); width: 100%; height: 520px; object-fit: cover;">
        </div>
        <div class="about-content reveal reveal-right">
          <span class="section-tag">{{ $profile->tag }}</span>
          <h2 class="section-title text-gradient">{{ $profile->title }}</h2>
          <div class="about-profile-desc">
            @foreach(explode("\n", str_replace("\r", "", $profile->description)) as $paragraph)
              @if(trim($paragraph))
                <p>{!! $paragraph !!}</p>
              @endif
            @endforeach
          </div>
          <div class="legal-badges">
            @if($profile->legal_nib)
              <div class="legal-badge"><i class="fas fa-file-contract"></i> NIB: {{ $profile->legal_nib }}</div>
            @endif
            @if($profile->legal_kemenkumham)
              <div class="legal-badge"><i class="fas fa-check-circle"></i> {{ $profile->legal_kemenkumham }}</div>
            @endif
            @if($profile->legal_bkpm)
              <div class="legal-badge"><i class="fas fa-shield-alt"></i> {{ $profile->legal_bkpm }}</div>
            @endif
          </div>
        </div>
      </div>

      <!-- History Timeline -->
      <div class="section-header reveal reveal-up" style="margin-top: 5rem;">
        <span class="section-tag">Perjalanan Kami</span>
        <h2 class="section-title">Sejarah Sejak 1970</h2>
        <p class="section-desc">Evolusi dan pertumbuhan kami dari awal mula industri rumahan hingga menjadi salah satu produsen terkemuka di tanah air.</p>
      </div>

      <div class="timeline-container">
        <div class="timeline-line"></div>

        @foreach($timelines as $index => $t)
          <div class="timeline-item reveal {{ $index % 2 == 0 ? 'reveal-left' : 'reveal-right' }}">
            <div class="timeline-dot"></div>
            <div class="timeline-card glass">
              <span class="timeline-year">{{ $t->year }}</span>
              <h3>{{ $t->title }}</h3>
              <p>{{ $t->description }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="services section" id="services">
    <div class="container">
      <div class="section-header reveal reveal-up">
        <span class="section-tag">Layanan Kami</span>
        <h2 class="section-title">Apa Yang Kami Sediakan</h2>
        <p class="section-desc">Tidak hanya memproduksi, kami menyediakan layanan komprehensif untuk mendukung ekosistem musik Anda.</p>
      </div>

      <div class="services-grid">
        @foreach($services as $index => $s)
          <div class="service-card glass reveal reveal-up" style="transition-delay: {{ 0.1 * ($index + 1) }}s;">
            <div class="service-icon">
              <i class="{{ $s->icon }}"></i>
            </div>
            <h3 class="service-title">{{ $s->title }}</h3>
            <p class="service-desc">{{ $s->description }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Products Section -->
  <section class="products section" id="products">
    <div class="container">
      <div class="section-header reveal reveal-up">
        <span class="section-tag">Katalog Produk</span>
        <h2 class="section-title">Instrumen Musik Unggulan</h2>
        <p class="section-desc">Pilih produk terbaik dengan konstruksi presisi yang dibuat oleh tangan-tangan pengrajin profesional kami.</p>
      </div>

      <div class="products-filter reveal reveal-up">
        <button class="filter-btn active" data-filter="all">Semua Produk</button>
        <button class="filter-btn" data-filter="marching">Marching Band</button>
        <button class="filter-btn" data-filter="brass">Alat Tiup</button>
        <button class="filter-btn" data-filter="studio">Studio Band</button>
        <button class="filter-btn" data-filter="traditional">Tradisional</button>
      </div>

      <div class="products-grid">
        @foreach($products as $p)
          <div class="product-card glass reveal reveal-up" data-category="{{ $p->category }}">
            <div class="product-media">
              <img src="{{ $p->image ? asset($p->image) : asset('assets/images/placeholder.png') }}" alt="{{ $p->title }}" class="product-img">
              <div class="product-tag">
                @if($p->category == 'marching') Marching @elseif($p->category == 'brass') Alat Tiup @elseif($p->category == 'studio') Studio Band @else Tradisional @endif
              </div>
            </div>
            <div class="product-info">
              <h3 class="product-title">{{ $p->title }}</h3>
              <ul class="product-features">
                @if($p->features)
                  @foreach(explode("\n", str_replace("\r", "", $p->features)) as $feature)
                    @if(trim($feature))
                      <li><i class="fas fa-check-circle"></i> {{ $feature }}</li>
                    @endif
                  @endforeach
                @endif
              </ul>
              <button class="product-btn" onclick="orderProduct('{{ $p->title }}')">
                <i class="fab fa-whatsapp"></i> Hubungi Sales
              </button>
            </div>
          </div>
        @endforeach
      </div>

      <div class="reveal reveal-up" style="margin-top: 3rem; text-align: center;">
        <a href="https://catalog.proatsmusiccenter.com/" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.8rem 1.75rem;">
          <i class="fas fa-book-open"></i> Lihat E-Catalog Selengkapnya <i class="fas fa-external-link-alt" style="font-size: 0.85em;"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- Programs Section -->
  <section class="programs section" id="programs">
    <div class="container">
      <div class="section-header reveal reveal-up">
        <span class="section-tag">Program & Edukasi</span>
        <h2 class="section-title">Program Musik Terpadu</h2>
        <p class="section-desc">Kami berkomitmen membangun talenta musik melalui berbagai program pembinaan dan layanan instalasi teknis.</p>
      </div>

      <div class="programs-grid">
        @foreach($programs as $index => $pr)
          @php
            $revealClass = 'reveal-up';
            if ($index % 3 == 0) $revealClass = 'reveal-left';
            elseif ($index % 3 == 2) $revealClass = 'reveal-right';
          @endphp
          <div class="program-card glass reveal {{ $revealClass }}">
            <div class="program-header">
              <span class="program-num">{{ $pr->num }}</span>
              <i class="{{ $pr->icon }} program-icon"></i>
            </div>
            <h3 class="program-title">{{ $pr->title }}</h3>
            <p class="program-desc">{{ $pr->description }}</p>
            <ul class="program-perks">
              @if($pr->perks)
                @foreach(explode("\n", str_replace("\r", "", $pr->perks)) as $perk)
                  @if(trim($perk))
                    <li><i class="fas fa-circle-notch"></i> {{ $perk }}</li>
                  @endif
                @endforeach
              @endif
            </ul>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Dokumentasi Section -->
  <section class="dokumentasi section" id="dokumentasi">
    <div class="container">
      <div class="section-header reveal reveal-up">
        <span class="section-tag">Galeri Kegiatan</span>
        <h2 class="section-title">Dokumentasi</h2>
        <p class="section-desc">Dokumentasi kegiatan produksi, pelatihan, dan event yang telah kami selenggarakan.</p>
      </div>

      <div class="products-grid">
        @foreach($documentations as $d)
          <div class="product-card glass reveal reveal-up">
            <div class="product-media">
              <img src="{{ \Illuminate\Support\Str::startsWith($d->image, 'assets/') ? asset($d->image) : (\Illuminate\Support\Str::startsWith($d->image, 'storage/') ? asset($d->image) : asset('storage/' . $d->image)) }}" alt="{{ $d->title }}" class="product-img" style="height: 240px; object-fit: cover;">
            </div>
            <div class="product-info">
              <h3 class="product-title">{{ $d->title }}</h3>
              <p class="product-desc">{{ $d->description }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- SIPLah Purchase Section -->
  <section class="siplah-section section">
    <div class="container">
      <div class="siplah-purchase reveal reveal-up">
        <span class="section-tag">Metode Pembelian Instansi Sekolah</span>
        <h2 class="siplah-heading">Tersedia Pembelian Melalui</h2>
        <a href="https://siplah.kemendikdasmen.go.id/" target="_blank" rel="noopener noreferrer" class="siplah-logo-link">
          <img src="{{ asset('assets/images/siplah-logo.png') }}" alt="SIPLah - Sistem Informasi Pengadaan Sekolah" class="siplah-logo-img">
        </a>
        <p class="siplah-desc">Kami terdaftar resmi sebagai penyedia SIPLah untuk memudahkan sekolah melakukan belanja aman, transparan, dan sesuai regulasi.</p>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="contact section" id="contact">
    <div class="container">
      <div class="section-header reveal reveal-up">
        <span class="section-tag">Kontak Kami</span>
        <h2 class="section-title">Mari Berkolaborasi</h2>
        <p class="section-desc">Hubungi kami untuk konsultasi spesifikasi instrumen, kebutuhan SIPLah sekolah, atau rencana program pelatihan musik.</p>
      </div>

      <div class="contact-grid">
        <!-- Contact Information -->
        <div class="contact-details reveal reveal-left">

          <div class="contact-info-card glass">
            <div class="contact-info-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="contact-info-content">
              <h4>Alamat Kantor Representatif</h4>
              <p>{{ $contact->address_representative }}</p>
            </div>
          </div>

          <div class="contact-info-card glass">
            <div class="contact-info-icon">
              <i class="fas fa-history"></i>
            </div>
            <div class="contact-info-content">
              <h4>Pusat Workshop (Sejak 1970)</h4>
              <p>{{ $contact->address_workshop }}</p>
            </div>
          </div>

          <div class="contact-info-card glass">
            <div class="contact-info-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="contact-info-content">
              <h4>Email Resmi</h4>
              <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
            </div>
          </div>

          <div class="contact-info-card glass">
            <div class="contact-info-icon">
              <i class="fab fa-whatsapp"></i>
            </div>
            <div class="contact-info-content">
              <h4>WhatsApp Admin</h4>
              <a href="https://wa.me/{{ $contact->whatsapp }}" target="_blank">+{{ $contact->whatsapp }}</a>
            </div>
          </div>

          <div class="social-links">
            @if($contact->instagram)
              <a href="{{ $contact->instagram }}" target="_blank" class="social-btn" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
              </a>
            @endif
            @if($contact->facebook)
              <a href="{{ $contact->facebook }}" target="_blank" class="social-btn" aria-label="Facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
            @endif
          </div>

        </div>

        <!-- Contact Form -->
        <form class="contact-form glass reveal reveal-right" id="contactForm">
          <h3 class="form-title">Hubungi Kami</h3>
          <p class="form-desc">Kirimkan kebutuhan Anda, admin kami akan merespons secepat mungkin.</p>

          <div class="form-row">
            <div class="form-group">
              <label for="formName" class="form-label">Nama Lengkap</label>
              <input type="text" id="formName" class="form-control" placeholder="Nama Anda" required>
            </div>
            <div class="form-group">
              <label for="formPhone" class="form-label">Nomor WhatsApp</label>
              <input type="tel" id="formPhone" class="form-control" placeholder="Contoh: 081234..." required>
            </div>
          </div>

          <div class="form-group">
            <label for="formSchool" class="form-label">Instansi / Sekolah</label>
            <input type="text" id="formSchool" class="form-control" placeholder="Nama Sekolah atau Umum">
          </div>

          <div class="form-group">
            <label for="formService" class="form-label">Kategori Kebutuhan</label>
            <select id="formService" class="form-control">
              <option value="SIPLah / Pembelian Sekolah">Pembelian Instrumen Sekolah (SIPLah)</option>
              <option value="Marching Band / Drum Band">Alat Marching Band / Drum Band</option>
              <option value="Alat Musik Tradisional">Alat Musik Tradisional</option>
              <option value="Studio Band / Recording">Alat Studio & Recording</option>
              <option value="Service / Sparepart">Reparasi / Sparepart</option>
              <option value="Pelatihan / Marching Organizer">Program Pelatihan / Event</option>
            </select>
          </div>

          <div class="form-group">
            <label for="formMessage" class="form-label">Pesan / Detail Kebutuhan</label>
            <textarea id="formMessage" class="form-control" placeholder="Tuliskan spesifikasi alat atau rencana program yang ingin dikonsultasikan..." required></textarea>
          </div>

          <button type="submit" class="btn btn-primary form-submit-btn">
            Kirim WhatsApp <i class="fab fa-whatsapp" style="font-size: 1.2rem;"></i>
          </button>
        </form>
      </div>

      <!-- Styled Map Holder -->
      @if($contact->map_iframe_url)
        <div class="reveal reveal-up" style="margin-top: 5rem; border-radius: 24px; overflow: hidden; border: 1px solid var(--border-light); height: 400px; box-shadow: 0 15px 40px rgba(0,0,0,0.5);">
          <iframe
            src="{{ $contact->map_iframe_url }}"
            width="100%"
            height="100%"
            style="border:0; filter: invert(90%) hue-rotate(180deg) grayscale(40%) contrast(110%);"
            allowfullscreen=""
            loading="lazy">
          </iframe>
        </div>
      @endif

    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">

        <div class="footer-brand">
          <a href="{{ url('/') }}" class="logo-wrapper" style="pointer-events: none;">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Proats Music Center" class="logo-img logo-img--footer">
          </a>
          <p class="footer-brand-desc">
            Produsen & distributor alat musik berkualitas tinggi sejak 1970. Dedikasi tinggi pada nilai suara presisi dan pengerjaan profesional buatan Indonesia.
          </p>
        </div>

        <div>
          <h4 class="footer-title">Tautan Cepat</h4>
          <ul class="footer-links" style="margin-top: 1.5rem;">
            <li><a href="{{ url('/#home') }}">Home</a></li>
            <li><a href="{{ url('/#about') }}">Profil</a></li>
            <li><a href="{{ url('/#services') }}">Layanan</a></li>
            <li><a href="{{ url('/#products') }}">Produk</a></li>
            <li><a href="https://catalog.proatsmusiccenter.com/" target="_blank" rel="noopener noreferrer">E-Catalog Online <i class="fas fa-external-link-alt" style="font-size: 0.75em;"></i></a></li>
            <li><a href="{{ url('/#programs') }}">Program</a></li>
            <li><a href="#dokumentasi">Dokumentasi</a></li>
          </ul>
        </div>

        <div>
          <h4 class="footer-title">Produk & Program</h4>
          <ul class="footer-links" style="margin-top: 1.5rem;">
            <li><a href="{{ url('/#products') }}">Marching Band</a></li>
            <li><a href="{{ url('/#products') }}">Wind / Brass</a></li>
            <li><a href="{{ url('/#products') }}">Alat Tradisional</a></li>
            <li><a href="{{ url('/#programs') }}">Recording & Studio</a></li>
            <li><a href="{{ url('/#programs') }}">Sound System</a></li>
          </ul>
        </div>

        <div>
          <h4 class="footer-title">Hubungi Kami</h4>
          <ul class="footer-contact-info" style="margin-top: 1.5rem;">
            <li>
              <i class="fas fa-map-marker-alt"></i>
              <span>{{ $contact->address_representative }}</span>
            </li>
            <li>
              <i class="fas fa-phone-alt"></i>
              <span>+{{ $contact->whatsapp }}</span>
            </li>
            <li>
              <i class="fas fa-envelope"></i>
              <span>{{ $contact->email }}</span>
            </li>
          </ul>
        </div>

      </div>

      <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} CV. Proats Indonesia. All rights reserved. Made with <i class="fas fa-heart" style="color: var(--primary);"></i> in Indonesia.</p>
        <div class="footer-bottom-links">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Pass dynamic variables to JS -->
  <script>
    window.whatsappNumber = "{{ $contact->whatsapp }}";
  </script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
