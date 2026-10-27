
<?php
session_start();

// Hapus semua variabel session lalu hancurkan session
session_unset();
session_destroy();

// Hapus cookie dengan mengatur waktu kedaluwarsa ke masa lalu
setcookie('fitlife_user', '', time() - 3600, '/');

header('Location: login.php?logout=1');
exit;

