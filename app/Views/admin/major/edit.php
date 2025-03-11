<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="btn btn-gradient-blue p-2 shadow-sm">
                    <i class="fa-solid fa-chalkboard-teacher"></i>
                </span> Edit Data Jurusan
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-primary fw-bold">FORMULIR EDIT DATA JURUSAN</h4>
                        <br>
                        <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="<?= base_url('/major/update/' . $jurusan['ID_JURUSAN']) ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id_jurusan" value="<?= $jurusan['ID_JURUSAN'] ?>">
                            <div class="form-group">
                                <label for="exampleInputJurusan"><i class="fa-solid fa-briefcase"></i>
                                    Nama Jurusan</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="nama_jurusan" placeholder="Masukan Nama Jurusan" value="<?= old('nama_jurusan', $jurusan['NAMA_JURUSAN']) ?>" required>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-gradient-blue me-2 shadow-sm"><i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan</button>
                                <a href="<?= base_url('/major') ?>" class="btn btn-gradient-secondary shadow-sm">
                                    <i class="fa-solid fa-xmark"></i> Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- main-panel ends -->
        <?= $this->endSection() ?>