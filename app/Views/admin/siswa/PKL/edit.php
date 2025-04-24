<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="btn btn-gradient-blue p-2 shadow-sm">
                    <i class="fa-solid fa-user-graduate"></i>
                </span> Edit Data Peserta PKL
            </h3>
        </div>

        <div class="card shadow-lg">
            <div class="card-body">
                <h4 class="card-title text-center text-primary fw-bold">FORMULIR EDIT PESERTA PKL</h4>
                <br>
                <form action="<?= base_url('siswa/PKL/update/' . $siswa['ID_PKL']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-user"></i> Nama Siswa</label>
                                <input type="text" name="NM_SISWA" class="form-control shadow-sm text-uppercase" value="<?= $siswa['NM_SISWA'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-day"></i> Tanggal</label>
                                <input type="date" name="TANGGAL" class="form-control shadow-sm" value="<?= $siswa['TANGGAL'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-graduation-cap"></i> Jenis PKL</label>
                                <input type="text" name="JENIS_PKL" class="form-control shadow-sm" value="PKL" readonly required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-building"></i> Lembaga</label>
                                <input type="text" name="LEMBAGA" class="form-control shadow-sm text-uppercase" value="<?= $siswa['LEMBAGA'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-book"></i> Jurusan</label>
                                <input type="text" name="JURUSAN" class="form-control shadow-sm text-uppercase" value="<?= $siswa['JURUSAN'] ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-users"></i> Divisi</label>
                                <input type="text" name="DIVISI" class="form-control shadow-sm text-uppercase"
                                    value="<?= isset($siswa['DIVISI']) ? esc($siswa['DIVISI']) : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-layer-group"></i> Bagian</label>
                                <input type="text" name="BAGIAN" class="form-control shadow-sm text-uppercase"
                                    value="<?= isset($siswa['BAGIAN']) ? esc($siswa['BAGIAN']) : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-plus"></i> Tanggal Awal</label>
                                <input type="date" name="tanggal_mulai_fix" class="form-control shadow-sm"
                                    value="<?= isset($siswa['tanggal_mulai_fix']) ? esc($siswa['tanggal_mulai_fix']) : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-check"></i> Tanggal Akhir</label>
                                <input type="date" name="tgl_akhir_fix" class="form-control shadow-sm"
                                    value="<?= isset($siswa['tgl_akhir_fix']) ? esc($siswa['tgl_akhir_fix']) : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user-tie"></i> Nama Pembimbing</label>
                                <input type="text" name="NAMA_PEMB" class="form-control shadow-sm text-uppercase" value="<?= $siswa['NAMA_PEMB'] ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-gradient-blue me-2 shadow-sm">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                        </button>
                        <a href="<?= base_url('siswa/PKL/') ?>" class="btn btn-gradient-secondary shadow-sm">
                            <i class="fa-solid fa-xmark"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>