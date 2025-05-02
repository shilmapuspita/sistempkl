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
                                <select name="DIVISI" class="form-control shadow-sm" style="appearance: auto;" required>
                                    <option value="" disabled <?= empty(old('DIVISI', $intern['DIVISI'])) ? 'selected' : '' ?>>Pilih Divisi</option>
                                    <?php
                                    $divisiList = [
                                        "COMMERCIAL ENGINEERING",
                                        "DIVISI HUKUM & KEPATUHAN",
                                        "DIVISI IT & DIGITAL SERVICE",
                                        "DIVISI KEUANGAN DAN AKUNTANSI",
                                        "DIVISI MSDM DAN UMUM",
                                        "DIVISI PENGADAAN & MITRA USAHA",
                                        "DIVISI REKAYASA & BANG PROD",
                                        "INFORMATION TECHNOLOGY DAN UMUM"
                                    ];

                                    foreach ($divisiList as $divisi) :
                                    ?>
                                        <option value="<?= $divisi ?>" <?= old('DIVISI', $intern['DIVISI']) == $divisi ? 'selected' : '' ?>><?= $divisi ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    <i class="fa-solid fa-briefcase me-2"></i> Bagian
                                </label>
                                <select name="BAGIAN" class="form-control shadow-sm" style="appearance: auto;" required>
                                    <option value="" disabled <?= empty(old('BAGIAN', $intern['BAGIAN'])) ? 'selected' : '' ?>>Pilih Bagian</option>
                                    <?php
                                    $bagianList = [
                                        "IT SERVICE",
                                        "KERJASAMA & KEPATUHAN",
                                        "ADMINISTRASI & PELAYANAN SDM",
                                        "PENILAIAN & PENGEMBANGAN SDM",
                                        "RENDAL IT & DS, MANRISKUAL",
                                        "RENDAL PENGADAAN",
                                        "PENAGIHAN & ASURANSI",
                                        "PENDANAAN OPERASIONAL",
                                        "BANG ORG & SISTEM MSDM",
                                        "RENDAL REKBANGPROD MANRISKUAL",
                                        "PENGEMBANGAN PRODUK",
                                        "PENGADAAN 2",
                                        "MITRA USAHA",
                                        "INFORMATION TECHNOLOGY",
                                        "DIVISI KEUANGAN DAN AKUNTANSI",
                                        "AKUNTANSI MANAJEMEN",
                                        "BAGIAN UMUM",
                                        "PERPAJAKAN",
                                        "CORPORATE COMMUNICATION"
                                    ];

                                    foreach ($bagianList as $bagian) :
                                    ?>
                                        <option value="<?= $bagian ?>" <?= old('BAGIAN', $intern['BAGIAN']) == $bagian ? 'selected' : '' ?>><?= $bagian ?></option>
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