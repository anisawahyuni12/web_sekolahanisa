// TARO FILE INI DI: public/js/login.js (REPLACE file yang lama)

function togglePassword() {
  const pwd = document.getElementById('password');
  const eyeIcon = document.getElementById('eyeIcon');
  const isHidden = pwd.type === 'password';

  pwd.type = isHidden ? 'text' : 'password';

  if (isHidden) {
    // ganti jadi ikon mata terbuka (password kelihatan)
    eyeIcon.innerHTML = '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/>';
  } else {
    // ganti jadi ikon mata dicoret (password disembunyikan)
    eyeIcon.innerHTML = '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/><line x1="3" y1="3" x2="21" y2="21"/>';
  }
}