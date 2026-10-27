
<?php require 'includes/session.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitLife - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="page">

        <header class="navbar">
            <div class="logo">FITLIFE</div>

            <nav>
                <a href="#home" class="nav-link active">Home</a>
                <a href="#workout" class="nav-link">Workout</a>
                <a href="#nutrition" class="nav-link">Nutrition</a>
                <a href="#about" class="nav-link">About</a>
                <?php if ($namaUser): ?>
                    <a href="dashboard.php" class="nav-link user-link">Halo, <?= e($namaUser) ?></a>
                <?php endif; ?>
            </nav>
        </header>

        <section class="hero" id="home">
            <div class="hero-content">
                <h1>
                    LIVE HEALTHY,<br>
                    LIVE BETTER.
                </h1>

                <p>
                    Start your healthy journey<br>
                    with FitLife.
                </p>

                <a href="<?= $namaUser ? 'dashboard.php' : 'login.php' ?>" class="button" id="getStarted">
                    Get Started
                </a>

                <br><br>


<div class="popup-actions">
    <button class="tips-button" id="infoButton">
        Info FitLife
    </button>

    <button class="tips-button" id="confirmButton">
        Mulai Workout
    </button>

    <button class="tips-button" id="promptButton">
        Atur Target
    </button>

    <button class="tips-button" id="fetchButton">
        Muat Tips Online
    </button>
</div>

<p id="targetInfo"></p>
<p id="onlineTips"></p>

                <p id="tipsText" hidden>
                    Minum air yang cukup, makan makanan bergizi,
                    dan berolahraga secara teratur.
                </p>
            </div>

            <div class="banana">🍌🏋️</div>
        </section>

        <section class="why">
            <h2>WHY FITLIFE?</h2>

            <div class="features">

                <button class="feature" data-feature="Workout" id="workout">
                    <div class="feature-image">🏋️</div>
                    <h3>Workout</h3>
                </button>

                <button class="feature" data-feature="Nutrition" id="nutrition">
                    <div class="feature-image">🥗</div>
                    <h3>Nutrition</h3>
                </button>

                <button class="feature" data-feature="Healthy Life">
                    <div class="feature-image">❤️</div>
                    <h3>Healthy Life</h3>
                </button>

            </div>

            <p id="featureInfo">
                Pilih salah satu fitur FitLife.
            </p>
        </section>

        <section class="about" id="about">
            <h2>About FitLife</h2>
            <p>
                FitLife membantu pengguna membangun kebiasaan
                olahraga dan pola makan yang lebih sehat.
            </p>
        </section>

    </div>

    <div id="toast" class="toast" role="status" aria-live="polite"></div>

    <script src="landing.js"></script>
</body>
</html>

