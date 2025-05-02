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
                            <div class="form-group mb-4">
                                <label><i class="fa-solid fa-layer-group me-2"></i> Divisi</label>
                                <select class="form-select form-select-sm shadow-sm rounded-3" name="divisi" id="exampleInputDivisi" required>
                                    <option value="" selected disabled>Pilih Divisi</option>
                                    <option value="COMMERCIAL ENGINEERING" <?= old('divisi') == 'COMMERCIAL ENGINEERING' ? 'selected' : '' ?>>COMMERCIAL ENGINEERING</option>
                                    <option value="DIVISI HUKUM & KEPATUHAN" <?= old('divisi') == 'DIVISI HUKUM & KEPATUHAN' ? 'selected' : '' ?>>DIVISI HUKUM & KEPATUHAN</option>
                                    <option value="DIVISI IT & DIGITAL SERVICE" <?= old('divisi') == 'DIVISI IT & DIGITAL SERVICE' ? 'selected' : '' ?>>DIVISI IT & DIGITAL SERVICE</option>
                                    <option value="DIVISI KEUANGAN DAN AKUNTANSI" <?= old('divisi') == 'DIVISI KEUANGAN DAN AKUNTANSI' ? 'selected' : '' ?>>DIVISI KEUANGAN DAN AKUNTANSI</option>
                                    <option value="DIVISI MSDM DAN UMUM" <?= old('divisi') == 'DIVISI MSDM DAN UMUM' ? 'selected' : '' ?>>DIVISI MSDM DAN UMUM</option>
                                    <option value="DIVISI PENGADAAN & MITRA USAHA" <?= old('divisi') == 'DIVISI PENGADAAN & MITRA USAHA' ? 'selected' : '' ?>>DIVISI PENGADAAN & MITRA USAHA</option>
                                    <option value="DIVISI REKAYASA & BANG PROD" <?= old('divisi') == 'DIVISI REKAYASA & BANG PROD' ? 'selected' : '' ?>>DIVISI REKAYASA & BANG PROD</option>
                                    <option value="INFORMATION TECHNOLOGY DAN UMUM" <?= old('divisi') == 'INFORMATION TECHNOLOGY DAN UMUM' ? 'selected' : '' ?>>INFORMATION TECHNOLOGY DAN UMUM</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label><i class="fa-solid fa-briefcase me-2"></i> Bagian</label>
                                <select class="form-select form-select-sm shadow-sm rounded-3" name="bagian" id="exampleInputBagian" required>
                                    <option value="" selected disabled>Pilih Bagian</option>
                                    <option value="IT SERVICE" <?= old('bagian') == 'IT SERVICE' ? 'selected' : '' ?>>IT SERVICE</option>
                                    <option value="BAGIAN KERJASAMA & KEPATUHAN" <?= old('bagian') == 'BAGIAN KERJASAMA & KEPATUHAN' ? 'selected' : '' ?>>KERJASAMA & KEPATUHAN</option>
                                    <option value="BAGIAN ADMINISTRASI & PELAYANAN SDM" <?= old('bagian') == 'BAGIAN ADMINISTRASI & PELAYANAN SDM' ? 'selected' : '' ?>>ADMINISTRASI & PELAYANAN SDM</option>
                                    <option value="BAGIAN PENILAIAN & PENGEMBANGAN SDM" <?= old('bagian') == 'BAGIAN PENILAIAN & PENGEMBANGAN SDM' ? 'selected' : '' ?>>PENILAIAN & PENGEMBANGAN SDM</option>
                                    <option value="BAGIAN RENDAL IT & DS, MANRISKUAL" <?= old('bagian') == 'BAGIAN RENDAL IT & DS, MANRISKUAL' ? 'selected' : '' ?>>RENDAL IT & DS, MANRISKUAL</option>
                                    <option value="BAGIAN RENDAL PENGADAAN" <?= old('bagian') == 'BAGIAN RENDAL PENGADAAN' ? 'selected' : '' ?>>RENDAL PENGADAAN</option>
                                    <option value="BAGIAN PENAGIHAN & ASURANSI" <?= old('bagian') == 'BAGIAN PENAGIHAN & ASURANSI' ? 'selected' : '' ?>>PENAGIHAN & ASURANSI</option>
                                    <option value="BAGIAN PENDANAAN OPERASIONAL" <?= old('bagian') == 'BAGIAN PENDANAAN OPERASIONAL' ? 'selected' : '' ?>>PENDANAAN OPERASIONAL</option>
                                    <option value="BAGIAN BANG ORG & SISTEM MSDM" <?= old('bagian') == 'BAGIAN BANG ORG & SISTEM MSDM' ? 'selected' : '' ?>>BANG ORG & SISTEM MSDM</option>
                                    <option value="BAGIAN RENDAL REKBANGPROD MANRISKUAL" <?= old('bagian') == 'BAGIAN RENDAL REKBANGPROD MANRISKUAL' ? 'selected' : '' ?>>RENDAL REKBANGPROD MANRISKUAL</option>
                                    <option value="BAGIAN PENGEMBANGAN PRODUK" <?= old('bagian') == 'BAGIAN PENGEMBANGAN PRODUK' ? 'selected' : '' ?>>PENGEMBANGAN PRODUK</option>
                                    <option value="BAGIAN PENGADAAN 2" <?= old('bagian') == 'BAGIAN PENGADAAN 2' ? 'selected' : '' ?>>PENGADAAN 2</option>
                                    <option value="BAGIAN MITRA USAHA" <?= old('bagian') == 'BAGIAN MITRA USAHA' ? 'selected' : '' ?>>MITRA USAHA</option>
                                    <option value="BAGIAN INFORMATION TECHNOLOGY" <?= old('bagian') == 'BAGIAN INFORMATION TECHNOLOGY' ? 'selected' : '' ?>>INFORMATION TECHNOLOGY</option>
                                    <option value="DIVISI KEUANGAN DAN AKUNTANSI" <?= old('bagian') == 'DIVISI KEUANGAN DAN AKUNTANSI' ? 'selected' : '' ?>>DIVISI KEUANGAN DAN AKUNTANSI</option>
                                    <option value="BAGIAN AKUNTANSI MANAJEMEN" <?= old('bagian') == 'BAGIAN AKUNTANSI MANAJEMEN' ? 'selected' : '' ?>>AKUNTANSI MANAJEMEN</option>
                                    <option value="BAGIAN UMUM" <?= old('bagian') == 'BAGIAN UMUM' ? 'selected' : '' ?>>BAGIAN UMUM</option>
                                    <option value="BAGIAN PERPAJAKAN" <?= old('bagian') == 'BAGIAN PERPAJAKAN' ? 'selected' : '' ?>>PERPAJAKAN</option>
                                    <option value="CORPORATE COMMUNICATION" <?= old('bagian') == 'CORPORATE COMMUNICATION' ? 'selected' : '' ?>>CORPORATE COMMUNICATION</option>
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
</div>
<?= $this->endSection() ?>