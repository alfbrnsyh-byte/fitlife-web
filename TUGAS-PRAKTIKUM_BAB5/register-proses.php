
<?php
require 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitLife - Hasil Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="auth-page">

        <div class="register-box">

            <div class="auth-logo">
                FITLIFE
            </div>

            <h2>Data Registrasi</h2>

            <div class="hasil-box">
            <?php
            if (isset($_POST['register'])) {
                $nama     = $_POST['nama'];
                $email    = $_POST['email'];
                $password = $_POST['password'];

                echo
                'Nama : ' . e($nama) .
                '<br> Email : ' . e($email) .
                '<br> Password : ' . str_repeat('*', strlen($password));
            } else {
                echo 'Belum ada data. Silakan isi form registrasi.';
            }
            ?>
            </div>

            <p class="account-text">
                <a href="register.php">Kembali</a> |
                <a href="login.php">Ke Login</a>
            </p>

        </div>

    </div>

</body>
</html>

