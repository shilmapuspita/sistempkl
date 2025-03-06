<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="btn btn-gradient-blue p-2 shadow-sm">
                    <i class="fa-solid fa-chalkboard-teacher"></i>
                </span> Add Data Institusi
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

                <form class="forms-sample" action="<?= base_url('/lembaga/store') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputName"><i class="fa-solid fa-building"></i>
                                Nama Lembaga</label>
                                <input type="text" class="form-control" name="nama_lembaga" id="lembaga"  value="<?= old('nama_lembaga') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat"><i class="fa-solid fa-briefcase"></i> Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat"  value="<?= old('alamat') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="kontak"><i class="fa-solid fa-id-badge"></i> Kontak</label>
                                <input type="number" class="form-control" name="kontak" id="kontak"  value="<?= old('kontak') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fa-solid fa-user"></i> Email</label>
                                <input type="email" class="form-control" name="email" id="email"  value="<?= old('email') ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-gradient-blue me-2 shadow-sm">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan
                        </button>
                        <a href="<?= base_url('/lembaga') ?>" class="btn btn-gradient-secondary shadow-sm">
                            <i class="fa-solid fa-xmark"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- main-panel ends -->
<?= $this->endSection() ?>