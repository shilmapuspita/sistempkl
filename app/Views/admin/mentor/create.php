<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Add Data Mentor
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
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

                        <form class="forms-sample" action="<?= base_url('/mentor/store') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="exampleInputNIP">NIP</label>
                                <input type="text" class="form-control" name="nip" id="exampleInputNIP" placeholder="Masukkan NIP" value="<?= old('nip') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Nama</label>
                                <input type="text" class="form-control" name="nama" id="exampleInputName" placeholder="Masukkan nama" value="<?= old('nama') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDivisi">Divisi</label>
                                <select class="form-control" name="divisi" id="exampleInputDivisi" required>
                                    <option value="" selected disabled>Pilih Divisi</option>
                                    <option value="SATUAN PENGAWASAN INTERN">Satuan Pengawasan Intern</option>
                                    <option value="SEKRETARIS PERUSAHAAN">sekretaris Perusahaan</option>
                                    <option value="DIREKTORAT OPERASI">Direktorat Operasi</option>
                                    <option value="PEMASARAN DAN PENJUALAN">Pemasaran dan Penjualan</option>
                                    <option value="OPERASIONAL & K3LH">Operasional & K3LH</option>
                                    <option value="DIREKTORAT KUG, SDM, HUKUM, & MR">Direktorat KUG, SDM, Hukum, & MR</option>
                                    <option value="KEUANGAN & AKUNTANSI">Keuangan & Akuntansi</option>
                                    <option value=" PENDUKUNG USAHA">Pendukung Usaha</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputBagian">Bagian</label>
                                <select class="form-control" name="divisi" id="exampleInputDivisi" required>
                                    <option value="" selected disabled>Pilih Divisi</option>
                                    <option value="SATUAN PENGAWASAN INTERN">Satuan Pengawasan Intern</option>
                                    <option value="SEKRETARIS PERUSAHAAN">sekretaris Perusahaan</option>
                                    <option value="DIREKTORAT OPERASI">Direktorat Operasi</option>
                                    <option value="PEMASARAN DAN PENJUALAN">Pemasaran dan Penjualan</option>
                                    <option value="OPERASIONAL & K3LH">Operasional & K3LH</option>
                                    <option value="DIREKTORAT KUG, SDM, HUKUM, & MR">Direktorat KUG, SDM, Hukum, & MR</option>
                                    <option value="KEUANGAN & AKUNTANSI">Keuangan & Akuntansi</option>
                                    <option value=" PENDUKUNG USAHA">Pendukung Usaha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNIPatasan">NIP Atasan</label>
                                <input type="number" class="form-control" name="nip_atasan" id="exampleInputNIPatasan" placeholder="Masukkan NIP Atasan" value="<?= old('nip_atasan') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNamaAtasan">Nama Atasan</label>
                                <input type="text" class="form-control" name="nama_atasan" id="exampleInputNamaAtasan" placeholder="Masukkan Nama Atasan" value="<?= old('nama_atasan') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNamaJabatan">Nama Jabatan</label>
                                <input type="text" class="form-control" name="nama_jabatan" id="exampleInputNamaJabatan" placeholder="Masukkan Nama Jabatan" value="<?= old('nama_jabatan') ?>" required>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <a href="<?= base_url('/mentor') ?>" class="btn btn-light">Cancel</a>
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