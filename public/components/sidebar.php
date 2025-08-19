<!-- Main Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <span class="brand-text font-weight-light">
        <img src="/../assets/img/favico.png" alt="Luminara Logo" 
             style="height: 30px; width: auto; vertical-align: middle;"> Luminara
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" 
             class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="profile.php" class="d-block"><?= $user['name'] ?? 'Guest'; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" 
          data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Master Data -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Master Data
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="users.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="devices.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Devices</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Settings -->
        <li class="nav-item">
          <a href="settings.php" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Settings</p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>
