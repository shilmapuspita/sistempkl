<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="fa-solid fa-user-graduate"></i>
                </span> Tambah Data Peserta Internship
            </h3>
        </div>

        <div class="card shadow-lg">
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
                <h4 class="card-title text-center text-primary fw-bold">FORMULIR PESERTA INTERNSHIP</h4>
                <br>
                <form action="<?= base_url('/intern/store') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-id-badge"></i> ID PKL</label>
                                <input type="text" name="ID_PKL" class="form-control shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-id-badge"></i> No Surat</label>
                                <input type="text" name="ID_PKL" class="form-control shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user"></i> Nama Siswa</label>
                                <input type="text" name="NM_SISWA" class="form-control shadow-sm text-uppercase" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-day"></i> Tanggal</label>
                                <input type="date" name="TANGGAL" class="form-control shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-id-badge"></i> Batch</label>
                                <input type="text" name="ID_PKL" class="form-control shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-graduation-cap"></i> Jenis PKL</label>
                                <input type="text" name="JENIS_PKL" class="form-control shadow-sm" value="PKL" readonly required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-building"></i> Lembaga</label>
                                <input type="text" name="LEMBAGA" class="form-control shadow-sm text-uppercase" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-book"></i> Jurusan</label>
                                <input type="text" name="JURUSAN" class="form-control shadow-sm text-uppercase" required>
                            </div>
                            <div class="form-group">
                                <label>
                                    <i class="fa-solid fa-layer-group me-2"></i> Divisi
                                </label>
                                <select class="form-select form-select-sm shadow-sm" name="DIVISI" id="exampleInputDivisi" required>
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
                                <label>
                                    <i class="fa-solid fa-briefcase me-2"></i> Bagian
                                </label>
                                <select class="form-select form-select-sm shadow-sm" name="BAGIAN" id="exampleInputBagian" required>
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
                                    <option value="Project">Project</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-plus"></i> Tanggal Awal</label>
                                <input type="date" name="TGL_AWAL" class="form-control shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-check"></i> Tanggal Akhir</label>
                                <input type="date" name="TGL_AKHIR" class="form-control shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user-tie"></i> Nama Pembimbing</label>
                                <input type="text" name="NAMA_PEMB" class="form-control shadow-sm text-uppercase" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-gradient-primary me-2 shadow-sm">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan
                        </button>
                        <a href="<?= base_url('/intern/intern') ?>" class="btn btn-gradient-secondary shadow-sm">
                            <i class="fa-solid fa-xmark"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>