<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="fa-solid fa-chalkboard-teacher"></i>
        </span> All Data Mahasiswa Internship
      </h3>
    </div>

    <!-- Notifikasi Flashdata -->
    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-check me-2"></i>
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-triangle-exclamation me-2"></i>
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title text-center text-primary fw-bold">DATA MAHASISWA INTERNSHIP PT INTI</h2>
            <br>

            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="position-relative w-50">
                <input type="text" id="searchInput" class="form-control shadow-sm ps-5 rounded-pill" placeholder="Cari siswa...">
                <i class="fa-solid fa-magnifying-glass position-absolute text-primary"
                  style="left: 15px; top: 50%; transform: translateY(-50%); font-size: 16px;"></i>
              </div>
              <a href="<?= base_url('siswa/intern/create') ?>" class="btn btn-gradient-blue btn-sm shadow-sm">
                <i class="fa-solid fa-user-plus"></i> Add Data
              </a>
            </div>
            <div class="table-responsive">
              <table class="table table-hover table-striped table-bordered text-center shadow-sm" id="siswaTable">
                <thead class="bg-primary text-white">
                  <tr>
                    <th>No</th>
                    <th>ID Mahasiswa</th>
                    <th>No. Surat</th>
                    <th>Batch</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Lembaga</th>
                    <th>Jurusan</th>
                    <th>Divisi</th>
                    <th>Bagian</th>
                    <th>Tanggal Awal</th>
                    <th>Tanggal Akhir</th>
                    <th>Status</th>
                    <th>Nama Pembimbing</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
                  <?php foreach ($datapmmb as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= esc($row['ID']); ?></td>
                      <td><?= esc($row['NO_SURAT']); ?></td>
                      <td><?= esc($row['BATCH']); ?></td>
                      <td><?= esc($row['TGL_DAFTAR']); ?></td>
                      <td><?= esc($row['NM_SISWA']); ?></td>
                      <td><?= esc($row['LEMBAGA']); ?></td>
                      <td><?= esc($row['JURUSAN']); ?></td>
                      <td><?= esc($row['DIVISI']); ?></td>
                      <td><?= esc($row['BAGIAN']); ?></td>
                      <td><?= esc($row['TGL_MULAI']); ?></td>
                      <td><?= esc($row['TGL_AKHIR']); ?></td>
                      <td><?= esc($row['STATUS']); ?></td>
                      <td><?= esc($row['NAMA_PEMB']); ?></td>
                      <td class="text-center">
                        <a href="<?= base_url('/intern/edit/' . $row['ID']) ?>" class="text-warning me-2 text-decoration-none" data-bs-toggle="tooltip" title="Edit">
                          <i class="bi bi-pencil-square fs-5 align-middle"></i>
                        </a>
                        <a href="<?= base_url('/intern/delete/' . $row['ID']) ?>" class="text-danger text-decoration-none" data-bs-toggle="tooltip" title="Delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                          <i class="bi bi-trash3-fill fs-5 align-middle"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- Menambahkan pagination -->
            <div class="d-flex justify-content-center mt-3">
              <?= $pager->links() ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->
<!-- untuk search -->
<script>
  document.getElementById("searchInput").addEventListener("keyup", function() {
    let filter = this.value.toUpperCase();
    let rows = document.querySelector("#siswaTable tbody").rows;

    for (let i = 0; i < rows.length; i++) {
      let txtValue = rows[i].textContent || rows[i].innerText;
      rows[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
    }
  });

  // Aktifkan tooltip Bootstrap
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
</script>
<?= $this->endSection() ?>