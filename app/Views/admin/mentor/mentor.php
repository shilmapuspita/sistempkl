<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
    <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> All Data Mentor
              </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Mentor</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title" style="text-align: center;">MENTOR PKL/RISET PT INTI</h2>
            <br>
            <div class="d-flex justify-content-between mb-5">
              <a href="<?= base_url('/users/create') ?>" class="btn btn-info btn-sm">
              <i class="fa-solid fa-plus"></i> Add Data
              </a>
            </div>
            </p>
            <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
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
                    <td>
                      <a href="" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-edit"></i> Edit
                      </a>
                      <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                        <i class="fa-solid fa-trash"></i> Delete
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
<?= $this->endSection() ?>