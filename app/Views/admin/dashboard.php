<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success position-absolute p-2 px-3 shadow-sm"
    style="top: 25px; left: 330px; z-index: 1050; font-size: 14px; font-weight: bold;">
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
        <div class="card bg-inti-gradient card-img-holder">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h3 class="card-text">Mahasiswa/Siswa Aktif PKL/Riset</h3>
            <h2 class="mb-3"><?= number_format($totalSiswa) ?></h2>
            <h6 class="card-text"> Students Currently Active as of <?= date('F d, Y') ?></h6>

          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-inti-gradient card-img-holder">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h3 class="card-text">Collaborating Institutions <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i></h3>
            <br><h3 class="mb-3"><?= number_format($totalInstitusi) ?>
            <br>
             Institutions</h3>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-inti-gradient card-img-holder">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h2 class="card-text">Mentor <i class="mdi mdi-diamond mdi-24px float-end"></i></h2>
            <br>
            <h2 class="mb-3"><?= number_format($totalMentor) ?></h2>
            <h5 class="card-text">Experienced Mentors In Their Fields</h5>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <!-- Filter Bulan & Tahun -->
            <form method="get" action="<?= base_url('admin/dashboard') ?>" class="mb-4">
              <div class="d-flex flex-wrap align-items-end gap-3">
                <div>
                  <label for="bulan" class="font-weight-bold">Pilih Bulan :</label>
                  <select name="bulan" id="bulan" class="form-control" style="min-width: 150px;">
                    <?php
                    $namaBulan = [
                      '01' => 'Januari',
                      '02' => 'Februari',
                      '03' => 'Maret',
                      '04' => 'April',
                      '05' => 'Mei',
                      '06' => 'Juni',
                      '07' => 'Juli',
                      '08' => 'Agustus',
                      '09' => 'September',
                      '10' => 'Oktober',
                      '11' => 'November',
                      '12' => 'Desember'
                    ];
                    foreach ($namaBulan as $num => $nama) {
                      $selected = ($bulan ?? date('m')) === $num ? 'selected' : '';
                      echo "<option value='$num' $selected>$nama</option>";
                    }
                    ?>
                  </select>
                </div>
                <div>
                  <label for="tahun" class="font-weight-bold">Pilih Tahun :</label>
                  <select name="tahun" id="tahun" class="form-control" style="min-width: 150px;">
                    <?php
                    $currentYear = date('Y');
                    foreach ($list_tahun as $year) {
                      $selected = ($tahun ?? $currentYear) == $year ? 'selected' : '';
                      echo "<option value='$year' $selected>$year</option>";
                    }
                    ?>
                  </select>
                </div>
                <div>
                  <button type="submit" class="btn btn-gradient-blue btn-sm shadow-sm d-flex align-items-center gap-2 px-4 py-2">
                    <i class="mdi mdi-magnify"></i> Tampilkan
                  </button>
                </div>

              </div>
            </form>

            <!-- Chart Canvas -->
            <div style="overflow-x: auto;">
              <canvas id="barChart" height="400"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Kalender dan To Do List -->
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
                <button class="add btn btn-gradient-blue font-weight-bold todo-list-add-btn" id="add-task">Add</button>
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
  </div>

  <script src="<?= base_url('admin/assets/js/chart.min.js') ?>"></script>
  <script>
    const ctx = document.getElementById('barChart').getContext('2d');

    const originalLabels = <?= json_encode($divisi_bagian) ?>;
    const shortenedLabels = originalLabels.map(label => {
      return label.length > 12 ? label.substring(0, 12) + '…' : label;
    });

    const dataPKL = <?= json_encode($pkl) ?>;
    const dataRiset = <?= json_encode($riset) ?>;
    const dataIntern = <?= json_encode($intern) ?>;

    const allValues = dataPKL.concat(dataRiset, dataIntern);
    const maxVal = Math.max(...allValues);
    const stepSize = 5;
    const minStepCount = 4;
    const calculatedMaxY = Math.max(Math.ceil(maxVal / stepSize) * stepSize, stepSize * minStepCount);

    const barChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: shortenedLabels,
        datasets: [{
            label: 'PKL',
            data: dataPKL,
            backgroundColor: '#2D5FFE',
            borderRadius: 6
          },
          {
            label: 'Riset',
            data: dataRiset,
            backgroundColor: '#16A8FA',
            borderRadius: 6
          },
          {
            label: 'Internship',
            data: dataIntern,
            backgroundColor: '#00F2F6',
            borderRadius: 6
          }
        ]
      },
      options: {
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    y: {
      stacked: true,
      beginAtZero: true,
      max: calculatedMaxY,
      ticks: {
        stepSize: stepSize,
        callback: function(value) {
          return value;
        },
        color: '#2c3e50',
        font: {
          family: 'Trebuchet MS',
          size: 12
        }
      },
      grid: {
        color: '#e0e0e0'
      }
    },
    x: {
      stacked: true,
      ticks: {
        color: '#2c3e50',
        font: {
          family: 'Trebuchet MS',
          size: 12
        }
      },
      grid: {
        display: false
      }
    }
  },
  plugins: {
    tooltip: {
      titleFont: {
        family: 'Trebuchet MS',
        size: 14
      },
      bodyFont: {
        family: 'Trebuchet MS',
        size: 13
      },
      callbacks: {
        title: function(context) {
          return originalLabels[context[0].dataIndex];
        },
        label: function(context) {
          return `${context.dataset.label}: ${context.parsed.y}`;
        }
      }
    },
    legend: {
      position: 'top',
      labels: {
        color: '#2c3e50',
        font: {
          family: 'Trebuchet MS',
          size: 13
        }
      }
    },
    title: {
      display: true,
      text: 'Jumlah Mahasiswa/Siswa Aktif per Divisi & Bagian (<?= $bulan ?>/<?= $tahun ?>)',
      font: {
        family: 'Trebuchet MS',
        size: 18,
        weight: 'bold'
      },
      color: '#2C3E50'
    }
  }
}

    });
  </script>

  <?= $this->endSection() ?>