<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Edit Data Institusi
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="<?= base_url('/lembaga/update/' . $lembaga['ID_LEMBAGA']) ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id_lembaga" value="<?= $lembaga['ID_LEMBAGA'] ?>">
                            <div class="form-group">
                                <label for="exampleInputName">Nama Lembaga</label>
                                <input type="text" class="form-control" name="nama_lembaga" id="lembaga" placeholder="Masukkan Nama Lembaga" value="<?= old('nama_lembaga', $lembaga['NAMA_LEMBAGA']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat Lembaga" value="<?= old('alamat', $lembaga['ALAMAT_LEMBAGA']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="kontak">Kontak</label>
                                <input type="text" class="form-control" name="kontak" id="kontak"
                                value="<?= old('kontak', $lembaga['TELP_LEMBAGA']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="" value="<?= old('email', $lembaga['EMAIL_LEMBAGA']) ?>" required>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <a href="<?= base_url('/lembaga') ?>" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
        </div>
        <!-- main-panel ends -->
        <?= $this->endSection() ?>