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

        <form method="get" action="<?= base_url('siswa/PKL') ?>" class="mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                    <input type="text" name="nama_siswa" id="nama_siswa" class="form-control"
                        placeholder="Cari berdasarkan nama..." value="<?= esc($_GET['nama_siswa'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="lembaga" class="form-label">Lembaga</label>
                    <input type="text" name="lembaga" id="lembaga" class="form-control"
                        placeholder="Nama lembaga..." value="<?= esc($_GET['lembaga'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control"
                        placeholder="Nama jurusan..." value="<?= esc($_GET['jurusan'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="divisi" class="form-label">Divisi</label>
                    <input type="text" name="divisi" id="divisi" class="form-control"
                        placeholder="Nama divisi..." value="<?= esc($_GET['divisi'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="bagian" class="form-label">Bagian</label>
                    <input type="text" name="bagian" id="bagian" class="form-control"
                        placeholder="Nama bagian..." value="<?= esc($_GET['bagian'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="pembimbing" class="form-label">Nama Pembimbing</label>
                    <input type="text" name="pembimbing" id="pembimbing" class="form-control"
                        placeholder="Nama pembimbing..." value="<?= esc($_GET['pembimbing'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="tanggal_mulai_fix" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai_fix" id="tanggal_mulai" class="form-control"
                        value="<?= esc($_GET['tanggal_mulai_fix'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="tgl_akhir_fix" class="form-label">Tanggal Akhir</label>
                    <input type="date" name="tgl_akhir_fix" id="tanggal_akhir" class="form-control"
                        value="<?= esc($_GET['tgl_akhir_fix'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
                    <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control"
                        value="<?= esc($_GET['tanggal_daftar'] ?? '') ?>">
                </div>

                <div class="col-md-12 d-flex justify-content-between gap-3 mt-3">
                    <button type="submit" class="btn text-white w-50"
                        style="background-color: #4A90E2; border-color: #4A90E2; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;"
                        onmouseover="this.style.backgroundColor='#357ABD'; this.style.borderColor='#357ABD'; this.style.transform='translateY(-2px)';"
                        onmouseout="this.style.backgroundColor='#4A90E2'; this.style.borderColor='#4A90E2'; this.style.transform='translateY(0)';">
                        <i class="bi bi-funnel-fill me-2"></i> Set Filter
                    </button>

                    <a href="<?= base_url('siswa/PKL') ?>" class="btn text-white w-50"
                        style="background-color: #B0B0B0; border-color: #B0B0B0; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;"
                        onmouseover="this.style.backgroundColor='#909090'; this.style.borderColor='#909090'; this.style.transform='translateY(-2px)';"
                        onmouseout="this.style.backgroundColor='#B0B0B0'; this.style.borderColor='#B0B0B0'; this.style.transform='translateY(0)';">
                        <i class="bi bi-x-circle-fill me-2"></i> Clear Filter
                    </a>
                </div>
            </div>

            <div class="mt-3 mb-4">
                <button type="button" class="btn text-white"
                    style="background: linear-gradient(135deg, #1dd1a1, #10ac84); border: none; border-radius: 12px; padding: 12px 20px; font-weight: 600; box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1); transition: all 0.3s ease-in-out;"
                    data-bs-toggle="modal" data-bs-target="#exportModal"
                    onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 16px rgba(0,0,0,0.2)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 14px rgba(0, 0, 0, 0.1)'">
                    <i class="bi bi-file-earmark-excel-fill me-2"></i> Export Data
                </button>
            </div>
        </form>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center text-primary fw-bold">DATA PESERTA PKL (MAHASISWA & SISWA)</h2>
                        <br>

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
                                    <?php if (!empty($datasiswa) && is_array($datasiswa)) : ?>
                                        <?php $no = 1 + (10 * (($currentPage ?? 1) - 1)); ?>
                                        <?php foreach ($datasiswa as $siswa) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= esc($siswa['ID']) ?></td>
                                                <td><?= esc($siswa['NM_SISWA']) ?></td>
                                                <td><?= date('d-m-Y', strtotime($siswa['TGL_DAFTAR'])); ?></td>
                                                <td><?= esc($siswa['JENIS_PKL']) ?></td>
                                                <td><?= esc($siswa['LEMBAGA']) ?></td>
                                                <td><?= esc($siswa['JURUSAN']) ?></td>
                                                <td><?= esc($siswa['DIVISI']) ?></td>
                                                <td><?= esc($siswa['BAGIAN']) ?></td>
                                                <td><?= date('d-m-Y', strtotime($siswa['tanggal_mulai_fix'])); ?></td>
                                                <td><?= date('d-m-Y', strtotime($siswa['tgl_akhir_fix'])) ?></td>
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
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="14" class="text-center">Tidak ada data tersedia.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <?php if (!empty($pager)) : ?>
                            <div class="d-flex justify-content-center mt-3">
                                <?= $pager->links() ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?= view('admin/siswa/PKL/ekspor') ?>
<?= $this->endSection() ?>