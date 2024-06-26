<?php
require_once 'koneksi.php';
require_once 'mahasiswa.php';

// Membuat objek Mahasiswa
$mahasiswa = new Mahasiswa($koneksi);

// Contoh penggunaan metode dari Mahasiswa
$mahasiswa->tambahMahasiswa("2022150182", "Kunti Najma Jalia", "Teknik Informatika");
$mahasiswa->tambahMahasiswa("2022150186", "Joko Ahmad Widodo", "Teknik Arsitektur");
$mahasiswa->tampilkanSemuaMahasiswa();
$mahasiswa->cariMahasiswaByNim("2022150186");
$mahasiswa->cariMahasiswaByKeyword("Jalia");
$mahasiswa->updateMahasiswa("001", "Andi", "TI");
$mahasiswa->hapusMahasiswa("001");

// Tutup koneksi
$koneksi->close();
?>
