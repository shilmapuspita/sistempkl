<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> All Data Mahasiswa/Siswa
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Institutions</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title" style="text-align: center;">DATA PESERTA PKL (MAHASISWA & SISWA)</h2>
                    <br>
                    <div class="d-flex justify-content-between mb-5">
                        <a href="<?= base_url('/users/create') ?>" class="btn btn-info btn-sm">
                            <i class="fa-solid fa-plus"></i> Add Data
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID PKL</th>
                                    <th>NAMA SISWA</th>
                                    <th>TANGGAL</th>
                                    <th>JENIS PKL</th>
                                    <th>LEMBAGA</th>
                                    <th>JURUSAN</th>
                                    <th>DIVISI</th>
                                    <th>BAGIAN</th>
                                    <th>TANGGAL AWAL</th>
                                    <th>TANGGAL AKHIR</th>
                                    <th>NAMA PEMBIMBING</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
                                <?php foreach ($datasiswa as $siswa) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= esc($siswa['ID_PKL']) ?></td>
                                        <td><?= esc($siswa['NM_SISWA']) ?></td>
                                        <td><?= esc($siswa['TANGGAL']) ?></td>
                                        <td><?= esc($siswa['JENIS_PKL']) ?></td>
                                        <td><?= esc($siswa['LEMBAGA']) ?></td>
                                        <td><?= esc($siswa['JURUSAN']) ?></td>
                                        <td><?= esc($siswa['DIVISI']) ?></td>
                                        <td><?= esc($siswa['BAGIAN']) ?></td>
                                        <td><?= esc($siswa['TGL_AWAL']) ?></td>
                                        <td><?= esc($siswa['TGL_AKHIR']) ?></td>
                                        <td><?= esc($siswa['NAMA_PEMB']) ?></td>
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