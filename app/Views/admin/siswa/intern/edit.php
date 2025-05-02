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
                                <label><i class="fa-solid fa-layer-group me-2"></i> DIVISI</label>
                                <select name="DIVISI" class="form-select form-select-sm shadow-sm text-uppercase" required>
                                    <option value="" disabled <?= old('DIVISI', $intern['DIVISI']) == '' ? 'selected' : '' ?>>Pilih DIVISI</option>
                                    <option value="Operation" <?= old('DIVISI', $intern['DIVISI']) == 'Operation' ? 'selected' : '' ?>>Operation</option>
                                    <option value="Financial Planning & Analysis" <?= old('DIVISI', $intern['DIVISI']) == 'Financial Planning & Analysis' ? 'selected' : '' ?>>Financial Planning & Analysis</option>
                                    <option value="Internal Audit Group" <?= old('DIVISI', $intern['DIVISI']) == 'Internal Audit Group' ? 'selected' : '' ?>>Internal Audit Group</option>
                                    <option value="Commercial Engineering" <?= old('DIVISI', $intern['DIVISI']) == 'Commercial Engineering' ? 'selected' : '' ?>>Commercial Engineering</option>
                                    <option value="Sales & Marketing" <?= old('DIVISI', $intern['DIVISI']) == 'Sales & Marketing' ? 'selected' : '' ?>>Sales & Marketing</option>
                                    <option value="Procurement & Material Management" <?= old('DIVISI', $intern['DIVISI']) == 'Procurement & Material Management' ? 'selected' : '' ?>>Procurement & Material Management</option>
                                    <option value="Corporate Secretary" <?= old('DIVISI', $intern['DIVISI']) == 'Corporate Secretary' ? 'selected' : '' ?>>Corporate Secretary</option>
                                    <option value="Legal & Risk Management" <?= old('DIVISI', $intern['DIVISI']) == 'Legal & Risk Management' ? 'selected' : '' ?>>Legal & Risk Management</option>
                                    <option value="Human Capital & General Affair" <?= old('DIVISI', $intern['DIVISI']) == 'Human Capital & General Affair' ? 'selected' : '' ?>>Human Capital & General Affair</option>
                                    <option value="PT. IPMS" <?= old('DIVISI', $intern['DIVISI']) == 'PT. IPMS' ? 'selected' : '' ?>>PT. IPMS</option>
                                    <option value="PT. IGOC" <?= old('DIVISI', $intern['DIVISI']) == 'PT. IGOC' ? 'selected' : '' ?>>PT. IGOC</option>
                                    <option value="Satuan Pengawasan Intern" <?= old('DIVISI', $intern['DIVISI']) == 'Satuan Pengawasan Intern' ? 'selected' : '' ?>>Satuan Pengawasan Intern</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><i class="fa-solid fa-briefcase me-2"></i> BAGIAN</label>
                                <select name="BAGIAN" class="form-select form-select-sm shadow-sm text-uppercase" required>
                                    <option value="" disabled <?= old('BAGIAN', $intern['BAGIAN']) == '' ? 'selected' : '' ?>>Pilih BAGIAN</option>
                                    <?php
                                    $bagianList = [
                                        "Production",
                                        "Project Group",
                                        "Treasury & Taxation",
                                        "Financial Accounting",
                                        "Operation Planning & Control",
                                        "Audit Plan & Control",
                                        "IT & Product Development",
                                        "Account Manager",
                                        "Procurement Planning & Control",
                                        "Procurement",
                                        "Corporate Communication",
                                        "CSR & Community Development",
                                        "Legal",
                                        "Sales Engineering",
                                        "Quality Management & HSE",
                                        "Partnership",
                                        "Sales & Marketing Operation",
                                        "Human Capital",
                                        "Sales & Marketing Planning & Control",
                                        "Billing & Collection Management",
                                        "Financial Planning, Controlling & Reporting",
                                        "IT & Product Development Group",
                                        "Business Development",
                                        "Project",
                                        "IT Service"
                                    ];
                                    foreach ($bagianList as $b):
                                    ?>
                                        <option value="<?= esc($b) ?>" <?= old('BAGIAN', $intern['BAGIAN']) == $b ? 'selected' : '' ?>><?= esc($b) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-plus"></i> Tanggal Awal</label>
                                <input type="date" name="TGL_AWAL" class="form-control shadow-sm" value="<?= old('TGL_AWAL', $intern['TGL_AWAL']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-check"></i> Tanggal Akhir</label>
                                <input type="date" name="TGL_AKHIR" class="form-control shadow-sm" value="<?= old('TGL_AKHIR', $intern['TGL_AKHIR']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user-tie"></i> Nama Pembimbing</label>
                                <input type="text" name="nama_pemb" class="form-control shadow-sm text-uppercase" value="<?= old('nama_pemb', $intern['NAMA_PEMB']) ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-gradient-blue me-2 shadow-sm">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
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