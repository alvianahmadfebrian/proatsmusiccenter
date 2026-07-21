document.addEventListener('DOMContentLoaded', () => {

  // 0. Splash Screen
  const splash = document.getElementById('splashScreen');
  if (splash) {
    setTimeout(() => {
      splash.classList.add('hidden');
      setTimeout(() => splash.remove(), 600);
    }, 2200);
  }

  // 1. Sticky Header scroll effect
  const header = document.getElementById('header');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });

  // 2. Mobile Menu Toggle
  const menuToggle = document.getElementById('menuToggle');
  const navMenu = document.getElementById('navMenu');
  const menuIcon = menuToggle.querySelector('i');

  menuToggle.addEventListener('click', () => {
    navMenu.classList.toggle('open');
    if (navMenu.classList.contains('open')) {
      menuIcon.classList.remove('fa-bars');
      menuIcon.classList.add('fa-times');
    } else {
      menuIcon.classList.remove('fa-times');
      menuIcon.classList.add('fa-bars');
    }
  });

  // Close mobile menu when clicking nav link
  const navLinks = document.querySelectorAll('.nav-link');
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      navMenu.classList.remove('open');
      menuIcon.classList.remove('fa-times');
      menuIcon.classList.add('fa-bars');
    });
  });

  // Clean URL if loaded with hash tag (e.g. #home)
  if (window.location.hash) {
    history.replaceState(null, null, window.location.pathname);
  }

  // Smooth scroll and clean URL handler for hash links
  document.querySelectorAll('a[href*="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const rawHref = this.getAttribute('href');
      if (!rawHref) return;

      const hashIndex = rawHref.indexOf('#');
      if (hashIndex === -1) return;

      const targetId = rawHref.substring(hashIndex + 1);
      if (!targetId) return;

      const targetElement = document.getElementById(targetId);
      if (targetElement) {
        e.preventDefault();
        const headerOffset = 80;
        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });

        // Clean URL to keep address bar clean without #
        if (window.history.pushState) {
          window.history.pushState(null, null, window.location.pathname);
        }
      }
    });
  });

  // 3. Active Link Highlighter on scroll
  const sections = document.querySelectorAll('section');
  window.addEventListener('scroll', () => {
    let current = '';
    const scrollPos = window.scrollY + 120; // offset for sticky header

    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;
      if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
        current = section.getAttribute('id');
      }
    });

    navLinks.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('href') === `#${current}`) {
        link.classList.add('active');
      }
    });
  });

  // 4. Intersection Observer for Scroll Animations
  const revealElements = document.querySelectorAll('.reveal');
  const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
        // Unobserve once animated to keep it showing
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  });

  revealElements.forEach(element => {
    revealObserver.observe(element);
  });

  // 5. Product Gallery Category Filter
  const filterBtns = document.querySelectorAll('.filter-btn');
  const productCards = document.querySelectorAll('.product-card');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      // Toggle active class on buttons
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filterValue = btn.getAttribute('data-filter');

      productCards.forEach(card => {
        // Simple fade-out and fade-in animation during filtering
        card.style.opacity = '0';
        card.style.transform = 'scale(0.8)';

        setTimeout(() => {
          const category = card.getAttribute('data-category');
          if (filterValue === 'all' || category === filterValue) {
            card.style.display = 'flex';
            setTimeout(() => {
              card.style.opacity = '1';
              card.style.transform = 'scale(1)';
            }, 50);
          } else {
            card.style.display = 'none';
          }
        }, 300);
      });
    });
  });

  // 6. Contact Form Submission via WhatsApp
  const contactForm = document.getElementById('contactForm');
  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const name = document.getElementById('formName').value;
    const phone = document.getElementById('formPhone').value;
    const school = document.getElementById('formSchool').value || 'Umum';
    const category = document.getElementById('formService').value;
    const message = document.getElementById('formMessage').value;

    // Formatting text for WhatsApp API
    const waText = `Halo Admin Proats Music Center,%0A%0ASaya ingin berkonsultasi mengenai produk/layanan Anda.%0A%0A*Detail Informasi:*%0A- Nama: ${name}%0A- WhatsApp: ${phone}%0A- Instansi/Sekolah: ${school}%0A- Kategori Kebutuhan: ${category}%0A%0A*Pesan:*%0A${message}`;

    // Business phone number
    const waNumber = window.whatsappNumber || '6281290174510';
    const waURL = `https://wa.me/${waNumber}?text=${waText}`;

    // Open WhatsApp in new tab
    window.open(waURL, '_blank');
  });

  // 7. Dark / Light Mode Toggle
  const themeToggleBtn = document.getElementById('themeToggleBtn');
  const themeIcon = themeToggleBtn.querySelector('i');

  // Check saved theme in localStorage
  const currentTheme = localStorage.getItem('theme') || 'dark';

  if (currentTheme === 'light') {
    document.body.classList.add('light-theme');
    themeIcon.classList.remove('fa-sun');
    themeIcon.classList.add('fa-moon');
  } else {
    themeIcon.classList.remove('fa-moon');
    themeIcon.classList.add('fa-sun');
  }

  themeToggleBtn.addEventListener('click', () => {
    document.body.classList.toggle('light-theme');

    let theme = 'dark';
    if (document.body.classList.contains('light-theme')) {
      theme = 'light';
      themeIcon.classList.remove('fa-sun');
      themeIcon.classList.add('fa-moon');
    } else {
      themeIcon.classList.remove('fa-moon');
      themeIcon.classList.add('fa-sun');
    }

    localStorage.setItem('theme', theme);
  });

  // 8. Auto Photo Slider
  const slides = document.querySelectorAll('.hero-slider .slide');
  const dots = document.querySelectorAll('.slider-dots .dot');
  const prevBtn = document.getElementById('sliderPrev');
  const nextBtn = document.getElementById('sliderNext');

  if (slides.length > 0) {
    let currentSlide = 0;
    let slideInterval;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
      });
      dots.forEach((dot, i) => {
        dot.classList.toggle('active', i === index);
      });
      currentSlide = index;
    }

    function nextSlide() {
      const nextIndex = (currentSlide + 1) % slides.length;
      showSlide(nextIndex);
    }

    function prevSlide() {
      const prevIndex = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(prevIndex);
    }

    function startAutoSlide() {
      stopAutoSlide();
      slideInterval = setInterval(nextSlide, 3500);
    }

    function stopAutoSlide() {
      if (slideInterval) {
        clearInterval(slideInterval);
      }
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        nextSlide();
        startAutoSlide();
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', () => {
        prevSlide();
        startAutoSlide();
      });
    }

    dots.forEach((dot, i) => {
      dot.addEventListener('click', () => {
        showSlide(i);
        startAutoSlide();
      });
    });

    const sliderContainer = document.querySelector('.hero-slider-container');
    if (sliderContainer) {
      sliderContainer.addEventListener('mouseenter', stopAutoSlide);
      sliderContainer.addEventListener('mouseleave', startAutoSlide);
    }

    startAutoSlide();
  }

});

// Global function called when user clicks "Hubungi Sales" in product cards
function orderProduct(productName) {
  const contactSection = document.getElementById('contact');
  const serviceSelect = document.getElementById('formService');
  const messageTextarea = document.getElementById('formMessage');

  // Smooth scroll to contact section
  contactSection.scrollIntoView({ behavior: 'smooth' });

  // Map product names to categories dropdown
  if (productName.includes('Marching')) {
    serviceSelect.value = 'Marching Band / Drum Band';
  } else if (productName.includes('Wind') || productName.includes('Brass')) {
    serviceSelect.value = 'Alat Musik Tradisional'; // close match or we customize
  } else if (productName.includes('Studio')) {
    serviceSelect.value = 'Studio Band / Recording';
  } else if (productName.includes('Traditional')) {
    serviceSelect.value = 'Alat Musik Tradisional';
  }

  // Pre-fill message details
  messageTextarea.value = `Halo Proats Music Center, saya tertarik untuk memesan dan mengetahui spesifikasi lebih lanjut mengenai produk: "${productName}". Mohon info harga dan ketersediaannya. Terima kasih.`;
  messageTextarea.focus();
}
