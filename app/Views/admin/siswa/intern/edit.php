<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="btn btn-gradient-blue p-2 shadow-sm">
                    <i class="fa-solid fa-user-graduate"></i>
                </span> Edit Data Peserta Internship
            </h3>
        </div>

        <div class="card shadow-lg">
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

                <h4 class="card-title text-center text-primary fw-bold">FORMULIR EDIT PESERTA INTERNSHIP</h4>
                <br>
                <form action="<?= base_url('/intern/update/' . $intern['ID_PKL']) ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_jurusan" value="<?= $intern['ID_PKL'] ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-id-badge"></i> No Surat</label>
                                <input type="text" name="no_surat" class="form-control shadow-sm" value="<?= old('no_surat', $intern['NO']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user"></i> Nama Siswa</label>
                                <input type="text" name="nama" class="form-control shadow-sm text-uppercase" value="<?= old('nama', $intern['NM_SISWA']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-day"></i> Tanggal</label>
                                <input type="date" name="tanggal" class="form-control shadow-sm" value="<?= old('tanggal', $intern['TANGGAL']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-graduation-cap"></i> Batch</label>
                                <input type="text" name="batch" class="form-control shadow-sm" value="<?= old('batch', $intern['BATCH']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-building"></i> Lembaga</label>
                                <input type="text" name="lembaga" class="form-control shadow-sm text-uppercase" value="<?= old('lembaga', $intern['LEMBAGA']) ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-book"></i> Jurusan</label>
                                <input type="text" name="jurusan" class="form-control shadow-sm text-uppercase" value="<?= old('jurusan', $intern['JURUSAN']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label>
                                    <i class="fa-solid fa-layer-group me-2"></i> Divisi
                                </label>
                                <select class="form-select form-select-sm shadow-sm" name="divisi" id="exampleInputDivisi" required>
                                    <option value="" selected disabled>Pilih Divisi</option>
                                    <option value="Operation" <?= old('divisi', $intern['DIVISI']) == 'Operation' ? 'selected' : '' ?>>Operation</option>
                                    <option value="Financial Planning & Analysis"<?= old('divisi', $intern['DIVISI']) == 'Financial Planning & Analysis' ? 'selected' : '' ?>>Financial Planning & Analysis</option>
                                    <option value="Internal Audit Group" <?= old('divisi', $intern['DIVISI']) == 'Internal Audit Group' ? 'selected' : '' ?>>Internal Audit Group</option>
                                    <option value="Commercial Engineering" <?= old('divisi', $intern['DIVISI']) == 'Commercial Engineering' ? 'selected' : '' ?>>Commercial Engineering</option>
                                    <option value="Sales & Marketing" <?= old('divisi', $intern['DIVISI']) == 'Sales & Marketing' ? 'selected' : '' ?>>Sales & Marketing</option>
                                    <option value="Procurement & Material Management" <?= old('divisi', $intern['DIVISI']) == 'Procurement & Material Managemen' ? 'selected' : '' ?>>Procurement & Material Management</option>
                                    <option value="Corporate Secretary" <?= old('divisi', $intern['DIVISI']) == 'Corporate Secretary' ? 'selected' : '' ?>>Corporate Secretary</option>
                                    <option value="Legal & Risk Management" <?= old('divisi', $intern['DIVISI']) == 'Legal & Risk Management' ? 'selected' : '' ?>>Legal & Risk Management</option>
                                    <option value="Human Capital & General Affair" <?= old('divisi', $intern['DIVISI']) == 'Human Capital & General Affair' ? 'selected' : '' ?>>Human Capital & General Affair</option>
                                    <option value="PT. IPMS" <?= old('divisi', $intern['DIVISI']) == 'PT. IPMS' ? 'selected' : '' ?>>PT. IPMS</option>
                                    <option value="PT. IGOC" <?= old('divisi', $intern['DIVISI']) == 'PT. IGOC' ? 'selected' : '' ?>>PT. IGOC</option>
                                    <option value="Satuan Pengawasan Intern" <?= old('divisi', $intern['DIVISI']) == 'Satuan Pengawasan Intern' ? 'selected' : '' ?>>Satuan Pengawasan Intern</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    <i class="fa-solid fa-briefcase me-2"></i> Bagian
                                </label>
                                <select class="form-select form-select-sm shadow-sm" name="bagian" id="exampleInputBagian" required>
                                    <option value="" selected disabled>Pilih Bagian</option>
                                    <option value="Production" <?= old('bagian', $intern['BAGIAN']) == 'Production' ? 'selected' : '' ?>>Production</option>
                                    <option value="Project Group" <?= old('bagian', $intern['BAGIAN']) == 'Project Group' ? 'selected' : '' ?>>Project Group</option>
                                    <option value="Treasury & Taxation" <?= old('bagian', $intern['BAGIAN']) == 'Treasury & Taxation' ? 'selected' : '' ?>>Treasury & Taxation</option>
                                    <option value="Financial Accounting" <?= old('bagian', $intern['BAGIAN']) == 'Financial Accounting' ? 'selected' : '' ?>>Financial Accounting</option>
                                    <option value="Operation Planning & Control" <?= old('bagian', $intern['BAGIAN']) == 'Operation Planning & Control' ? 'selected' : '' ?>>Operation Planning & Control</option>
                                    <option value="Audit Plan & Control" <?= old('bagian', $intern['BAGIAN']) == 'Audit Plan & Control' ? 'selected' : '' ?>>Audit Plan & Control</option>
                                    <option value="IT & Product Development" <?= old('bagian', $intern['BAGIAN']) == 'IT & Product Development' ? 'selected' : '' ?>>IT & Product Development</option>
                                    <option value="Account Manager" <?= old('bagian', $intern['BAGIAN']) == 'Account Manager' ? 'selected' : '' ?>>Account Manager</option>
                                    <option value="Procurement Planning & Control" <?= old('bagian', $intern['BAGIAN']) == 'Procurement Planning & Control' ? 'selected' : '' ?>>Procurement Planning & Control</option>
                                    <option value="Procurement" <?= old('bagian', $intern['BAGIAN']) == 'Procurement' ? 'selected' : '' ?>>Procurement</option>
                                    <option value="Corporate Communication" <?= old('bagian', $intern['BAGIAN']) == 'Corporate Communication' ? 'selected' : '' ?>>Corporate Communication</option>
                                    <option value="CSR & Community Development" <?= old('bagian', $intern['BAGIAN']) == 'CSR & Community Development' ? 'selected' : '' ?>>CSR & Community Development</option>
                                    <option value="Legal" <?= old('bagian', $intern['BAGIAN']) == 'Legal' ? 'selected' : '' ?>>Legal</option>
                                    <option value="Sales Engineering" <?= old('bagian', $intern['BAGIAN']) == 'Sales Engineering' ? 'selected' : '' ?>>Sales Engineering</option>
                                    <option value="Quality Management & HSE" <?= old('bagian', $intern['BAGIAN']) == 'Quality Management & HSE' ? 'selected' : '' ?>>Quality Management & HSE</option>
                                    <option value="Partnership" <?= old('bagian', $intern['BAGIAN']) == 'Partnership' ? 'selected' : '' ?>>Partnership</option>
                                    <option value="Sales & Marketing Operation" <?= old('bagian', $intern['BAGIAN']) == 'Sales & Marketing Operation' ? 'selected' : '' ?>>Sales & Marketing Operation</option>
                                    <option value="Human Capital" <?= old('bagian', $intern['BAGIAN']) == 'Human Capital' ? 'selected' : '' ?>>Human Capital</option>
                                    <option value="Sales & Marketing Planning & Control" <?= old('bagian', $intern['BAGIAN']) == 'Sales & Marketing Planning & Control' ? 'selected' : '' ?>>Sales & Marketing Planning & Control</option>
                                    <option value="Billing & Collection Management" <?= old('bagian', $intern['BAGIAN']) == 'Billing & Collection Management' ? 'selected' : '' ?>>Billing & Collection Management</option>
                                    <option value="Financial Planning, Controlling & Reporting" <?= old('bagian', $intern['BAGIAN']) == 'Financial Planning, Controlling & Reporting' ? 'selected' : '' ?>>Financial Planning, Controlling & Reporting</option>
                                    <option value="IT & Product Development Group" <?= old('bagian', $intern['BAGIAN']) == 'IT & Product Development Group' ? 'selected' : '' ?>>IT & Product Development Group</option>
                                    <option value="Business Development" <?= old('bagian', $intern['BAGIAN']) == 'Business Development' ? 'selected' : '' ?>>Business Development</option>
                                    <option value="Project" <?= old('bagian', $intern['BAGIAN']) == 'Project' ? 'selected' : '' ?>>Project</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-plus"></i> Tanggal Awal</label>
                                <input type="date" name="tgl_awal" class="form-control shadow-sm" value="<?= old('tgl_awal', $intern['TGL_AWAL']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-check"></i> Tanggal Akhir</label>
                                <input type="date" name="tgl_akhir" class="form-control shadow-sm" value="<?= old('tgl_akhir',$intern['TGL_AKHIR']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user-tie"></i> Nama Pembimbing</label>
                                <input type="text" name="nama_pemb" class="form-control shadow-sm text-uppercase" value="<?= old('nama_pemb', $intern['NAMA_PEMB']) ?>" required>
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