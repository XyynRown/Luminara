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

function startResendCountdown() {
  const btn = document.getElementById("resendBtn");
  let countdown = 120; // 1 menit

  // ganti style button
  btn.classList.remove("gradient-gold");
  btn.classList.add("btn-secondary");
  btn.disabled = true;

  // set tulisan awal
  btn.innerHTML = `<strong>Tunggu ${countdown}s</strong>`;

  // hitung mundur
  const timer = setInterval(() => {
    countdown--;
    btn.innerHTML = `<strong>Tunggu ${countdown}s</strong>`;

    if (countdown <= 0) {
      clearInterval(timer);
      // reset ke keadaan semula
      btn.classList.remove("btn-secondary");
      btn.classList.add("gradient-gold");
      btn.disabled = false;
      btn.innerHTML = "<strong>Kirim ulang</strong>";
    }
  }, 1000);
}
