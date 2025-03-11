<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="btn btn-gradient-blue p-2 shadow-sm">
                    <i class="fa-solid fa-chalkboard-teacher"></i>
                </span> Add Data Jurusan
            </h3>
        </div>
        <div class="card shadow-lg">
            <div class="card-body">
                <h4 class="card-title text-center text-primary fw-bold">FORMULIR DATA JURUSAN</h4>
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

                        <form class="forms-sample" action="<?= base_url('/major/store') ?>" method="post">
                        <?= csrf_field() ?>
                            <div class="form-group">
                                <label><i class="fa-solid fa-briefcase"></i> Nama Jurusan</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="nama_jurusan" value="<?= old('nama_jurusan') ?>" required>
                            </div>
                            
                            <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-gradient-blue me-2 shadow-sm">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan
                        </button>
                        <a href="<?= base_url('/major') ?>" class="btn btn-gradient-secondary shadow-sm">
                            <i class="fa-solid fa-xmark"></i> Batal
                        </a>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- main-panel ends -->
        <?= $this->endSection() ?>