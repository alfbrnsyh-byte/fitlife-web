
<?php
require 'includes/session.php';

// Halaman ini hanya untuk pengguna yang sudah login
if (!$namaUser) {
    header('Location: login.php');
    exit;
}

// Sapaan sesuai jam
$jam = (int) date('G');
if ($jam < 11) {
    $sapaan = 'Good Morning';
} elseif ($jam < 15) {
    $sapaan = 'Good Afternoon';
} elseif ($jam < 19) {
    $sapaan = 'Good Evening';
} else {
    $sapaan = 'Good Night';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitLife - Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">

    <!-- SIDEBAR -->

    <?php $menuAktif = 'dashboard'; include 'includes/sidebar.php'; ?>


    <!-- CONTENT -->

    <main class="dashboard-content">

        <h1>
            <?= $sapaan ?>, <?= e($namaUser) ?>
        </h1>


        <!-- STATISTIC -->

        <div class="stats">

            <div class="stat-card">
                <strong>65 Kg</strong>
                <span>Weight</span>
            </div>

            <div class="stat-card">
                <strong>1,800</strong>
                <span>Calories</span>
            </div>

        </div>


        <!-- WORKOUT -->

        <section class="dashboard-section">

            <h2>Today's Workout</h2>

            <div class="workout-card">

                <div class="workout-time">
                    <strong>30</strong>
                    <span>Minutes</span>
                </div>

                <div class="workout-image">
                    🏃‍♂️ 🏃‍♀️ 🏋️
                </div>

                <button class="start-button">
                    START
                </button>

            </div>

        </section>


        <!-- NUTRITION -->

        <section class="dashboard-section">

            <h2>Today's Nutrition</h2>

            <div class="nutrition-bar">

                <div class="nutrition-progress"></div>

            </div>

        </section>

    </main>

</div>

</body>
</html>

