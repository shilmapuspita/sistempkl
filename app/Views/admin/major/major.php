<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="btn btn-gradient-blue p-2 shadow-sm">
          <i class="fa-solid fa-chalkboard-teacher"></i>
        </span> All Data Major
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
            <h2 class="card-title text-center text-primary fw-bold">JURUSAN LEMBAGA PENDIDIKAN MITRA PT INTI</h2>
            <br>

            <!-- Pencarian & Add Button -->
            <div class="d-flex justify-content-between align-items-center mb-3">
              <input type="text" id="searchInput" class="form-control w-25 shadow-sm" placeholder="🔍 Cari mentor...">
              <a href="<?= base_url('/major/create') ?>" class="btn btn-gradient-blue btn-sm shadow-sm">
                <i class="fa-solid fa-user-plus"></i> Add Data
              </a>
            </div>
            <table class="table table-hover table-striped table-bordered text-center shadow-sm" id="mentorTable">
              <thead class="bg-primary text-white">
                <tr>
                  <th>No</th>
                  <th>ID Jurusan</th>
                  <th>Jurusan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
                <?php foreach ($jurusan as $row) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= esc($row['ID_JURUSAN']); ?></td>
                    <td><?= esc($row['NAMA_JURUSAN']); ?></td>
                    <td class="text-center">
                      <a href="<?= base_url('/major/edit/' . $row['ID_JURUSAN']) ?>"
                        class="btn btn-gradient-blue btn-sm shadow-sm"
                        data-bs-toggle="tooltip"
                        title="Edit">
                        <i class="bi bi-pencil-square fs-6 align-middle"></i>
                      </a>

                      <a href="<?= base_url('/major/delete/' . $row['ID_JURUSAN']) ?>"
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
          <!-- Menambahkan pagination -->
          <div class="d-flex justify-content-center mt-3">
            <?= $pager->links() ?>
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
<?= $this->endSection() ?>