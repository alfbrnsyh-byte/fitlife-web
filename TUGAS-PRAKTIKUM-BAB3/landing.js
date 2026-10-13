```javascript
document.addEventListener("DOMContentLoaded", function () {

    const toast = document.getElementById("toast");
    let toastTimer;

    // Fungsi Toast/Snackbar
    function showToast(message) {
        toast.textContent = message;
        toast.classList.add("show");

        clearTimeout(toastTimer);

        toastTimer = setTimeout(function () {
            toast.classList.remove("show");
        }, 2500);
    }

    // DOM 1: Mengubah menu navigasi aktif
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach(function (link) {
        link.addEventListener("click", function () {

            navLinks.forEach(function (item) {
                item.classList.remove("active");
            });

            link.classList.add("active");

            showToast("Menu " + link.textContent + " dipilih");
        });
    });

    // DOM 2: Menampilkan informasi kartu fitur
    const features = document.querySelectorAll(".feature");
    const featureInfo = document.getElementById("featureInfo");

    const descriptions = {
        "Workout": "Workout membantu menjaga kebugaran melalui latihan teratur.",
        "Nutrition": "Nutrition membantu menjaga pola makan dan asupan kalori.",
        "Healthy Life": "Healthy Life membantu membangun kebiasaan sehat setiap hari."
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

    // DOM 3: Menampilkan dan menyembunyikan tips
    const tipsButton = document.getElementById("tipsButton");
    const tipsText = document.getElementById("tipsText");

    tipsButton.addEventListener("click", function () {

        tipsText.hidden = !tipsText.hidden;

        if (tipsText.hidden) {
            tipsButton.textContent = "Healthy Tips";
            showToast("Tips kesehatan disembunyikan");
        } else {
            tipsButton.textContent = "Sembunyikan Tips";
            showToast("Tips kesehatan ditampilkan");
        }
    });

    // DOM 4: Tombol Get Started
    const getStarted = document.getElementById("getStarted");

    getStarted.addEventListener("click", function (event) {
        event.preventDefault();

        showToast("Ayo mulai perjalanan sehatmu!");

        setTimeout(function () {
            window.location.href = getStarted.href;
        }, 800);
    });

});
```