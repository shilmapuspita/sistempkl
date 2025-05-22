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
                            <div class="form-group mb-4">
                                <label><i class="fa-solid fa-user-tie"></i> Nama Pembimbing</label>
                                <select name="NAMA_PEMB" class="form-select form-select-sm shadow-sm rounded-3" required>
                                    <option value="" selected disabled>Pilih Pembimbing</option>
                                    <option value="DANA SUHENDAR" <?= old('NAMA_PEMB') == 'DANA SUHENDAR' ? 'selected' : '' ?>>DANA SUHENDAR</option>
                                    <option value="YULIATNO RAWOSIIII" <?= old('NAMA_PEMB') == 'YULIATNO RAWOSIIII' ? 'selected' : '' ?>>YULIATNO RAWOSIIII</option>
                                    <option value="HERI JOKO PRASETYO" <?= old('NAMA_PEMB') == 'HERI JOKO PRASETYO' ? 'selected' : '' ?>>HERI JOKO PRASETYO</option>
                                    <option value="JOKO HARYONO" <?= old('NAMA_PEMB') == 'JOKO HARYONO' ? 'selected' : '' ?>>JOKO HARYONO</option>
                                    <option value="BONTANG PRASOJO" <?= old('NAMA_PEMB') == 'BONTANG PRASOJO' ? 'selected' : '' ?>>BONTANG PRASOJO</option>
                                    <option value="LISDA N. RACHMAWATI" <?= old('NAMA_PEMB') == 'LISDA N. RACHMAWATI' ? 'selected' : '' ?>>LISDA N. RACHMAWATI</option>
                                    <option value="TRISWARA" <?= old('NAMA_PEMB') == 'TRISWARA' ? 'selected' : '' ?>>TRISWARA</option>
                                    <option value="TITO GEORGE L.S." <?= old('NAMA_PEMB') == 'TITO GEORGE L.S.' ? 'selected' : '' ?>>TITO GEORGE L.S.</option>
                                    <option value="TATANG SOLIHIN" <?= old('NAMA_PEMB') == 'TATANG SOLIHIN' ? 'selected' : '' ?>>TATANG SOLIHIN</option>
                                    <option value="YAYAT RUHIYAT" <?= old('NAMA_PEMB') == 'YAYAT RUHIYAT' ? 'selected' : '' ?>>YAYAT RUHIYAT</option>
                                    <option value="SURYAMAN DAHLAN" <?= old('NAMA_PEMB') == 'SURYAMAN DAHLAN' ? 'selected' : '' ?>>SURYAMAN DAHLAN</option>
                                    <option value="NEDI KURNIADI" <?= old('NAMA_PEMB') == 'NEDI KURNIADI' ? 'selected' : '' ?>>NEDI KURNIADI</option>
                                    <option value="MULYO SANYOTO" <?= old('NAMA_PEMB') == 'MULYO SANYOTO' ? 'selected' : '' ?>>MULYO SANYOTO</option>
                                    <option value="SUPRIATNA DIDI KOSIM" <?= old('NAMA_PEMB') == 'SUPRIATNA DIDI KOSIM' ? 'selected' : '' ?>>SUPRIATNA DIDI KOSIM</option>
                                    <option value="AGUS KOSASIH A.K" <?= old('NAMA_PEMB') == 'AGUS KOSASIH A.K' ? 'selected' : '' ?>>AGUS KOSASIH A.K</option>
                                    <option value="YANARDIAN AGRIANTO" <?= old('NAMA_PEMB') == 'YANARDIAN AGRIANTO' ? 'selected' : '' ?>>YANARDIAN AGRIANTO</option>
                                    <option value="JAJANG KOSWARA" <?= old('NAMA_PEMB') == 'JAJANG KOSWARA' ? 'selected' : '' ?>>JAJANG KOSWARA</option>
                                    <option value="KASNANTA SUWITA" <?= old('NAMA_PEMB') == 'KASNANTA SUWITA' ? 'selected' : '' ?>>KASNANTA SUWITA</option>
                                    <option value="MAMAN SUPARMAN S." <?= old('NAMA_PEMB') == 'MAMAN SUPARMAN S.' ? 'selected' : '' ?>>MAMAN SUPARMAN S.</option>
                                    <option value="TRIA SUSIAWATI" <?= old('NAMA_PEMB') == 'TRIA SUSIAWATI' ? 'selected' : '' ?>>TRIA SUSIAWATI</option>
                                    <option value="GUPUH SARWO EDI" <?= old('NAMA_PEMB') == 'GUPUH SARWO EDI' ? 'selected' : '' ?>>GUPUH SARWO EDI</option>
                                    <option value="ANDIK EKO K.P. SSi MT" <?= old('NAMA_PEMB') == 'ANDIK EKO K.P. SSi MT' ? 'selected' : '' ?>>ANDIK EKO K.P. SSi MT</option>
                                    <option value="HERDA HERMANSYAH" <?= old('NAMA_PEMB') == 'HERDA HERMANSYAH' ? 'selected' : '' ?>>HERDA HERMANSYAH</option>
                                    <option value="EDDIE WILLIAM S." <?= old('NAMA_PEMB') == 'EDDIE WILLIAM S.' ? 'selected' : '' ?>>EDDIE WILLIAM S.</option>
                                    <option value="YOYO SYAMSUDIN DISASTRA" <?= old('NAMA_PEMB') == 'YOYO SYAMSUDIN DISASTRA' ? 'selected' : '' ?>>YOYO SYAMSUDIN DISASTRA</option>
                                </select>
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
<?= $this->endSection() ?>