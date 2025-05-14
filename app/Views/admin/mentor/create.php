<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="btn btn-gradient-blue p-2 shadow-sm">
                    <i class="fa-solid fa-chalkboard-teacher"></i>
                </span> Tambah Data Mentor
            </h3>
        </div>

        <div class="card shadow-lg">
            <div class="card-body">
                <h4 class="card-title text-center text-primary fw-bold">FORMULIR DATA MENTOR</h4>
                <br>

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('/mentor/store') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-id-badge"></i> NIP</label>
                                <input type="text" name="nip" class="form-control shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label> Nama Mentor</label>
                                <input type="text" name="nama" class="form-control shadow-sm text-uppercase" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-building"></i> Divisi</label>
                                <select class="form-select form-select-sm shadow-sm" name="divisi" required>
                                    <option value="" selected disabled>Pilih Divisi</option>
                                    <?php foreach ($divisiList as $divisi): ?>
                                        <option value="<?= esc($divisi) ?>"><?= esc($divisi) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-briefcase"></i> Bagian</label>
                                <select class="form-select form-select-sm shadow-sm" name="bagian" required>
                                    <option value="" selected disabled>Pilih Bagian</option>
                                    <?php foreach ($bagianList as $bagian): ?>
                                        <option value="<?= esc($bagian) ?>"><?= esc($bagian) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-id-badge"></i> NIP Atasan</label>
                                <input type="text" name="nip_atasan" class="form-control shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user-tie"></i> Nama Atasan</label>
                                <input type="text" name="nama_atasan" class="form-control shadow-sm text-uppercase" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-briefcase"></i> Nama Jabatan</label>
                                <input type="text" name="nama_jabatan" class="form-control shadow-sm text-uppercase" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-gradient-blue me-2 shadow-sm">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan
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