<?php

$title = "🤣Not Found";
$css = "not_found"; 
$script = "not_found";
$checkAuth = false; // Tidak perlu autentikasi untuk halaman verifikasi

?>
<?php
include_once __DIR__ . '/../components/header.php';
?>

<div class="d-flex flex-column align-items-center justify-content-center vh-100 text-center">
    <div class="mb-4 d-flex align-items-center">
        <!-- <img id="randomImg" src="../assets/img/404/1.jpg" alt="Logo" class="img-fluid me-3" style="width: 150px; height: 150px;">
        <h1 class="display-1 fw-bold text-disable">404</h1> -->
        <h1 class="display-1 fw-bold text-disable">4</h1>
        <img id="randomImg" src="../assets/img/404/1.jpg" alt="Logo" class="img-fluid" style="width: 90px; height: 90px;">
        <h1 class="display-1 fw-bold text-disable">4</h1>
    </div>

    <h2 class="mb-3">Oops! Halaman tidak ditemukan</h2>
    <p class="text-muted mb-4">
        Halaman yang kamu cari mungkin sudah dipindahkan atau tidak ada lagi.
    </p>
    <a href="/" class="btn" style="
    
        background: linear-gradient(90deg, #f8c471, #e49920, #f8c471);
        background-size: 200% 100%;
        background-position: left center;
        color: white;
        transition: background-position 0.5s ease-in-out, color 0.3s ease-in-out;


    
    ">
        <i class="fas fa-home"></i> Kembali ke beranda
    </a>
</div>




<?php
include_once __DIR__ . '/../components/footer.php';
?>