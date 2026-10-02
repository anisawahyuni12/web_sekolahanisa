// ================= EFEK GLOBAL: fade-in scroll, transisi halaman, counter angka =================
document.addEventListener('DOMContentLoaded', function () {

  // ---------- 1. Fade-in pas discroll ----------
  var revealSelectors = [
    '.produk-card', '.ekskul-card', '.galeri-card',
    '.kontak-info-card', '.kontak-side-card',
    'article', '.admin-stat-card', '.timeline-row',
    // kartu di halaman Beranda (Program Keahlian) & Profil Sekolah (sambutan, Fasilitas Sekolah)
    '.bg-white.rounded-2xl.shadow-sm',
    '.bg-white.rounded-2xl.shadow-md',
    '.bg-white.rounded-xl.border',
    // kartu di tabel admin, form Kontak, Login Admin, Hubungi Administrator
    '.admin-table-card', '.login-card', '.card', '.kontak-form-card'
  ];
  var revealTargets = document.querySelectorAll(revealSelectors.join(', '));

  revealTargets.forEach(function (el) {
    el.classList.add('reveal');
  });

  if ('IntersectionObserver' in window) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    revealTargets.forEach(function (el) {
      observer.observe(el);
    });
  } else {
    // browser lama tanpa support IntersectionObserver: langsung tampilkan semua
    revealTargets.forEach(function (el) {
      el.classList.add('is-visible');
    });
  }

  // ---------- 2. Transisi halus pindah halaman ----------
  document.querySelectorAll('a[href]').forEach(function (link) {
    var href = link.getAttribute('href');

    // lewati: link kosong/anchor (#), buka tab baru, link file (download), atau link ke luar domain
    if (!href || href.startsWith('#') || link.target === '_blank') return;
    if (href.startsWith('http') && !href.startsWith(window.location.origin)) return;
    if (href.startsWith('mailto:') || href.startsWith('tel:') || href.startsWith('javascript:')) return;

    link.addEventListener('click', function (e) {
      e.preventDefault();
      document.body.classList.add('page-fade-out');
      setTimeout(function () {
        window.location.href = href;
      }, 320);
    });
  });

  // ---------- 5. Jeda sebentar sebelum form submit, biar ripple tombolnya sempat kelihatan ----------
  document.querySelectorAll('form').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      if (form.dataset.rippleDelayed === 'true') return; // sudah dijeda, lanjutkan submit asli
      e.preventDefault();
      form.dataset.rippleDelayed = 'true';
      document.body.classList.add('page-fade-out');
      setTimeout(function () {
        form.submit();
      }, 320);
    });
  });

  // ---------- 3b. Efek pas GAMBAR diklik (ripple + pop membesar-mengecil) ----------
  document.querySelectorAll('img').forEach(function (img) {
    var computedPos = window.getComputedStyle(img).position;
    if (computedPos === 'static') img.style.position = 'relative';
    img.style.cursor = 'pointer';

    img.addEventListener('click', function (e) {
      // animasi pop membesar-mengecil
      img.classList.remove('img-pulse');
      void img.offsetWidth; // paksa reflow biar animasi bisa diulang
      img.classList.add('img-pulse');

      // ripple warna tema tepat di titik klik
      var rect = img.getBoundingClientRect();
      var size = Math.max(rect.width, rect.height);
      var span = document.createElement('span');
      span.className = 'ripple-effect';
      span.style.width = size + 'px';
      span.style.height = size + 'px';
      span.style.left = (e.clientX - rect.left - size / 2) + 'px';
      span.style.top = (e.clientY - rect.top - size / 2) + 'px';

      var wrapper = img.parentElement;
      var wrapperPos = window.getComputedStyle(wrapper).position;
      if (wrapperPos === 'static') wrapper.style.position = 'relative';
      wrapper.style.overflow = wrapper.style.overflow || 'hidden';
      wrapper.appendChild(span);
      setTimeout(function () { span.remove(); }, 650);
    });
  });

  // ---------- 4. Efek ripple warna tema pas diklik ----------
  var rippleSelectors = [
    'button', '.btn', '.kontak-submit-btn', '.btn-login',
    'a[class*="bg-blue-600"]', 'a[class*="bg-blue-700"]',
    '.admin-nav-link', '.admin-action-btn', '.admin-page-btn',
    // semua jenis kartu di seluruh web (Produk, Ekskul, Galeri, Berita, Program Keahlian, Fasilitas, dll)
    '.produk-card', '.ekskul-card', '.galeri-card',
    '.kontak-info-card', '.kontak-side-card', 'article',
    '.bg-white.rounded-2xl.shadow-sm',
    '.bg-white.rounded-2xl.shadow-md',
    '.bg-white.rounded-xl.border'
  ];
  // elemen dengan latar terang (putih/abu), ripple-nya pakai warna navy biar kontras
  var lightBgSelectors = ['.admin-nav-link', '.admin-action-btn', '.admin-page-btn', '.btn-login'];

  document.querySelectorAll(rippleSelectors.join(', ')).forEach(function (el) {
    var computedPos = window.getComputedStyle(el).position;
    if (computedPos === 'static') el.style.position = 'relative';
    el.style.overflow = 'hidden';

    if (lightBgSelectors.some(function (sel) { return el.matches(sel); })) {
      el.classList.add('ripple-light');
    }

    el.addEventListener('click', function (e) {
      var rect = el.getBoundingClientRect();
      var size = Math.max(rect.width, rect.height);
      var span = document.createElement('span');
      span.className = 'ripple-effect';
      span.style.width = size + 'px';
      span.style.height = size + 'px';
      span.style.left = (e.clientX - rect.left - size / 2) + 'px';
      span.style.top = (e.clientY - rect.top - size / 2) + 'px';
      el.appendChild(span);
      setTimeout(function () { span.remove(); }, 650);
    });
  });

  // ---------- 3. Animasi angka statistik (Dashboard admin) ----------
  document.querySelectorAll('.stat-counter').forEach(function (el) {
    var target = parseInt(el.getAttribute('data-target'), 10) || 0;
    var duration = 900; // ms
    var startTime = null;

    function step(timestamp) {
      if (!startTime) startTime = timestamp;
      var progress = Math.min((timestamp - startTime) / duration, 1);
      var current = Math.floor(progress * target);
      el.textContent = current;
      if (progress < 1) {
        requestAnimationFrame(step);
      } else {
        el.textContent = target;
      }
    }
    requestAnimationFrame(step);
  });

});