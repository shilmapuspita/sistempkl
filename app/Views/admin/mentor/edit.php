<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="btn btn-gradient-blue p-2 shadow-sm">
                    <i class="fa-solid fa-chalkboard-teacher"></i>
                </span> Edit Data Mentor
            </h3>
        </div>

        <div class="card shadow-lg">
            <div class="card-body">
                <h4 class="card-title text-center text-primary fw-bold">FORMULIR EDIT MENTOR</h4>
                <br>

                <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                <form action="<?= base_url('/mentor/update/' . $mentor['ID_PEMBIMBING']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-id-badge"></i> ID Pembimbing</label>
                                <input type="text" name="id_pembimbing" class="form-control shadow-sm" value="<?= $mentor['ID_PEMBIMBING'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user"></i> Nama</label>
                                <input type="text" name="nama" class="form-control shadow-sm text-uppercase" value="<?= old('nama', $mentor['NAMA']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-briefcase"></i> Divisi</label>
                                <input type="text" name="divisi" class="form-control shadow-sm text-uppercase" value="<?= old('divisi', $mentor['DIVISI']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-building"></i> Bagian</label>
                                <input type="text" name="bagian" class="form-control shadow-sm text-uppercase" value="<?= old('bagian', $mentor['BAGIAN']) ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-id-card"></i> NIP</label>
                                <input type="text" name="nip" class="form-control shadow-sm" value="<?= old('nip', $mentor['NIP']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user-tie"></i> NIP Atasan</label>
                                <input type="text" name="nip_atasan" class="form-control shadow-sm" value="<?= old('nip_atasan', $mentor['NIP_ATASAN']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user-tie"></i> Nama Atasan</label>
                                <input type="text" name="nama_atasan" class="form-control shadow-sm text-uppercase" value="<?= old('nama_atasan', $mentor['NAMA_ATASAN']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user-tag"></i> Nama Jabatan</label>
                                <input type="text" name="nama_jabatan" class="form-control shadow-sm text-uppercase" value="<?= old('nama_jabatan', $mentor['NAMA_JABATAN']) ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-gradient-blue me-2 shadow-sm">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                        </button>
                        <a href="<?= base_url('/mentor') ?>" class="btn btn-gradient-secondary shadow-sm">
                            <i class="fa-solid fa-xmark"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>