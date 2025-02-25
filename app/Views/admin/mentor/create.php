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
                                <input type="text" class="form-control" name="nip" id="exampleInputNIP" placeholder="Masukkan NIP" value="<?= old('nip') ?>" pattern="[A-Za-z0-9.,]+" title="Gunakan hanya huruf, angka, dan karakter .," required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Nama</label>
                                <input type="text" class="form-control" name="nama" id="exampleInputName" placeholder="Masukkan nama" value="<?= old('nama') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDivisi">Divisi</label>
                                <select class="form-control" name="divisi" id="exampleInputDivisi" required>
                                    <option value="" selected disabled>Pilih Divisi</option>
                                    <option value="Operation">Operation</option>
                                    <option value="Financial Planning & Analysis">Financial Planning & Analysis</option>
                                    <option value="Internal Audit Group">Internal Audit Group</option>
                                    <option value="Commercial Engineering">Commercial Engineering</option>
                                    <option value="Sales & Marketing">Sales & Marketing</option>
                                    <option value="Procurement & Material Management">Procurement & Material Management</option>
                                    <option value="Corporate Secretary">Corporate Secretary</option>
                                    <option value="Legal & Risk Management">Legal & Risk Management</option>
                                    <option value="Human Capital & General Affair">Human Capital & General Affair</option>
                                    <option value="PT. IPMS">PT. IPMS</option>
                                    <option value="PT. IGOC">PT. IGOC</option>
                                    <option value="Satuan Pengawasan Intern">Satuan Pengawasan Intern</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBagian">Bagian</label>
                                <select class="form-control" name="bagian" id="exampleInputBagian" required>
                                    <option value="" selected disabled>Pilih Bagian</option>
                                    <option value="Production">Production</option>
                                    <option value="Project Group">Project Group</option>
                                    <option value="Treasury & Taxation">Treasury & Taxation</option>
                                    <option value="Financial Accounting">Financial Accounting</option>
                                    <option value="Operation Planning & Control">Operation Planning & Control</option>
                                    <option value="Audit Plan & Control">Audit Plan & Control</option>
                                    <option value="IT & Product Development">IT & Product Development</option>
                                    <option value="Account Manager">Account Manager</option>
                                    <option value="Procurement Planning & Control">Procurement Planning & Control</option>
                                    <option value="Procurement">Procurement</option>
                                    <option value="Corporate Communication">Corporate Communication</option>
                                    <option value="CSR & Community Development">CSR & Community Development</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Sales Engineering">Sales Engineering</option>
                                    <option value="Quality Management & HSE">Quality Management & HSE</option>
                                    <option value="Partnership">Partnership</option>
                                    <option value="Sales & Marketing Operation">Sales & Marketing Operation</option>
                                    <option value="Human Capital">Human Capital</option>
                                    <option value="Sales & Marketing Planning & Control">Sales & Marketing Planning & Control</option>
                                    <option value="Billing & Collection Management">Billing & Collection Management</option>
                                    <option value="Financial Planning, Controlling & Reporting">Financial Planning, Controlling & Reporting</option>
                                    <option value="IT & Product Development Group">IT & Product Development Group</option>
                                    <option value="Business Development">Business Development</option>
                                    <option value="SProject">Project</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNIPatasan">NIP Atasan</label>
                                <input type="text" class="form-control" name="nip_atasan" id="exampleInputNIPatasan" placeholder="Masukkan NIP Atasan" value="<?= old('nip_atasan') ?>" pattern="[A-Za-z0-9.,]+" title="Gunakan hanya huruf, angka, dan karakter .,]" required>
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