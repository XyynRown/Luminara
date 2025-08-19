function getRandomImage() {
  const num = Math.floor(Math.random() * 6) + 1;
  return `../assets/img/404/${num}.jpg`;
}

// Ganti src gambar saat halaman load
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("randomImg").src = getRandomImage();
});
