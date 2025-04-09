<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success position-absolute p-2 px-3 shadow-sm"
    style="top: 25px; left: 230px; z-index: 1050; font-size: 14px; font-weight: bold;">
    <?= session()->getFlashdata('success'); ?>
  </div>
<?php endif; ?>


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
            <h2 class="mb-3"><?= number_format($totalSiswa) ?></h2>
            <h6 class="card-text">Based On Data From 2007 To 2024</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Collaborating Institutions <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i></h4>
            <h2 class="mb-3"><?= number_format($totalInstitusi) ?> Institutions</h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h3 class="font-weight-normal mb-3">Mentor <i class="mdi mdi-diamond mdi-24px float-end"></i></h3>
            <h2 class="mb-3"><?= number_format($totalMentor) ?></h2>
            <h6 class="card-text">Experienced Mentors In Their Fields</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container d-flex justify-content-center">
    <div class="row w-100">
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body p-0 d-flex justify-content-center">
            <div id="inline-datepicker" class="datepicker datepicker-custom"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-dark text-center">Todo List</h4>
            <div class="add-items d-flex">
              <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
              <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
            </div>
            <div class="list-wrapper">
              <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025 <a href="https://www.instagram.com/deanpramona?igsh=b2k2bXI2amVub2J5" target="_blank">Dean Pramona</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
    </div>
  </footer>
</div>

<?= $this->endSection() ?>