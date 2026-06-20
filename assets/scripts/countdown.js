const startDate = new Date("2026-06-15T08:00:00").getTime();
const endDate   = new Date("2026-06-21T08:00:00").getTime();

function updateCountdown() {
    const now = new Date().getTime();

    if (now >= endDate) {
        document.querySelector(".countdown-container").innerHTML = "<p>Événement terminé !</p>";
        clearInterval(interval);
        return;
    }

    if (now >= startDate) {
        document.querySelector(".countdown-container").innerHTML = "<p>Événement en cours</p>";
        return;
    }

    const distance = startDate - now;

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").textContent = String(days).padStart(2, '0');
    document.getElementById("hours").textContent = String(hours).padStart(2, '0');
    document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
    document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');
}

const interval = setInterval(updateCountdown, 1000);
updateCountdown();