<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="fa-solid fa-chalkboard-teacher"></i>
                </span> Tambah Data Mentor
            </h3>
        </div>

        <div class="card shadow-lg">
            <div class="card-body">
                <h4 class="card-title text-center text-primary fw-bold">FORMULIR DATA MENTOR</h4>
                <br>
                <form action="<?= base_url('/mentor/store') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-id-badge"></i> NIP</label>
                                <input type="text" name="nip" class="form-control shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user"></i> Nama Mentor</label>
                                <input type="text" name="nama" class="form-control shadow-sm text-uppercase" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-building"></i> Divisi</label>
                                <select class="form-select form-select-sm shadow-sm" name="divisi" required>
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
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-briefcase"></i> Bagian</label>
                                <select class="form-select form-select-sm shadow-sm" name="bagian" required>
                                    <option value="" selected disabled>Pilih Bagian</option>
                                    <option value="Production">Production</option>
                                    <option value="Project Group">Project Group</option>
                                    <option value="Treasury & Taxation">Treasury & Taxation</option>
                                    <option value="Financial Accounting">Financial Accounting</option>
                                    <option value="Operation Planning & Control">Operation Planning & Control</option>
                                    <option value="Audit Plan & Control">Audit Plan & Control</option>
                                    <option value="IT & Product Development">IT & Product Development</option>
                                    <option value="Account Manager">Account Manager</option>
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
                        <button type="submit" class="btn btn-gradient-primary me-2 shadow-sm">
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