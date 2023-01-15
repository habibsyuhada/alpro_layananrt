<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="assets/index3.html" class="brand-link">
    <!-- <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light">Layanan RT</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php if($_SESSION['level'] == 'RT'): ?>
        <li class="nav-item">
          <a href="index.php?page=user_list" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              User
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=masyarakat_list" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Masyarakat
            </p>
          </a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a href="index.php?page=surat_pengantar_list" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Surat Pengantar
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="logout-process.php" class="nav-link" onclick="return confirm('Are You sure to Logout?')">
            <i class="nav-icon fas fa-power-off"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>