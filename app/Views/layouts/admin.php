<?php
if (!session()->has('logged_in')) {
  session()->start();
}
?>

<!DOCTYPE html>
<html lang="en">

<>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SISTEMPKL</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/ti-icons/css/themify-icons.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/css/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/font-awesome/css/font-awesome.min.css') ?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/font-awesome/css/font-awesome.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/custom.css') ?>">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= base_url('admin/assets/images/favicon.png') ?>" />
  <!-- custom css -->
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/custom.css') ?>">

  <!-- Font font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <a class="navbar-brand brand-logo" href="index.html">
        <img src="<?= base_url('admin/assets/images/inti_logo.png') ?>" alt="logo" style="max-width: 10g0px; height: auto; object-fit: contain;" />
      </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <div class="search-field d-none d-md-block">
        <form class="d-flex align-items-center h-100" action="#">
          <div class="input-group">
            <div class="input-group-prepend bg-transparent">
              <i class="input-group-text border-0 mdi mdi-magnify"></i>
            </div>
            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
          </div>
        </form>
      </div>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="nav-profile-image">
              <img src="<?= base_url('admin/assets/images/faces/akuu.jpg') ?>" alt="profile" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" />
              <span class="login-status online"></span>
            </div>
            <div class="nav-profile-text">
              <p>Dean Pramona </p>
            </div>
          </a>
          <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="#">
              <i class="bi bi-pencil me-2 text-success"></i> Edit Profil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= base_url('logout') ?>">
              <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
          </div>
        </li>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage == 'admin' || $currentPage == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('admin/dashboard'); ?>">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
          </a>
        </li>

        <li class="nav-item <?= (in_array($currentPage, ['siswa', 'siswaPKL', 'siswaRiset', 'intern'])) ? 'active' : '' ?>">
          <a class="nav-link <?= (in_array($currentPage, ['siswa', 'siswaPKL', 'siswaRiset', 'intern'])) ? 'active' : '' ?>"
            data-bs-toggle="collapse" href="#ui-basic"
            aria-expanded="<?= (in_array($currentPage, ['siswa', 'siswaPKL', 'siswaRiset', 'intern'])) ? 'true' : 'false' ?>"
            aria-controls="ui-basic">
            <span class="menu-title">PKL/RISET</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-clipboard-text menu-icon"></i>
          </a>
          <div class="collapse <?= (in_array($currentPage, ['siswa', 'siswaPKL', 'siswaRiset', 'intern'])) ? 'show' : '' ?>" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link <?= ($currentPage == 'siswaPKL') ? 'active' : '' ?>" href="<?= base_url('siswa/PKL'); ?>">
                  Data Siswa PKL
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($currentPage == 'siswaRiset') ? 'active' : '' ?>" href="<?= base_url('siswa/riset'); ?>">
                  Data Siswa Riset
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($currentPage == 'intern') ? 'active' : '' ?>" href="<?= base_url('/intern'); ?>">
                  Data Internship
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($currentPage == 'mentor') ? 'active' : '' ?>" href="<?= base_url('/mentor'); ?>">
            <span class="menu-title">Mentor</span>
            <i class="mdi mdi-account-tie menu-icon"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($currentPage == 'lembaga') ? 'active' : '' ?>" href="<?= base_url('/lembaga'); ?>">
            <span class="menu-title">Institution</span>
            <i class="mdi mdi-city menu-icon"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($currentPage == 'major') ? 'active' : '' ?>" href="<?= base_url('/major'); ?>">
            <span class="menu-title">Major</span>
            <i class="mdi mdi-book-open-variant menu-icon"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($currentPage == 'ka_urusan') ? 'active' : '' ?>" href="<?= base_url('/ka-urusan'); ?>">
            <span class="menu-title">KA. Urusan/Surat</span>
            <i class="mdi mdi-file-document menu-icon"></i>
          </a>
        </li>

      </ul>
    </nav>

    <!-- partial -->
    <?= $this->renderSection('content') ?>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('admin/assets/vendors/js/vendor.bundle.base.js') ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url('admin/assets/vendors/chart.js/chart.umd.js') ?>"></script>
    <script src="<?= base_url('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('admin/assets/js/off-canvas.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/misc.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/settings.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/todolist.js') ?>"></script>
    <script src="<?= base_url('admin/assets/js/jquery.cookie.js') ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= base_url('admin/assets/js/dashboard.js') ?>"></script>
    <!-- End custom js for this page -->
</body>

</html>