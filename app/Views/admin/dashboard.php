<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<!-- Pesan sukses login -->
<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success'); ?>
  </div>
<?php endif; ?>

<div class="row p-0 m-0 proBanner" id="proBanner">
  <div class="col-md-12 p-0 m-0">
    <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
      <div class="ps-lg-3">
        <div class="d-flex align-items-center justify-content-between">
          <p class="mb-0 font-weight-medium me-3 buy-now-text">
            <?php if (session()->getFlashdata('success')) : ?>
              Congratulations, <?= esc(session()->get('admin_username')) ?>, you are logged in NOW!
            <?php endif; ?>
          </p>
        </div>
      </div>
      <div class="d-flex align-items-center justify-content-between">
        <a href="#"><i class="mdi mdi-home me-3 text-white"></i></a>
        <button id="bannerClose" class="btn border-0 p-0">
          <i class="mdi mdi-close text-white mr-0"></i>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="btn btn-gradient-blue p-2 shadow-sm">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
    </div>

    <!-- Statistik Dashboard -->
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Mahasiswa/Siswa PKL/Riset <i class="mdi mdi-chart-line mdi-24px float-end"></i></h4>
            <h2 class="mb-5">17,179</h2>
            <h6 class="card-text">Based On Data From 2007 To 2024</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Collaborating Institutions <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i></h4>
            <h2 class="mb-5">617 Institutions</h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h3 class="font-weight-normal mb-3">Mentor <i class="mdi mdi-diamond mdi-24px float-end"></i></h3>
            <h2 class="mb-5">190</h2>
            <h6 class="card-text">Experienced Mentors In Their Fields</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025 <a href="https://www.instagram.com/deanpramona" target="_blank">Dean Pramona</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
    </div>
  </footer>
</div>

<?= $this->endSection() ?>