
document.addEventListener("DOMContentLoaded", function () {
    const toast = document.getElementById("toast");
    let toastTimer;

    // Menampilkan Toast atau Snackbar
    function showToast(message) {
        if (!toast) return;

        toast.textContent = message;
        toast.classList.add("show");

        clearTimeout(toastTimer);

        toastTimer = setTimeout(function () {
            toast.classList.remove("show");
        }, 2500);
    }

    // EVENT 1: Mengubah menu navigasi aktif
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            navLinks.forEach(function (item) {
                item.classList.remove("active");
            });

            link.classList.add("active");
            showToast("Menu " + link.textContent.trim() + " dipilih");
        });
    });

    // EVENT 2: Memilih kartu fitur
    const features = document.querySelectorAll(".feature");
    const featureInfo = document.getElementById("featureInfo");

    const descriptions = {
        "Workout": "Workout membantu menjaga kebugaran melalui latihan teratur.",
        "Nutrition": "Nutrition membantu menjaga pola makan dan asupan kalori.",
        "Healthy Life": "Healthy Life membantu membangun kebiasaan sehat."
    };

    features.forEach(function (feature) {
        feature.addEventListener("click", function () {
            features.forEach(function (item) {
                item.classList.remove("selected");
            });

            feature.classList.add("selected");

            const name = feature.dataset.feature;
            featureInfo.textContent = descriptions[name];

            showToast("Kamu memilih " + name);
        });
    });

    // EVENT 3: Menampilkan dan menyembunyikan tips
    const tipsButton = document.getElementById("tipsButton");
    const tipsText = document.getElementById("tipsText");

    tipsButton.addEventListener("click", function () {
        tipsText.hidden = !tipsText.hidden;

        tipsButton.textContent = tipsText.hidden
            ? "Healthy Tips"
            : "Sembunyikan Tips";

        showToast(
            tipsText.hidden
                ? "Tips disembunyikan"
                : "Tips kesehatan ditampilkan"
        );
    });

    // POP-UP 1: Alert
    document.getElementById("infoButton")
        .addEventListener("click", function () {
            alert("Selamat datang di FitLife! Mulai hidup sehat dari sekarang.");
        });

    // POP-UP 2: Confirm
    document.getElementById("confirmButton")
        .addEventListener("click", function () {
            const result = confirm(
                "Apakah kamu siap memulai workout hari ini?"
            );

            if (result) {
                showToast("Semangat! Workout kamu dimulai.");
            } else {
                showToast("Kamu bisa memulai workout kapan saja.");
            }
        });

    // POP-UP 3: Prompt dan Web Storage
    const targetInfo = document.getElementById("targetInfo");

    function displayTarget() {
        const savedTarget = localStorage.getItem("fitlifeTarget");

        if (savedTarget && targetInfo) {
            targetInfo.textContent = "Target workout kamu: " + savedTarget;
        }
    }

    document.getElementById("promptButton")
        .addEventListener("click", function () {
            const target = prompt(
                "Masukkan target workout harian dalam menit:"
            );

            if (target === null) {
                showToast("Pengaturan target dibatalkan.");
                return;
            }

            const minutes = Number(target);

            if (target.trim() === "" || !Number.isFinite(minutes) ||
                minutes <= 0 || !Number.isInteger(minutes)) {
                alert("Masukkan target berupa angka bulat lebih dari 0.");
                return;
            }

            localStorage.setItem("fitlifeTarget", minutes + " menit");

            displayTarget();
            showToast("Target workout berhasil disimpan.");
        });

    // Get Started: konfirmasi sebelum menuju Login
    const getStarted = document.getElementById("getStarted");

    getStarted.addEventListener("click", function (event) {
        event.preventDefault();

        const result = confirm(
            "Apakah kamu ingin melanjutkan ke halaman Login?"
        );

        if (result) {
            showToast("Mengalihkan ke halaman Login...");

            setTimeout(function () {
                window.location.href = getStarted.href;
            }, 800);
        }
    });

    // PROMISE: Simulasi proses memuat data
    function loadWorkoutData() {
        return new Promise(function (resolve) {
            setTimeout(function () {
                resolve("Data aktivitas FitLife berhasil dimuat.");
            }, 1000);
        });
    }

    // ASYNC/AWAIT: Menjalankan proses asynchronous
    async function initializeFitLife() {
        try {
            const message = await loadWorkoutData();
            console.log(message);
        } catch (error) {
            console.error("Terjadi kesalahan:", error);
        }
    }

    initializeFitLife();

    // FETCH API: Mengambil tips kesehatan dari API publik
    const fetchButton = document.getElementById("fetchButton");
    const onlineTips = document.getElementById("onlineTips");

    fetchButton.addEventListener("click", async function () {
        fetchButton.disabled = true;
        fetchButton.textContent = "Memuat...";

        try {
            const response = await fetch(
                "https://jsonplaceholder.typicode.com/todos/1"
            );

            if (!response.ok) {
                throw new Error("Gagal mengambil data dari server.");
            }

            const data = await response.json();

            onlineTips.textContent =
                "Tips online: " + data.title;

            showToast("Data berhasil diambil dari API.");
        } catch (error) {
            onlineTips.textContent =
                "Data online tidak tersedia. Periksa koneksi internet.";

            showToast("Gagal mengambil data online.");
            console.error(error);
        } finally {
            fetchButton.disabled = false;
            fetchButton.textContent = "Muat Tips Online";
        }
    });

    // Memulihkan target dari Web Storage saat halaman dibuka
    displayTarget();
});
