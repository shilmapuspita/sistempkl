<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="btn btn-gradient-blue p-2 shadow-sm">
                    <i class="fa-solid fa-users"></i>
                </span> All Data Mahasiswa/Siswa
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

        <form method="get" action="<?= base_url('siswa/PKL') ?>" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" placeholder="Cari berdasarkan nama..." value="<?= esc($_GET['nama_siswa'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="lembaga">Lembaga</label>
                    <input type="text" name="lembaga" id="lembaga" class="form-control" placeholder="Nama lembaga..." value="<?= esc($_GET['lembaga'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Nama jurusan..." value="<?= esc($_GET['jurusan'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="divisi">Divisi</label>
                    <input type="text" name="divisi" id="divisi" class="form-control" placeholder="Nama divisi..." value="<?= esc($_GET['divisi'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="bagian">Bagian</label>
                    <input type="text" name="bagian" id="bagian" class="form-control" placeholder="Nama bagian..." value="<?= esc($_GET['bagian'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="pembimbing">Nama Pembimbing</label>
                    <input type="text" name="pembimbing" id="pembimbing" class="form-control" placeholder="Nama pembimbing..." value="<?= esc($_GET['pembimbing'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="<?= esc($_GET['tanggal_mulai'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="tanggal_akhir">Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="<?= esc($_GET['tanggal_akhir'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="tanggal_daftar">Tanggal Daftar</label>
                    <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control" value="<?= esc($_GET['tanggal_daftar'] ?? '') ?>">
                </div>
                <div class="col-md-12 d-flex mt-3">
                    <button type="submit" class="btn text-white flex-grow-1 me-2"
                        style="background-color: #4A90E2; border-color: #4A90E2;"
                        onmouseover="this.style.backgroundColor='#357ABD'; this.style.borderColor='#357ABD';"
                        onmouseout="this.style.backgroundColor='#4A90E2'; this.style.borderColor='#4A90E2';">
                        Set Filter
                    </button>
                    <a href="<?= base_url('siswa/PKL') ?>" class="btn text-white flex-grow-1"
                        style="background-color: #B0B0B0; border-color: #B0B0B0;"
                        onmouseover="this.style.backgroundColor='#909090'; this.style.borderColor='#909090';"
                        onmouseout="this.style.backgroundColor='#B0B0B0'; this.style.borderColor='#B0B0B0';">
                        Clear Filter
                    </a>
                </div>



            </div>
        </form>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center text-primary fw-bold">DATA PESERTA PKL (MAHASISWA & SISWA)</h2>
                        <br>

                        <!-- Pencarian & Add Button -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="position-relative w-50">
                                <input type="text" id="searchInput" class="form-control shadow-sm ps-5 rounded-pill" placeholder="Cari siswa...">
                                <i class="fa-solid fa-magnifying-glass position-absolute text-primary"
                                    style="left: 15px; top: 50%; transform: translateY(-50%); font-size: 16px;"></i>
                            </div>
                            <a href="<?= base_url('siswa/PKL/create') ?>" class="btn btn-gradient-blue btn-sm shadow-sm">
                                <i class="fa-solid fa-user-plus"></i> Add Data
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered text-center shadow-sm" id="siswaTable">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>ID PKL</th>
                                        <th>NAMA SISWA</th>
                                        <th>TANGGAL DAFTAR</th>
                                        <th>JENIS PKL</th>
                                        <th>LEMBAGA</th>
                                        <th>JURUSAN</th>
                                        <th>DIVISI</th>
                                        <th>BAGIAN</th>
                                        <th>TANGGAL AWAL</th>
                                        <th>TANGGAL AKHIR</th>
                                        <th>STATUS</th>
                                        <th>NAMA PEMBIMBING</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 + (10 * ($currentPage - 1)); ?>
                                    <?php foreach ($datasiswa as $siswa) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= esc($siswa['ID']) ?></td>
                                            <td><?= esc($siswa['NM_SISWA']) ?></td>
                                            <td><?= esc($siswa['TGL_DAFTAR']) ?></td>
                                            <td><?= esc($siswa['JENIS_PKL']) ?></td>
                                            <td><?= esc($siswa['LEMBAGA']) ?></td>
                                            <td><?= esc($siswa['JURUSAN']) ?></td>
                                            <td><?= esc($siswa['DIVISI']) ?></td>
                                            <td><?= esc($siswa['BAGIAN']) ?></td>
                                            <td><?= esc($siswa['TGL_MULAI']) ?></td>
                                            <td><?= date('d-m-Y', strtotime($siswa['TGL_AKHIR'])) ?></td>
                                            <td><?= esc($siswa['STATUS']) ?></td>
                                            <td><?= esc($siswa['NAMA_PEMB']) ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('/siswa/PKL/edit/' . $siswa['ID']) ?>" class="btn btn-gradient-blue btn-sm shadow-sm" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="bi bi-pencil-square fs-6 align-middle"></i>
                                                </a>
                                                <a href="<?= base_url('/siswa/PKL/delete/' . $siswa['ID']) ?>" class="btn btn-gradient-blue btn-sm shadow-sm" data-bs-toggle="tooltip" title="Delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
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

<!-- untuk search
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
</script> -->

<?= $this->endSection() ?>