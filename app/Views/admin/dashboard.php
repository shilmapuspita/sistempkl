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
  <!-- Bar Chart + Filter Bulan/Tahun -->
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Chart Mahasiswa/Siswa Aktif per Divisi & Bagian</h4>

        <!-- Filter Bulan & Tahun -->
        <form method="get" action="<?= base_url('admin/dashboard') ?>" class="mb-4">
          <div class="row">
            <div class="col-md-3">
              <label for="bulan">Pilih Bulan:</label>
              <select name="bulan" id="bulan" class="form-control">
                <?php
                $namaBulan = [
                  '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
                  '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
                  '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                ];
                foreach ($namaBulan as $num => $nama) {
                  $selected = ($bulan ?? date('m')) === $num ? 'selected' : '';
                  echo "<option value='$num' $selected>$nama</option>";
                }
                ?>
              </select>
            </div>

            <div class="col-md-3">
              <label for="tahun">Pilih Tahun:</label>
              <select name="tahun" id="tahun" class="form-control">
                <?php
                $currentYear = date('Y');
                for ($year = $currentYear; $year >= 2020; $year--) {
                  $selected = ($tahun ?? date('Y')) == $year ? 'selected' : '';
                  echo "<option value='$year' $selected>$year</option>";
                }
                ?>
              </select>
            </div>

            <div class="col-md-2 d-flex align-items-end">
              <button type="submit" class="btn btn-gradient-primary w-100">Tampilkan</button>
            </div>
          </div>
        </form>

        <!-- Chart Canvas -->
        <canvas id="barChart" height="230"></canvas>
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

<script src="<?= base_url('admin/assets/js/chart.min.js') ?>"></script>
<script>
  const ctx = document.getElementById('barChart').getContext('2d');
  const barChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode(array_column($pkl, 'divisi_bagian')) ?>,
      datasets: [
        {
          label: 'PKL',
          data: <?= json_encode(array_column($pkl, 'jumlah')) ?>,
          backgroundColor: 'rgba(54, 162, 235, 0.7)',
        },
        {
          label: 'Riset',
          data: <?= json_encode(array_column($riset, 'jumlah')) ?>,
          backgroundColor: 'rgba(255, 206, 86, 0.7)',
        },
        {
          label: 'Internship',
          data: <?= json_encode(array_column($intern, 'jumlah')) ?>,
          backgroundColor: 'rgba(75, 192, 192, 0.7)',
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Jumlah Mahasiswa/Siswa Aktif per Divisi & Bagian (<?= $bulan ?>/<?= $tahun ?>)'
        },
        legend: {
          position: 'top',
        }
      },
      scales: {
        x: {
          stacked: true
        },
        y: {
          stacked: true,
          beginAtZero: true
        }
      }
    }
  });
</script>


<?= $this->endSection() ?>