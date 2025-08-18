<?php

$title = "Register";
$css = "login"; 
$script = "register";

?>
<?php
include_once __DIR__ . '/../components/header.php';
?>


<div class="container-fluid">
  <div class="row">
    <!-- 3/4 bagian kiri -->
    <div class="flex-column col-lg-7 left-side d-none d-lg-flex align-items-center justify-content-center">
      <!-- Bisa isi gambar/banner kalau mau -->
      <img src="../assets/img/logo.png" alt="Login Banner" class="img-fluid w-50">
       <strong class="penjelasan">Lorem, ipsum dolor sit amet consectetur</strong>
       <br>

      <div id="carouselExampleFade" class="carousel slide carousel-fade w-75" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../assets/img/1.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../assets/img/2.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../assets/img/3.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>  

    <!-- REGISTER -->
    <div class="col-lg-5 p-4 right-side bg-white flex-column align-items-start justify-content-center">
      <div class="w-100">
        <div class="d-flex d-lg-none justify-content-center mb-4">
          <!-- Logo or Image for Mobile View -->
         <img src="../assets/img/logo.png" alt="Logo" style="width: 250px;" >
        </div>
        <h3><strong>Selamat datang!</strong></h3>
        <p class="text-secondary mb-4">Buat akun untuk melanjutkan</p>
        
        <form id="registerForm">
          <div class="col-auto">
            <label for="">Name</label>
          </div>
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" id="firstName" placeholder="First name" aria-label="First name">
            </div>
            <div class="col">
              <input type="text" class="form-control" id="lastName" placeholder="Last name" aria-label="Last name">
            </div>
          </div>

            <!-- Email -->
          <div class="col-auto">
            <label for="email">Email</label>
          </div>
          <div class="row">
            <div class="col">
              <input type="email" class="form-control" id="email" placeholder="example@xyz.com" aria-label="Email">
            </div>
            <div class="col">
              <button class="btn gradient-gold w-100" type="button">
                <strong>Check Email</strong>
              </button>
            </div>
          </div>

          <!-- Password -->
          <div class="col-auto">
            <label for="password" class="col-form-label">Password</label>
          </div>
          <div class="row g-3 align-items-center">
            <div class="input-group">
              <input type="password" class="form-control" id="password" placeholder="Password">
              <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                <i class="bi bi-eye"></i>
              </button>
            </div>
          </div>
          <!-- verifikasi password -->
          <div class="col-auto">
            <label for="verificationPassword" class="col-form-label">Verifikasi Password</label>
          </div>
          <div class="row g-3 align-items-center">
            <div class="input-group">
              <input type="password" class="form-control" id="verificationPassword" placeholder="Verifikasi Password">
              <button class="btn btn-outline-secondary" type="button" id="toggleVerificationPassword">
                <i class="bi bi-eye"></i>
              </button>
            </div>
          </div>
          
          <!-- Button -->
           <br><br>
          <button type="submit" class="btn gradient-gold w-100"><strong>Register</strong></button>
        </form>
        <hr>
        <p class="text-center mt-3 mb-0 d-flex">Sudah punya akun? 
          <a style="color:#f8c471;" href="login"> Login</a>
        </p>
      </div>
    </div>



<?php
include_once __DIR__ . '/../components/footer.php';
?>
