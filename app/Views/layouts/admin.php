<?php
if (!session()->has('logged_in')) {
  session()->start();
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SISTEMPKL</title>

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/ti-icons/css/themify-icons.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/css/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/custom.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/style.css') ?>">

  <link rel="shortcut icon" href="<?= base_url('admin/assets/images/favicon.png') ?>" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- ✅ Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <style>
    .sidebar .nav .nav-link {
      display: flex !important;
      align-items: center !important;
      justify-content: space-between;
      padding: 10px 15px;
      gap: 10px;
    }

    .sidebar .nav .nav-link>div {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .sidebar .nav .menu-icon {
      font-size: 18px;
      min-width: 20px;
      text-align: center;
    }

    .sidebar .nav .menu-title {
      font-size: 14px;
      white-space: nowrap;
    }

    .sidebar .nav .menu-arrow {
      font-size: 12px;
      margin-left: auto;
    }
  </style>
</head>

<body>
  <div class="container-scroller">

    <!-- NAVBAR -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <a class="navbar-brand brand-logo" href="<?= base_url('/') ?>">
          <img src="<?= base_url('admin/assets/images/inti_logo.png') ?>" alt="logo" style="max-width: 100px; height: auto; object-fit: contain;" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link d-flex align-items-center" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-image">
                <img src="<?= base_url(session('foto') && session('foto') !== 'default.jpg' ? 'uploads/profile_pictures/' . session('foto') : 'admin/assets/images/default.jpg') ?>" alt="Foto Profil" class="profile-img" />
              </div>
              <div class="nav-profile-text ms-2 d-flex align-items-center">
                <p class="mb-0"><?= esc(session('username')) ?></p>
              </div>
              <i class="fa-solid fa-chevron-down text-primary"></i>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="<?= base_url('admin/profile') ?>">
                <i class="bi bi-pencil me-2 text-success"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= base_url('logout') ?>">
                <i class="mdi mdi-logout me-2 text-primary"></i> Signout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

    <!-- SIDEBAR + MAIN -->
    <div class="container-fluid page-body-wrapper">

      <!-- sidebar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav" style="margin-top: 30px;">

          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('admin/dashboard'); ?>">
              <div>
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </div>
            </a>
          </li>

          <li class="nav-item <?= (in_array($currentPage, ['siswa', 'siswaPKL', 'siswaRiset', 'intern'])) ? 'active' : '' ?>">
            <a class="nav-link <?= (in_array($currentPage, ['siswa', 'siswaPKL', 'siswaRiset', 'intern'])) ? 'active' : '' ?>"
              data-bs-toggle="collapse" href="#ui-basic"
              aria-expanded="<?= (in_array($currentPage, ['siswa', 'siswaPKL', 'siswaRiset', 'intern'])) ? 'true' : 'false' ?>"
              aria-controls="ui-basic">
              <div>
                <i class="mdi mdi-clipboard-text menu-icon"></i>
                <span class="menu-title">PKL/RISET</span>
              </div>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?= (in_array($currentPage, ['siswa', 'siswaPKL', 'siswaRiset', 'intern'])) ? 'show' : '' ?>" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link <?= ($currentPage == 'siswaPKL') ? 'active' : '' ?>" href="<?= base_url('siswa/PKL'); ?>">Data Siswa PKL</a></li>
                <li class="nav-item"><a class="nav-link <?= ($currentPage == 'siswaRiset') ? 'active' : '' ?>" href="<?= base_url('siswa/riset'); ?>">Data Siswa Riset</a></li>
                <li class="nav-item"><a class="nav-link <?= ($currentPage == 'intern') ? 'active' : '' ?>" href="<?= base_url('/intern'); ?>">Data Internship</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'mentor') ? 'active' : '' ?>" href="<?= base_url('/mentor'); ?>">
              <div>
                <i class="mdi mdi-account-tie menu-icon"></i>
                <span class="menu-title">Mentor</span>
              </div>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'lembaga') ? 'active' : '' ?>" href="<?= base_url('/lembaga'); ?>">
              <div>
                <i class="mdi mdi-city menu-icon"></i>
                <span class="menu-title">Institution</span>
              </div>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'major') ? 'active' : '' ?>" href="<?= base_url('/major'); ?>">
              <div>
                <i class="mdi mdi-book-open-variant menu-icon"></i>
                <span class="menu-title">Major</span>
              </div>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'ka_urusan') ? 'active' : '' ?>" href="<?= base_url('/ka-urusan'); ?>">
              <div>
                <i class="mdi mdi-file-document menu-icon"></i>
                <span class="menu-title">KA. Urusan/Surat</span>
              </div>
            </a>
          </li>

        </ul>
      </nav>

      <?= $this->renderSection('content') ?>

      <!-- FOOTER -->
      <footer class="footer">
        <div class="container-fluid d-flex flex-column flex-md-row justify-content-between align-items-center">
          <span>© 2025 Your Website</span>
          <a href="#">Contact</a>
        </div>
      </footer>
    </div>
  </div>


  <!-- script js -->
  <script src="<?= base_url('admin/assets/vendors/js/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('admin/assets/vendors/chart.js/chart.umd.js') ?>"></script>
  <script src="<?= base_url('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/misc.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/settings.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/todolist.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/jquery.cookie.js') ?>"></script>
  <script src="<?= base_url('admin/assets/js/dashboard.js') ?>"></script>

  <!-- ✅ jQuery (wajib sebelum Select2 JS) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- ✅ Select2 JS -->
  <script>
    $(document).ready(function() {
      $('#exampleInputDivisi').select2({
        placeholder: "Pilih Divisi",
        width: '100%'
      });

      $('#exampleInputBagian').select2({
        placeholder: "Pilih Bagian",
        width: '100%'
      });
    });
  </script>

</body>

</html>