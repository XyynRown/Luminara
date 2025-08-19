let timeLeft = 5 * 60;

const timerEl = document.getElementById("timer");

function updateTimer() {
  const minutes = String(Math.floor(timeLeft / 60)).padStart(2, "0");
  const seconds = String(timeLeft % 60).padStart(2, "0");
  timerEl.textContent = `${minutes}:${seconds}`;

  if (timeLeft <= 0) {
    clearInterval(countdown);
    // lakukan aksi saat habis
    timerEl.textContent = "Waktu habis!";
    // contoh redirect otomatis:
    // window.location.href = "/selesai.html";
  }

  timeLeft--;
}

// langsung jalan saat halaman dibuka
updateTimer();
const countdown = setInterval(updateTimer, 1000);
