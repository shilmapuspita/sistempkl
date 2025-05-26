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
                            <div class="form-group mb-4">
                                <label><i class="fa-solid fa-id-badge"></i> No Surat</label>
                                <input type="text" name="no_surat" class="form-control shadow-sm rounded-3" value="<?= old('no_surat') ?>" required>
                            </div>
                            <div class="form-group mb-4">
                                <label><i class="fa-solid fa-user"></i> Nama Siswa</label>
                                <input type="text" name="nama" class="form-control shadow-sm rounded-3 text-uppercase" value="<?= old('nama') ?>" required>
                            </div>
                            <div class="form-group mb-4">
                                <label><i class="fa-solid fa-calendar-day"></i> Tanggal</label>
                                <input type="date" name="tanggal" class="form-control shadow-sm rounded-3" value="<?= old('tanggal') ?>" required>
                            </div>
                            <div class="form-group mb-4">
                                <label><i class="fa-solid fa-graduation-cap"></i> Batch</label>
                                <input type="text" name="batch" class="form-control shadow-sm rounded-3" value="<?= old('batch') ?>" required>
                            </div>
                            <div class="form-group mb-4">
                                <label><i class="fa-solid fa-building"></i> Lembaga</label>
                                <input type="text" name="lembaga" class="form-control shadow-sm rounded-3 text-uppercase" value="<?= old('lembaga') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label><i class="fa-solid fa-book"></i> Jurusan</label>
                                <input type="text" name="jurusan" class="form-control shadow-sm rounded-3 text-uppercase" value="<?= old('jurusan') ?>" required>
                            </div>
                            <div class="form-group">
                                <label>
                                    <i class="fa-solid fa-layer-group me-2"></i> Divisi
                                </label>
                                <select class="form-select form-select-sm shadow-sm select2" name="divisi" required>
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
                                <select class="form-select form-select-sm shadow-sm select2" name="bagian" required>
                                    <option value="" selected disabled>Pilih Bagian</option>
                                    <?php foreach ($bagian as $b): ?>
                                        <option value="<?= esc($b['BAGIAN']) ?>"><?= esc($b['BAGIAN']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label><i class="fa-solid fa-calendar-plus"></i> Tanggal Awal</label>
                                <input type="date" name="TGL_AWAL" class="form-control shadow-sm rounded-3" value="<?= esc(old('TGL_AWAL') ?? '') ?>" required>
                            </div>
                            <div class="form-group mb-4">
                                <label><i class="fa-solid fa-calendar-check"></i> Tanggal Akhir</label>
                                <input type="date" name="TGL_AKHIR" class="form-control shadow-sm rounded-3" value="<?= esc(old('TGL_AKHIR') ?? '') ?>">
                            </div>
                            <div class="form-group mb-4">
                                <label><i class="fa-solid fa-user-tie"></i> Nama Pembimbing</label>
                                <select name="nama_pemb" class="form-select form-select-sm shadow-sm rounded-3">
                                    <option value="" selected disabled>Pilih Pembimbing</option>
                                    <option value="SETYO UTORO" <?= old('pembimbing') == 'SETYO UTORO' ? 'selected' : '' ?>>SETYO UTORO</option>
                                    <option value="PUTTY OCTAVIANY PURWADIPUTRI" <?= old('pembimbing') == 'PUTTY OCTAVIANY PURWADIPUTRI' ? 'selected' : '' ?>>PUTTY OCTAVIANY PURWADIPUTRI</option>
                                    <option value="NENDEN SITI AISYAH" <?= old('pembimbing') == 'NENDEN SITI AISYAH' ? 'selected' : '' ?>>NENDEN SITI AISYAH</option>
                                    <option value="RESNA RIA ASMARA" <?= old('pembimbing') == 'RESNA RIA ASMARA' ? 'selected' : '' ?>>RESNA RIA ASMARA</option>
                                    <option value="TUMINAH" <?= old('pembimbing') == 'TUMINAH' ? 'selected' : '' ?>>TUMINAH</option>
                                    <option value="RIKA FITRIA" <?= old('pembimbing') == 'RIKA FITRIA' ? 'selected' : '' ?>>RIKA FITRIA</option>
                                    <option value="MARTAULI SINTA PUTRI" <?= old('pembimbing') == 'MARTAULI SINTA PUTRI' ? 'selected' : '' ?>>MARTAULI SINTA PUTRI</option>
                                    <option value="TATI SRI HARTATI" <?= old('pembimbing') == 'TATI SRI HARTATI' ? 'selected' : '' ?>>TATI SRI HARTATI</option>
                                    <option value="MULIASARI HARTANTI" <?= old('pembimbing') == 'MULIASARI HARTANTI' ? 'selected' : '' ?>>MULIASARI HARTANTI</option>
                                    <option value="DJUHARTONO" <?= old('pembimbing') == 'DJUHARTONO' ? 'selected' : '' ?>>DJUHARTONO</option>
                                    <option value="PURNOMO ADJI" <?= old('pembimbing') == 'PURNOMO ADJI' ? 'selected' : '' ?>>PURNOMO ADJI</option>
                                    <option value="YUANOVITA HAPSARI" <?= old('pembimbing') == 'YUANOVITA HAPSARI' ? 'selected' : '' ?>>YUANOVITA HAPSARI</option>
                                    <option value="KARINA MEYRITA DEWI" <?= old('pembimbing') == 'KARINA MEYRITA DEWI' ? 'selected' : '' ?>>KARINA MEYRITA DEWI</option>
                                    <option value="ERIK ARFIANSYAH" <?= old('pembimbing') == 'ERIK ARFIANSYAH' ? 'selected' : '' ?>>ERIK ARFIANSYAH</option>
                                    <option value="ELLEN HUTABARAT" <?= old('pembimbing') == 'ELLEN HUTABARAT' ? 'selected' : '' ?>>ELLEN HUTABARAT</option>
                                    <option value="ASEP IWAN SUHENDAR" <?= old('pembimbing') == 'ASEP IWAN SUHENDAR' ? 'selected' : '' ?>>ASEP IWAN SUHENDAR</option>
                                    <option value="RACHMAT SUGIARTO" <?= old('pembimbing') == 'RACHMAT SUGIARTO' ? 'selected' : '' ?>>RACHMAT SUGIARTO</option>
                                    <option value="LUTHFY" <?= old('pembimbing') == 'LUTHFY' ? 'selected' : '' ?>>LUTHFY</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-gradient-blue me-2 shadow-sm rounded-3">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan
                        </button>
                        <a href="<?= base_url('/intern') ?>" class="btn btn-gradient-secondary shadow-sm rounded-3">
                            <i class="fa-solid fa-xmark"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>