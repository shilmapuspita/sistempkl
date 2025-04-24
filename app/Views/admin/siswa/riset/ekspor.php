<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<?php ini_set('memory_limit', '1024M'); ?>

<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="exportFormRiset" action="<?= base_url('/proses-eksporRiset') ?>" method="post">
            <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel">Download Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">Tanggal Akhir</label>
                        <input type="date" name="end_date" id="end_date" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="divisi" class="form-label">Divisi</label>
                        <select name="divisi" id="divisi" class="form-select">
                            <option value="">-- Pilih Divisi --</option>
                            <option value="SALES & MARKETING">SALES & MARKETING</option>
                            <option value="SIS TEK FO">SIS TEK FO</option>
                            <option value="OPERASI CELCO, PRODUKSI DAN PURNAJUAL">OPERASI CELCO, PRODUKSI DAN PURNAJUAL</option>
                            <option value="SE">SE</option>
                            <option value="TAN">TAN</option>
                            <option value="ADMINISTRASI PERKANTORAN">ADMINISTRASI PERKANTORAN</option>
                            <option value="SEK PER">SEK PER</option>
                            <option value="PENGEMBANGAN PRODUK">PENGEMBANGAN PRODUK</option>
                            <option value="ACC PE">ACC PE</option>
                            <option value="HUMAN CAPITAL MANAGEMENT">HUMAN CAPITAL MANAGEMENT</option>
                            <option value="MANAJEMEN SDM"> MANAJEMEN SDM</option>
                            <option value="ADMINISTRASI KEUANGAN">ADMINISTRASI KEUANGAN</option>
                            <option value="SEKRETARIS PERUSAHAAN">SEKRETARIS PERUSAHAAN</option>
                            <option value="HUKUM DAN PAT">HUKUM DAN PAT</option>
                            <option value="PENGADAAN DAN LOGISTIK">PENGADAAN DAN LOGISTIK</option>
                            <option value="PERENCANAAN DAN DUKUNGAN PROYEK TITO">PERENCANAAN DAN DUKUNGAN PROYEK TITO</option>
                            <option value="SPI">SPI</option>
                            <option value="ACC CELCO">ACC CELCO</option>
                            <option value="PEMBANGUNAN DAN MIGRASI PROYEK TITO">PEMBANGUNAN DAN MIGRASI PROYEK TITO</option>
                            <option value="PKBL">PKBL</option>
                            <option value="DAAN DAN LOGMANAJEMEN">DAAN DAN LOGMANAJEMEN</option>
                            <option value="ACCOUNT PE">ACCOUNT PE</option>
                            <option value="SISTEM DAN TEKNOLOGI INFORMASI">SISTEM DAN TEKNOLOGI INFORMASI</option>
                            <option value="SATUAN PENGAWASAN INTERN">SATUAN PENGAWASAN INTERN</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pembimbing" class="form-label">Nama Pembimbing</label>
                        <select name="pembimbing" id="pembimbing" class="form-select">
                            <option value="">-- Pilih Pembimbing --</option>
                            <option value="DANA SUHENDAR">DANA SUHENDAR</option>
                            <option value="YULIATNO RAWOSI">YULIATNO RAWOSI</option>
                            <option value="HERI JOKO PRASETYO">HERI JOKO PRASETYO</option>
                            <option value=" JOKO HARYONO"> JOKO HARYONO</option>
                            <option value="BONTANG PRASOJO">BONTANG PRASOJO</option>
                            <option value="LISDA N. RACHMAWATI">LISDA N. RACHMAWATI</option>
                            <option value="TRISWARA"> TRISWARA</option>
                            <option value="TITO GEORGE L.S.">TITO GEORGE L.S.</option>
                            <option value="TATANG SOLIHIN">TATANG SOLIHIN</option>
                            <option value="YAYAT RUHIYAT">YAYAT RUHIYAT</option>
                            <option value="SURYAMAN DAHLAN">SURYAMAN DAHLAN</option>
                            <option value="NEDI KURNIADI">NEDI KURNIADI</option>
                            <option value="MULYO SANYOTO">MULYO SANYOTO</option>
                            <option value="SUPRIATNA DIDI KOSIM">SUPRIATNA DIDI KOSIM</option>
                            <option value="AGUS KOSASIH A.K">AGUS KOSASIH A.K</option>
                            <option value="YANARDIAN AGRIANTO">YANARDIAN AGRIANTO</option>
                            <option value="JAJANG KOSWARA">JAJANG KOSWARA</option>
                            <option value="KASNANTA SUWITA">KASNANTA SUWITA</option>
                            <option value="MAMAN SUPARMAN S.">MAMAN SUPARMAN S.</option>
                            <option value="TRIA SUSIAWATI">TRIA SUSIAWATI</option>
                            <option value="GUPUH SARWO EDI">GUPUH SARWO EDI</option>
                            <option value="ANDIK EKO K.P. SSi MT">ANDIK EKO K.P. SSi MT</option>
                            <option value="HERDA HERMANSYAH">HERDA HERMANSYAH</option>
                            <option value="EDDIE WILLIAM S.">EDDIE WILLIAM S.</option>
                            <option value="YOYO SYAMSUDIN DISASTRA">YOYO SYAMSUDIN DISASTRA</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Download</button>
                </div>
            </div>
        </form>
    </div>
</div>
 
<?= $this->endSection() ?>