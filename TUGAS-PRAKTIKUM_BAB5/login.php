
<?php
require 'includes/session.php';

// Jika sudah login, langsung ke dashboard
if ($namaUser) {
    header('Location: dashboard.php');
    exit;
}

$errors = [];
$nama   = '';
$email  = '';

if (isset($_POST['login'])) {
    $nama     = trim($_POST['nama'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nama === '') {
        $errors[] = 'Nama wajib diisi.';
    } elseif (strlen($nama) > 30) {
        $errors[] = 'Nama maksimal 30 karakter.';
    }

    if ($email === '') {
        $errors[] = 'Email wajib diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Format email tidak valid.';
    }

    if ($password === '') {
        $errors[] = 'Password wajib diisi.';
    }

    if (empty($errors)) {
        // Simpan nama ke SESSION
        $_SESSION['nama'] = $nama;

        // Jika "Ingat saya" dicentang, simpan juga ke COOKIE (7 hari)
        if (!empty($_POST['ingat'])) {
            setcookie('fitlife_user', $nama, time() + (86400 * 7), '/');
        }

        header('Location: dashboard.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitLife - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="auth-page">

        <div class="login-box">

            <div class="auth-logo">
                FITLIFE
            </div>

            <h2>Welcome Back !</h2>

            <?php if (isset($_GET['logout'])): ?>
                <div class="pesan info">Kamu berhasil logout. Session dan cookie sudah dihapus.</div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="pesan error">
                    <ul>
                        <?php foreach ($errors as $pesan): ?>
                            <li><?= e($pesan) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="login.php" method="post">

                <label>Nama</label>
                <input type="text" name="nama" value="<?= e($nama) ?>">

                <label>Email</label>
                <input type="email" name="email" value="<?= e($email) ?>">

                <label>Password</label>
                <input type="password" name="password">

                <label class="ingat">
                    <input type="checkbox" name="ingat" value="1"> Ingat saya
                </label>

                <button type="submit" name="login" class="auth-button">
                    Login
                </button>

            </form>

            <p class="account-text">
                Don't have an account?
                <a href="register.php">Register</a>
            </p>

        </div>

    </div>

</body>
</html>

