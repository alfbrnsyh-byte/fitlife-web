
<?php
date_default_timezone_set('Asia/Jakarta');

// Mulai session (jika belum berjalan)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Pulihkan session dari cookie "ingat saya" bila session sudah habis
if (!isset($_SESSION['nama']) && isset($_COOKIE['fitlife_user'])) {
    $_SESSION['nama'] = $_COOKIE['fitlife_user'];
}

// Fungsi bantu agar output aman dari XSS
function e($teks)
{
    return htmlspecialchars((string) $teks, ENT_QUOTES, 'UTF-8');
}

// Nama pengguna yang sedang login (null jika belum login)
$namaUser = $_SESSION['nama'] ?? null;

