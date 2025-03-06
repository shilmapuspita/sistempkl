<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="btn btn-gradient-blue p-2 shadow-sm">
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
                                <label><i class="fa-solid fa-id-badge"></i> No Surat</label>
                                <input type="text" name="no_surat" class="form-control shadow-sm" value="<?= old('no_surat') ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user"></i> Nama Siswa</label>
                                <input type="text" name="nama" class="form-control shadow-sm text-uppercase" value="<?= old('nama') ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-day"></i> Tanggal</label>
                                <input type="date" name="tanggal" class="form-control shadow-sm" value="<?= old('tanggal') ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-graduation-cap"></i> Batch</label>
                                <input type="text" name="batch" class="form-control shadow-sm" value="<?= old('batch') ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-building"></i> Lembaga</label>
                                <input type="text" name="lembaga" class="form-control shadow-sm text-uppercase" value="<?= old('lembaga') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-book"></i> Jurusan</label>
                                <input type="text" name="jurusan" class="form-control shadow-sm text-uppercase" value="<?= old('jurusan') ?>" required>
                            </div>
                            <div class="form-group">
                                <label>
                                    <i class="fa-solid fa-layer-group me-2"></i> Divisi
                                </label>
                                <select class="form-select form-select-sm shadow-sm" name="divisi" id="exampleInputDivisi" required>
                                    <option value="" selected disabled>Pilih Divisi</option>
                                    <option value="Operation" <?= old('divisi') == 'Operation' ? 'selected' : '' ?>>Operation</option>
                                    <option value="Financial Planning & Analysis"<?= old('divisi') == 'Financial Planning & Analysis' ? 'selected' : '' ?>>Financial Planning & Analysis</option>
                                    <option value="Internal Audit Group" <?= old('divisi') == 'Internal Audit Group' ? 'selected' : '' ?>>Internal Audit Group</option>
                                    <option value="Commercial Engineering" <?= old('divisi') == 'Commercial Engineering' ? 'selected' : '' ?>>Commercial Engineering</option>
                                    <option value="Sales & Marketing" <?= old('divisi') == 'Sales & Marketing' ? 'selected' : '' ?>>Sales & Marketing</option>
                                    <option value="Procurement & Material Management" <?= old('divisi') == 'Procurement & Material Managemen' ? 'selected' : '' ?>>Procurement & Material Management</option>
                                    <option value="Corporate Secretary" <?= old('divisi') == 'Corporate Secretary' ? 'selected' : '' ?>>Corporate Secretary</option>
                                    <option value="Legal & Risk Management" <?= old('divisi') == 'Legal & Risk Management' ? 'selected' : '' ?>>Legal & Risk Management</option>
                                    <option value="Human Capital & General Affair" <?= old('divisi') == 'Human Capital & General Affair' ? 'selected' : '' ?>>Human Capital & General Affair</option>
                                    <option value="PT. IPMS" <?= old('divisi') == 'PT. IPMS' ? 'selected' : '' ?>>PT. IPMS</option>
                                    <option value="PT. IGOC" <?= old('divisi') == 'PT. IGOC' ? 'selected' : '' ?>>PT. IGOC</option>
                                    <option value="Satuan Pengawasan Intern" <?= old('divisi') == 'Satuan Pengawasan Intern' ? 'selected' : '' ?>>Satuan Pengawasan Intern</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    <i class="fa-solid fa-briefcase me-2"></i> Bagian
                                </label>
                                <select class="form-select form-select-sm shadow-sm" name="bagian" id="exampleInputBagian" required>
                                    <option value="" selected disabled>Pilih Bagian</option>
                                    <option value="Production" <?= old('bagian') == 'Production' ? 'selected' : '' ?>>Production</option>
                                    <option value="Project Group" <?= old('bagian') == 'Project Group' ? 'selected' : '' ?>>Project Group</option>
                                    <option value="Treasury & Taxation" <?= old('bagian') == 'Treasury & Taxation' ? 'selected' : '' ?>>Treasury & Taxation</option>
                                    <option value="Financial Accounting" <?= old('bagian') == 'Financial Accounting' ? 'selected' : '' ?>>Financial Accounting</option>
                                    <option value="Operation Planning & Control" <?= old('bagian') == 'Operation Planning & Control' ? 'selected' : '' ?>>Operation Planning & Control</option>
                                    <option value="Audit Plan & Control" <?= old('bagian') == 'Audit Plan & Control' ? 'selected' : '' ?>>Audit Plan & Control</option>
                                    <option value="IT & Product Development" <?= old('bagian') == 'IT & Product Development' ? 'selected' : '' ?>>IT & Product Development</option>
                                    <option value="Account Manager" <?= old('bagian') == 'Account Manager' ? 'selected' : '' ?>>Account Manager</option>
                                    <option value="Procurement Planning & Control" <?= old('bagian') == 'Procurement Planning & Control' ? 'selected' : '' ?>>Procurement Planning & Control</option>
                                    <option value="Procurement" <?= old('bagian') == 'Procurement' ? 'selected' : '' ?>>Procurement</option>
                                    <option value="Corporate Communication" <?= old('bagian') == 'Corporate Communication' ? 'selected' : '' ?>>Corporate Communication</option>
                                    <option value="CSR & Community Development" <?= old('bagian') == 'CSR & Community Development' ? 'selected' : '' ?>>CSR & Community Development</option>
                                    <option value="Legal" <?= old('bagian') == 'Legal' ? 'selected' : '' ?>>Legal</option>
                                    <option value="Sales Engineering" <?= old('bagian') == 'Sales Engineering' ? 'selected' : '' ?>>Sales Engineering</option>
                                    <option value="Quality Management & HSE" <?= old('bagian') == 'Quality Management & HSE' ? 'selected' : '' ?>>Quality Management & HSE</option>
                                    <option value="Partnership" <?= old('bagian') == 'Partnership' ? 'selected' : '' ?>>Partnership</option>
                                    <option value="Sales & Marketing Operation" <?= old('bagian') == 'Sales & Marketing Operation' ? 'selected' : '' ?>>Sales & Marketing Operation</option>
                                    <option value="Human Capital" <?= old('bagian') == 'Human Capital' ? 'selected' : '' ?>>Human Capital</option>
                                    <option value="Sales & Marketing Planning & Control" <?= old('bagian') == 'Sales & Marketing Planning & Control' ? 'selected' : '' ?>>Sales & Marketing Planning & Control</option>
                                    <option value="Billing & Collection Management" <?= old('bagian') == 'Billing & Collection Management' ? 'selected' : '' ?>>Billing & Collection Management</option>
                                    <option value="Financial Planning, Controlling & Reporting" <?= old('bagian') == 'Financial Planning, Controlling & Reporting' ? 'selected' : '' ?>>Financial Planning, Controlling & Reporting</option>
                                    <option value="IT & Product Development Group" <?= old('bagian') == 'IT & Product Development Group' ? 'selected' : '' ?>>IT & Product Development Group</option>
                                    <option value="Business Development" <?= old('bagian') == 'Business Development' ? 'selected' : '' ?>>Business Development</option>
                                    <option value="Project" <?= old('bagian') == 'Project' ? 'selected' : '' ?>>Project</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-plus"></i> Tanggal Awal</label>
                                <input type="date" name="tgl_awal" class="form-control shadow-sm" value="<?= old('tgl_awal') ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-check"></i> Tanggal Akhir</label>
                                <input type="date" name="tgl_akhir" class="form-control shadow-sm" value="<?= old('tgl_akhir') ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user-tie"></i> Nama Pembimbing</label>
                                <input type="text" name="nama_pemb" class="form-control shadow-sm text-uppercase" value="<?= old('nama_pemb') ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-gradient-blue me-2 shadow-sm">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan
                        </button>
                        <a href="<?= base_url('/intern') ?>" class="btn btn-gradient-secondary shadow-sm">
                            <i class="fa-solid fa-xmark"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>