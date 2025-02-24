<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Edit Data Mentor
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
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

                        <form class="forms-sample" action="<?= base_url('/mentor/update/' . $mentor['ID_PEMBIMBING']) ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id_pembimbing" value="<?= $mentor['ID_PEMBIMBING'] ?>">
                            <div class="form-group">
                                <label for="exampleInputNIP">NIP</label>
                                <input type="number" class="form-control" name="nip" id="exampleInputNIP" value="<?= old('nip', $mentor['NIP']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Nama</label>
                                <input type="text" class="form-control" name="nama" id="exampleInputName" value="<?= old('nama', $mentor['NAMA']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDivisi">Divisi</label>
                                <input type="text" class="form-control" name="divisi" id="exampleInputDivisi" value="<?= old('divisi', $mentor['DIVISI']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBagian">Bagian</label>
                                <input type="text" class="form-control" name="bagian" id="exampleInputBagian" value="<?= old('bagian', $mentor['BAGIAN']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNIPAtasan">NIP Atasan</label>
                                <input type="number" class="form-control" name="nip_atasan" id="exampleInputNIPAtasan" value="<?= old('nip_atasan', $mentor['NIP_ATASAN']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNamaAtasan">Nama Atasan</label>
                                <input type="text" class="form-control" name="nama_atasan" id="exampleInputNamaAtasan" value="<?= old('nama_atasan', $mentor['NAMA_ATASAN']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNamaJabatan">Nama Jabatan</label>
                                <input type="text" class="form-control" name="nama_jabatan" id="exampleInputNamaJabatan" value="<?= old('nama_jabatan', $mentor['NAMA_JABATAN']) ?>" required>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                            <a href="<?= base_url('/mentor') ?>" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>