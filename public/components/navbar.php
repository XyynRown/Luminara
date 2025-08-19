<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <!-- Tombol untuk toggle sidebar -->
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="contact.php" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-header">3 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 1 new message
        </a>
      </div>
    </li>

    <!-- User Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="profile.php" class="dropdown-item">Profile</a>
        <div class="dropdown-divider"></div>
        <a href="logout.php" class="dropdown-item text-danger">Logout</a>
      </div>
    </li>
  </ul>
</nav>
