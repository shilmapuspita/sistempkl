<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="btn btn-gradient-blue p-2 shadow-sm">
                    <i class="fa-solid fa-user-graduate"></i>
                </span> Tambah Data Peserta RISET
            </h3>
        </div>

        <div class="card shadow-lg">
            <div class="card-body">
                <h4 class="card-title text-center text-primary fw-bold">FORMULIR PESERTA RISET</h4>
                <br>
                <form action="<?= base_url('siswa/riset/store') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa-solid fa-user"></i> Nama Siswa</label>
                                <input type="text" name="NM_SISWA" class="form-control shadow-sm text-uppercase" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-day"></i> Tanggal</label>
                                <input type="date" name="TANGGAL" class="form-control shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-graduation-cap"></i> Jenis PKL</label>
                                <input type="text" name="JENIS_PKL" class="form-control shadow-sm" value="RISET" readonly required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-building"></i> Lembaga</label>
                                <input type="text" name="LEMBAGA" class="form-control shadow-sm text-uppercase" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-book"></i> Jurusan</label>
                                <input type="text" name="JURUSAN" class="form-control shadow-sm text-uppercase" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <i class="fa-solid fa-layer-group me-2"></i> Divisi
                                </label>
                                <select class="form-select form-select-sm shadow-sm select2" name="DIVISI" required>
                                    <option value="" selected disabled>Pilih Divisi</option>
                                    <?php foreach ($divisi as $d): ?>
                                        <option value="<?= esc($d['DIVISI']) ?>"><?= esc($d['DIVISI']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    <i class="fa-solid fa-briefcase me-2"></i> Bagian
                                </label>
                                <select class="form-select form-select-sm shadow-sm select2" name="BAGIAN" required>
                                    <option value="" selected disabled>Pilih Bagian</option>
                                    <?php foreach ($bagian as $b): ?>
                                        <option value="<?= esc($b['BAGIAN']) ?>"><?= esc($b['BAGIAN']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-plus"></i> Tanggal Awal</label>
                                <input type="date" name="tanggal_mulai_fix" class="form-control shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-calendar-check"></i> Tanggal Akhir</label>
                                <input type="date" name="tgl_akhir_fix" class="form-control shadow-sm" required>
                            </div>
                            <div class="form-group">
                                <label><i class="fa-solid fa-user-tie"></i> Nama Pembimbing</label>
                                <input type="text" name="NAMA_PEMB" class="form-control shadow-sm text-uppercase" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-gradient-blue me-2 shadow-sm">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan
                        </button>
                        <a href="<?= base_url('siswa/riset') ?>" class="btn btn-gradient-secondary shadow-sm">
                            <i class="fa-solid fa-xmark"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>