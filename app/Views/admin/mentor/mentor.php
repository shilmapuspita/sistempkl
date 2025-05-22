<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="btn btn-gradient-blue p-2 shadow-sm">
          <i class="fa-solid fa-chalkboard-teacher"></i>
        </span> All Data Mentor
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
        <div class="card shadow-lg">
          <div class="card-body">
            <h2 class="card-title text-center text-primary fw-bold">MENTOR PKL/RISET PT INTI</h2>
            <br>

            <form action="<?= base_url('/mentor/upload') ?>" method="post" enctype="multipart/form-data" class="p-3 bg-white shadow rounded">
              <div class="mb-3">
                <label for="file_excel" class="form-label fw-bold text-primary">Upload File Excel</label>
                <input class="form-control border-primary" type="file" name="excel_file" id="excel_file" required>
              </div>
              <button type="submit" class="btn btn-gradient-blue px-4 py-2 d-flex align-items-center gap-2 shadow-sm">
                <i class="fa-solid fa-upload"></i> Upload
              </button>
            </form>

            <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
              <div class="position-relative w-50">
                <input type="text" id="searchInput" class="form-control shadow-sm ps-5 rounded-pill" placeholder="Cari mentor...">
                <i class="fa-solid fa-magnifying-glass position-absolute text-primary"
                  style="left: 15px; top: 50%; transform: translateY(-50%); font-size: 16px;"></i>
              </div>
              <a href="<?= base_url('/mentor/create') ?>" class="btn btn-gradient-blue btn-sm shadow-sm d-flex align-items-center gap-2">
                <i class="fa-solid fa-user-plus"></i> Add Data
              </a>
            </div>

            <div class="table-responsive">
              <table class="table table-hover table-striped table-bordered text-center shadow-sm" id="mentorTable">
                <thead class="bg-primary text-white">
                  <tr>
                    <th>No</th>
                    <th>ID MENTOR</th>
                    <th>NIP</th>
                    <th>NAMA</th>
                    <th>DIVISI</th>
                    <th>BAGIAN</th>
                    <th>NIP ATASAN</th>
                    <th>NAMA ATASAN</th>
                    <th>JABATAN ATASAN</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
                  <?php foreach ($pembimbing as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= esc($row['ID_PEMBIMBING']); ?></td>
                      <td><?= esc($row['NIP']); ?></td>
                      <td><?= esc($row['NAMA']); ?></td>
                      <td><?= esc($row['DIVISI']); ?></td>
                      <td><?= esc($row['BAGIAN']); ?></td>
                      <td><?= esc($row['NIP_ATASAN']); ?></td>
                      <td><?= esc($row['NAMA_ATASAN']); ?></td>
                      <td><?= esc($row['NAMA_JABATAN']); ?></td>
                      <td class="text-center">
                        <a href="<?= base_url('/mentor/edit/' . $row['ID_PEMBIMBING']) ?>"
                          class="btn btn-gradient-blue btn-sm shadow-sm"
                          data-bs-toggle="tooltip"
                          title="Edit">
                          <i class="bi bi-pencil-square fs-6 align-middle"></i>
                        </a>

                        <a href="<?= base_url('/mentor/delete/' . $row['ID_PEMBIMBING']) ?>"
                          class="btn btn-gradient-blue btn-sm shadow-sm"
                          data-bs-toggle="tooltip"
                          title="Delete"
                          onclick="return confirm('Yakin ingin menghapus data ini?')">
                          <i class="bi bi-trash3-fill fs-6 align-middle"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
              <?= $pager->links() ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- </div> -->

<!-- untuk search -->
<script>
  document.getElementById("searchInput").addEventListener("keyup", function() {
    let filter = this.value.toUpperCase();
    let rows = document.querySelector("#mentorTable tbody").rows;

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