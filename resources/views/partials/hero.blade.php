<section id="beranda" class="relative overflow-hidden">
  {{-- Foto latar belakang (aerial/drone) --}}
  <img src="{{ asset('images/hero-bg.jpg') }}" alt="Foto udara SMKN 4 Bogor"
       class="absolute inset-0 w-full h-full object-cover">
  {{-- Lapisan gelap transparan supaya teks putih tetap kebaca --}}
  <div class="absolute inset-0 bg-gradient-to-r from-[var(--navy-dark)]/90 via-[var(--navy-dark)]/50 to-transparent"></div>

  <div class="max-w-7xl mx-auto px-6 py-20 md:py-28 grid md:grid-cols-2 gap-10 items-center relative z-10">

    <div class="text-white">
      <p class="tracking-wide text-sm text-[var(--gold)] font-semibold mb-3">Selamat datang di</p>
      <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">SMKN 4 BOGOR</h1>
      <p class="text-white/90 max-w-md mb-8 leading-relaxed">
        Sekolah menengah kejuruan yang berkomitmen mencetak generasi unggul,
        kompeten, dan berkarakter di bidang teknologi dan berakhlak mulia.
      </p>
      <div class="flex gap-4">
        <a href="#tentang" class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 py-3 rounded-full font-semibold">Jelajahi Sekolah</a>
        <a href="#berita" class="bg-white/20 hover:bg-white/30 transition backdrop-blur text-white px-6 py-3 rounded-full font-semibold">Lihat Berita</a>
      </div>
    </div>

    {{-- Foto kedua yang dibingkai, ditumpuk & dimiringkan sedikit --}}
    <div class="relative hidden md:block">
      <div class="absolute -left-6 top-1/2 -translate-y-1/2 w-24 h-24 rounded-full bg-[var(--gold)] z-0"></div>
      <div class="relative rotate-2 rounded-2xl overflow-hidden border-4 border-white shadow-2xl aspect-[4/3] z-10">
        <img src="{{ asset('images/hero-foto.jpg') }}" alt="Foto SMKN 4 Bogor"
             class="w-full h-full object-cover">
      </div>
    </div>

  </div>
</section>