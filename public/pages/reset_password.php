<?php

$title = "Reset Password";
$css = "reset_password"; 
$script = "resetPassword";
$checkAuth = false; // Tidak perlu autentikasi untuk halaman verifikasi

?>
<?php
include_once __DIR__ . '/../components/header.php';
?>

    <!-- Form to reset password -->
    <h1>Reset Password</h1>
    <form id="resetPasswordForm">
        <input id="email" type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Kirim Email</button>
    </form>

<?php
include_once __DIR__ . '/../components/footer.php';
?>
