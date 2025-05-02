<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<?php ini_set('memory_limit', '1024M'); ?>

<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="exportFormIntern" action="<?= base_url('intern/ekspor') ?>" method="post">
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
                            <option value="COMMERCIAL ENGINEERING">COMMERCIAL ENGINEERING</option>
                            <option value="DIVISI HUKUM & KEPATUHAN">DIVISI HUKUM & KEPATUHAN</option>
                            <option value="DIVISI IT & DIGITAL SERVICE">DIVISI IT & DIGITAL SERVICE</option>
                            <option value="DIVISI KEUANGAN DAN AKUNTANSI">DIVISI KEUANGAN DAN AKUNTANSI</option>
                            <option value="DIVISI MSDM DAN UMUM">DIVISI MSDM DAN UMUM</option>
                            <option value="DIVISI PENGADAAN & MITRA USAHA">DIVISI PENGADAAN & MITRA USAHA</option>
                            <option value="DIVISI REKAYASA & BANG PROD">DIVISI REKAYASA & BANG PROD</option>
                            <option value="INFORMATION TECHNOLOGY DAN UMUM">INFORMATION TECHNOLOGY DAN UMUM</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pembimbing" class="form-label">Nama Pembimbing</label>
                        <select name="pembimbing" id="pembimbing" class="form-select">
                            <option value="">-- Pilih Pembimbing --</option>
                            <option value="SETYO UTORO">SETYO UTORO</option>
                            <option value="PUTTY OCTAVIANY PURWADIPUTRI">PUTTY OCTAVIANY PURWADIPUTRI</option>
                            <option value="NENDEN SITI AISYAH">NENDEN SITI AISYAH</option>
                            <option value="RESNA RIA ASMARA">RESNA RIA ASMARA</option>
                            <option value="TUMINAH">TUMINAH</option>
                            <option value="RIKA FITRIA">RIKA FITRIA</option>
                            <option value="MARTAULI SINTA PUTRI">MARTAULI SINTA PUTRI</option>
                            <option value="TATI SRI HARTATI">TATI SRI HARTATI</option>
                            <option value="MULIASARI HARTANTI">MULIASARI HARTANTI</option>
                            <option value="DJUHARTONO">DJUHARTONO</option>
                            <option value="PURNOMO ADJI">PURNOMO ADJI</option>
                            <option value="YUANOVITA HAPSARI">YUANOVITA HAPSARI</option>
                            <option value="KARINA MEYRITA DEWI">KARINA MEYRITA DEWI</option>
                            <option value="ERIK ARFIANSYAH">ERIK ARFIANSYAH</option>
                            <option value="ELLEN HUTABARAT">ELLEN HUTABARAT</option>
                            <option value="ASEP IWAN SUHENDAR">ASEP IWAN SUHENDAR</option>
                            <option value="RACHMAT SUGIARTO">RACHMAT SUGIARTO</option>
                            <option value="LUTHFY">LUTHFY</option>
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