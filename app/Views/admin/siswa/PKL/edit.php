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
                                <label for="divisi">Divisi</label>
                                <select name="DIVISI" id="divisi" class="form-control" style="appearance: auto;"required>
                                    <option value=""disabled <?= empty($siswa['DIVISI']) ? 'selected' : '' ?>>-- Pilih Divisi --</option>
                                    <?php foreach ($divisiList as $divisi): ?>
                                        <option value="<?= htmlspecialchars($divisi) ?>"
                                            <?= strcasecmp(trim($siswa['DIVISI']), trim($divisi)) === 0 ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($divisi) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bagian">Bagian</label>
                                <select name="BAGIAN" id="bagian" class="form-control" style="appearance: auto;"required>
                                    <option value=""disabled <?= empty($siswa['BAGIAN']) ? 'selected' : '' ?>>-- Pilih Bagian --</option>
                                    <?php foreach ($bagianList as $bagian): ?>
                                        <option value="<?= htmlspecialchars($bagian) ?>"
                                            <?= strcasecmp(trim($siswa['BAGIAN']), trim($bagian)) === 0 ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($bagian) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
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