<?php

$title = "Reset Password";
$css = "reset_password"; 
$script = "reset_password";
$checkAuth = false; 

?>
<?php
include_once __DIR__ . '/../components/header.php';
?>

<div class="container d-flex align-items-center justify-content-center vh-100" style="">
  <div class="col-md-5">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="card-body p-4">
        <h3 class="text-center mb-4">Reset Password</h3>

        <form method="POST" action="reset_password_process.php">
          <!-- token hidden -->
          <input type="hidden" name="token" value="">

          <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>

          <div class="mb-3">
            <label for="confirm_password" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
          </div>

          <button type="submit" class="btn gradient-gold w-100">Simpan Password</button>
        </form>

        <div class="text-center mt-3">
          <a href="login.php" class="text-decoration-none lnkLgn">Kembali ke Login</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div>
    <!-- <img src="../assets/img/rst_pass.jpg" alt="Reset Password Illustration" class="img-fluid position-absolute bottom-0 end-0" style="width: 300px; opacity: 0.1;"> -->
    <!-- <img src="../assets/img/rst_pass.jpg" alt="Reset Password Illustration" class="img-fluid position-absolute top-0 start-0" style="width: 300px; opacity: 0.1;"> -->
    <img src="../assets/img/reset_password/rst_pass.jpg" alt="Reset Password Illustration" class="img-fluid position-absolute top-50 start-50 translate-middle img2 d-none d-lg-block" style="">
    <img src="../assets/img/reset_password/rst_pass2" alt="Reset Password Illustration" class="img-fluid position-absolute top-50 start-50 translate-middle img1 d-none d-lg-block" style="">
    <img src="../assets/img/reset_password/rst_pass.jpg" alt="Reset Password Illustration" class="img-fluid position-absolute top-50 start-50 translate-middle img4 d-lg-none" style="">
    <img src="../assets/img/reset_password/rst_pass2" alt="Reset Password Illustration" class="img-fluid position-absolute top-50 start-50 translate-middle img5 d-lg-none " style="">
</div>

<?php
include_once __DIR__ . '/../components/footer.php';
?>