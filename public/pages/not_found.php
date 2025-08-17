<?php

$title = "Not Found";
$css = "not_found"; 
$script = "not_found";

?>
<?php
include_once __DIR__ . '/../components/header.php';
?>

<div class="d-flex flex-column align-items-center justify-content-center vh-100 text-center">
    <h1 class="display-1 fw-bold text-disable">404</h1>
    <h2 class="mb-3">Oops! Halaman tidak ditemukan</h2>
    <p class="text-muted mb-4">
        Halaman yang kamu cari mungkin sudah dipindahkan atau tidak ada lagi.
    </p>
</div>



<?php
include_once __DIR__ . '/../components/footer.php';
?>