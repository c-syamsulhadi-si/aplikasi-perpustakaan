<?php

use App\Http\Controllers\cetak\CetakController;
use App\Http\Livewire\Admin\Laporan;
use App\Http\Livewire\Admin\Pengguna;
use App\Http\Livewire\Anggota\ListAnggota;
use App\Http\Livewire\Beranda\ListBuku;
use App\Http\Livewire\Beranda\TentangKami;
use App\Http\Livewire\Bukusaya\ListBukuSaya;
use App\Http\Livewire\Peminjamanbuku\ListPeminjamanBuku;
use App\Http\Livewire\Pengembalianbuku\ListPengembalianBuku;
use App\Http\Livewire\Pengguna\GantiPassword;
use App\Http\Livewire\Pengguna\Profil;
use App\Http\Livewire\TambahData\Buku as TambahDataBuku;
use App\Http\Livewire\TambahData\Kategori as TambahDataKategori;
use App\Http\Livewire\TambahData\Rak as TambahDataRak;
use Illuminate\Support\Facades\Route;


// Route::get('/', fn () => view('blank-page'))->middleware(['auth', 'verified']);

Route::get('/', ListBuku::class);
Route::get('list-buku', ListBuku::class)->prefix('beranda')->name('list-buku');
Route::get('tentang-kami', TentangKami::class)->prefix('beranda')->name('tentang-kami');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('list-buku-saya', ListBukuSaya::class)->name('list-buku-saya');
    Route::get('profil', Profil::class)->prefix('umum')->name('umum.profil');
    Route::get('ganti-password', GantiPassword::class)->prefix('umum')->name('umum.ganti-password');

    Route::middleware('IsAdmin')->group(function () {
        Route::get('pengguna', Pengguna::class)->name('pengguna');
        Route::get('laporan', Laporan::class)->name('admin.laporan');
        Route::get('cetak-anggota-peminjaman', [CetakController::class, 'cetakAnggotaPeminjaman'])->name('cetak.anggota-peminjaman');
        Route::get('cetak-anggota-pengembalian-terlambat', [CetakController::class, 'cetakAnggotaPengembalianTerlambat'])->name('cetak.anggota-pengembalian-terlambat');
        Route::get('cetak-buku-favorite', [CetakController::class, 'cetakBukuFavorite'])->name('cetak.buku-favorite');
        Route::get('cetak-pendaftaran-pengguna', [CetakController::class, 'cetakPendaftaranPengguna'])->name('cetak.pendaftaran-pengguna');
    });

    Route::middleware('admin.AdminBuku')->group(
        function () {
            Route::get('rak', TambahDataRak::class)->prefix('tambah-data')->name('tambah-data.rak');
            Route::get('kategori', TambahDataKategori::class)->prefix('tambah-data')->name('tambah-data.kategori');
            Route::get('buku', TambahDataBuku::class)->prefix('tambah-data')->name('tambah-data.buku');
            Route::get('cetak-kategori', [CetakController::class, 'cetakKategori'])->name('cetak.kategori');
            Route::get('cetak-buku', [CetakController::class, 'cetakBuku'])->name('cetak.buku');
        }
    );
    Route::middleware('admin.AdminTransaksi')->group(
        function () {
            Route::get('anggota', ListAnggota::class)->name('anggota')->middleware('admin.AdminTransaksi');
            Route::get('peminjaman-buku', ListPeminjamanBuku::class)->name('peminjaman-buku')->middleware('admin.AdminTransaksi');
            Route::get('pengembalian-buku', ListPengembalianBuku::class)->name('pengembalian-buku')->middleware('admin.AdminTransaksi');
            Route::get('cetak-anggota', [CetakController::class, 'cetakAnggota'])->name('cetak.anggota');
            Route::get('cetak-peminjaman', [CetakController::class, 'cetakPeminjaman'])->name('cetak.peminjaman');
            Route::get('cetak-pengembalian', [CetakController::class, 'cetakPengembalian'])->name('cetak.pengembalian');
        }
    );
});