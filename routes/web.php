<?php
// GANTI SELURUH ISI FILE routes/web.php DENGAN INI

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminEkstrakurikulerController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminPesanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/profil-sekolah', [ProfilController::class, 'index']);
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/galeri', [GaleriController::class, 'index']);
Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/kontak', [KontakController::class, 'index']);
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
Route::get('/login-admin', [LoginController::class, 'index']);
Route::post('/login-admin', [LoginController::class, 'authenticate']);

// ===== TAMBAHAN BARU: halaman Hubungi Administrator =====
Route::get('/hubungi-administrator', function () {
    return view('auth.hubungi-administrator');
});

Route::get('/dashboard', [AdminDashboardController::class, 'index']);

// ===== KELOLA PRODUK =====
Route::get('/dashboard/produk', [AdminProdukController::class, 'index'])->name('admin.produk.index');
Route::get('/dashboard/produk/tambah', [AdminProdukController::class, 'create'])->name('admin.produk.create');
Route::post('/dashboard/produk', [AdminProdukController::class, 'store'])->name('admin.produk.store');
Route::get('/dashboard/produk/{produk}/edit', [AdminProdukController::class, 'edit'])->name('admin.produk.edit');
Route::put('/dashboard/produk/{produk}', [AdminProdukController::class, 'update'])->name('admin.produk.update');
Route::delete('/dashboard/produk/{produk}', [AdminProdukController::class, 'destroy'])->name('admin.produk.destroy');

// ===== KELOLA GALERI =====
Route::get('/dashboard/galeri', [AdminGaleriController::class, 'index'])->name('admin.galeri.index');
Route::get('/dashboard/galeri/tambah', [AdminGaleriController::class, 'create'])->name('admin.galeri.create');
Route::post('/dashboard/galeri', [AdminGaleriController::class, 'store'])->name('admin.galeri.store');
Route::get('/dashboard/galeri/{galeri}/edit', [AdminGaleriController::class, 'edit'])->name('admin.galeri.edit');
Route::put('/dashboard/galeri/{galeri}', [AdminGaleriController::class, 'update'])->name('admin.galeri.update');
Route::delete('/dashboard/galeri/{galeri}', [AdminGaleriController::class, 'destroy'])->name('admin.galeri.destroy');

// ===== KELOLA BERITA =====
Route::get('/dashboard/berita', [AdminBeritaController::class, 'index'])->name('admin.berita.index');
Route::get('/dashboard/berita/tambah', [AdminBeritaController::class, 'create'])->name('admin.berita.create');
Route::post('/dashboard/berita', [AdminBeritaController::class, 'store'])->name('admin.berita.store');
Route::get('/dashboard/berita/{berita}/edit', [AdminBeritaController::class, 'edit'])->name('admin.berita.edit');
Route::put('/dashboard/berita/{berita}', [AdminBeritaController::class, 'update'])->name('admin.berita.update');
Route::delete('/dashboard/berita/{berita}', [AdminBeritaController::class, 'destroy'])->name('admin.berita.destroy');

// ===== KELOLA EKSTRAKURIKULER =====
// ===== KELOLA PESAN (KONTAK) =====
Route::get('/dashboard/kontak', [AdminPesanController::class, 'index'])->name('admin.pesan.index');
Route::get('/dashboard/kontak/{pesan}', [AdminPesanController::class, 'show'])->name('admin.pesan.show');
Route::post('/dashboard/kontak/{pesan}/balas', [AdminPesanController::class, 'reply'])->name('admin.pesan.reply');
Route::delete('/dashboard/kontak/{pesan}', [AdminPesanController::class, 'destroy'])->name('admin.pesan.destroy');

Route::get('/dashboard/ekstrakurikuler', [AdminEkstrakurikulerController::class, 'index'])->name('admin.ekstrakurikuler.index');
Route::get('/dashboard/ekstrakurikuler/tambah', [AdminEkstrakurikulerController::class, 'create'])->name('admin.ekstrakurikuler.create');
Route::post('/dashboard/ekstrakurikuler', [AdminEkstrakurikulerController::class, 'store'])->name('admin.ekstrakurikuler.store');
Route::get('/dashboard/ekstrakurikuler/{ekstrakurikuler}/edit', [AdminEkstrakurikulerController::class, 'edit'])->name('admin.ekstrakurikuler.edit');
Route::put('/dashboard/ekstrakurikuler/{ekstrakurikuler}', [AdminEkstrakurikulerController::class, 'update'])->name('admin.ekstrakurikuler.update');
Route::delete('/dashboard/ekstrakurikuler/{ekstrakurikuler}', [AdminEkstrakurikulerController::class, 'destroy'])->name('admin.ekstrakurikuler.destroy');