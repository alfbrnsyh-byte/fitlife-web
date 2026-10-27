
<?php $menuAktif = $menuAktif ?? 'dashboard'; ?>
    <aside class="sidebar">

        <div class="dashboard-logo">
            FITLIFE
        </div>

        <a href="dashboard.php" class="menu <?= $menuAktif === 'dashboard' ? 'active' : '' ?>">
            <span>⌂</span>
            Dashboard
        </a>

        <a href="#" class="menu">
            <span>🏃</span>
            Workout
        </a>

        <a href="#" class="menu">
            <span>🥗</span>
            Nutrition
        </a>

        <a href="pemesanan.php" class="menu <?= $menuAktif === 'pemesanan' ? 'active' : '' ?>">
            <span>🛒</span>
            Pemesanan
        </a>

        <a href="#" class="menu">
            <span>📊</span>
            progress
        </a>

        <a href="#" class="menu">
            <span>⚙</span>
            Settings
        </a>

        <a href="logout.php" class="menu">
            <span>🚪</span>
            Logout
        </a>

    </aside>

